<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Gender;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Cria o parceiro
            $partner = Partner::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender_id' => $request->gender_id,
                'partner_type' => $request->partner_type,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'tax_identifier' => $request->tax_identifier,
                'birthday' => $request->birthday,
                'birthday_email' => $request->birthday_email,
                'comments' => $request->comments,
            ]);

            // Salva os endereços
            foreach ($request->country_id as $index => $countryId) {
                $partner->addresses()->create([
                    'country_id' => $countryId,
                    'address_type_id' => $request->address_type_id[$index] ?? null,
                    'state' => $request->state[$index] ?? null,
                    'city' => $request->city[$index] ?? null,
                    'address' => $request->address[$index] ?? null,
                    'zip_code' => $request->zip_code[$index] ?? null,
                    'complement' => $request->complement[$index] ?? null,
                ]);
            }

            // Salva os telefones
            foreach ($request->phone_type_id as $index => $typeId) {
                $partner->phones()->create([
                    'phone_type_id' => $typeId,
                    'number' => $request->number[$index] ?? null,
                ]);
            }

            DB::commit();
            return redirect()->route('customers.index')->with('success', 'Cliente criado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Erro ao salvar os dados: ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $customer = Partner::with(['addresses', 'phones'])->findOrFail($id);

        $countries = Country::all();
        $addressTypes = AddressType::all();
        $phoneTypes = PhoneType::all();
        $genders = Gender::all();

        return view('customers.edit', compact('customer', 'countries', 'addressTypes', 'phoneTypes', 'genders'));
    }

    public function update(CustomersRequest $request, string $id)
    {
        $partner = Partner::findOrFail($id);

        DB::beginTransaction();
        try {
            // Atualiza os dados básicos do parceiro
            $partner->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender_id' => $request->gender_id,
                'partner_type' => $request->partner_type,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'tax_identifier' => $request->tax_identifier,
                'birthday' => $request->birthday,
                'birthday_email' => $request->birthday_email ?? false,
                'comments' => $request->comments,
            ]);

            // Atualiza os endereços
            $this->updateAddresses($partner, $request);

            // Atualiza os telefones
            $this->updatePhones($partner, $request);

            DB::commit();
            return redirect()->route('customers.index')->with('success', 'Parceiro atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao atualizar: ' . $e->getMessage());
        }
    }

    private function updateAddresses($partner, $request)
    {
        $existingAddresses = $partner->addresses()->get();

        $addressKeys = [
            'country_id', 'address_type_id', 'state',
            'city', 'address', 'zip_code', 'complement',
        ];

        $newAddresses = collect();

        foreach ($request->country_id ?? [] as $index => $countryId) {
            $new = [
                'country_id'      => $countryId,
                'address_type_id' => $request->address_type_id[$index] ?? null,
                'state'           => $request->state[$index] ?? null,
                'city'            => $request->city[$index] ?? null,
                'address'         => $request->address[$index] ?? null,
                'zip_code'     => $request->zip_code[$index] ?? null,
                'complement'      => $request->complement[$index] ?? null,
            ];

            // Só adiciona se tiver algum campo relevante preenchido
            if (collect($new)->filter()->isNotEmpty()) {
                $newAddresses->push($new);

                // Se ainda não existir, cria
                $exists = $existingAddresses->first(fn($old) => $this->arraysMatch($old->toArray(), $new, $addressKeys));
                if (!$exists) {
                    $partner->addresses()->create($new);
                }
            }
        }

        // Remover os que não estão mais na view
        foreach ($existingAddresses as $old) {
            $stillExists = $newAddresses->first(fn($new) => $this->arraysMatch($old->toArray(), $new, $addressKeys));
            if (!$stillExists) {
                $old->delete();
            }
        }
    }

    protected function arraysMatch($a, $b, $keys)
    {
        foreach ($keys as $key) {
            if (($a[$key] ?? null) !== ($b[$key] ?? null)) {
                return false;
            }
        }
        return true;
    }

    protected function updatePhones(Partner $partner, Request $request)
    {
        $existingPhones = $partner->phones()->get()->keyBy('id');

        $phoneTypeIds = $request->phone_type_id ?? [];
        $numbers = $request->number ?? [];

        $newPhones = [];

        foreach ($phoneTypeIds as $index => $typeId) {
            $number = $numbers[$index] ?? null;

            if ($typeId && $number) {
                // Verifica se já existe esse registro exato
                $existing = $partner->phones()
                    ->where('phone_type_id', $typeId)
                    ->where('number', $number)
                    ->first();

                if (!$existing) {
                    $newPhones[] = [
                        'partner_id' => $partner->id,
                        'phone_type_id' => $typeId,
                        'number' => $number,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        // Deleta os que foram removidos na view
        $currentNumbers = collect($newPhones)->pluck('number')->all();

        $partner->phones()
            ->whereNotIn('number', $currentNumbers)
            ->delete();

        // Insere os novos
        if (!empty($newPhones)) {
            Phone::insert($newPhones);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);

        // Remove tudo que for dependente (endereços e telefones)
        $partner->addresses()->delete();
        $partner->phones()->delete();
        $partner->delete();

        return redirect()->route('partners.index')->with('success', 'Parceiro removido com sucesso!');
    }
}
