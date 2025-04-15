<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Company;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Partner;
use App\Models\TypeAddress;
use App\Models\TypePhone;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index($type = 'customer')
    {
        $partners = Partner::whereIn('partner_type', [$type, 'both'])->get();
        return view('partners.index', compact('partners', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($type = 'customer')
    {
        $companies = Company::all();
        $genders = Gender::all();
        return view('partners.create', compact('type','companies', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request, $type = 'customer')
    {
        $data = $request->validated();
        $data['partner_type'] = $type;
        Partner::create($data);

        return redirect()->route("{$type}s.index")->with('success', ucfirst($type) . ' criado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner, $type = 'customer')
    {
        if ($partner->partner_type !== $type && $partner->partner_type !== 'both') {
            abort(404);
        }

        $companies = Company::all();
        $genders = Gender::all();

        return view('partners.edit', compact('partner', 'type', 'companies', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, Partner $partner, $type = 'customer')
    {
        if ($partner->partner_type !== $type && $partner->partner_type !== 'both') {
            abort(404);
        }

        $data = $request->validated();
        $partner->update($data);

        return redirect()->route("{$type}s.index")->with('success', ucfirst($type) . ' atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner, $type = 'customer')
    {
        if ($partner->partner_type !== $type && $partner->partner_type !== 'both') {
            abort(404);
        }

        $partner->delete();

        return redirect()->route("{$type}s.index")->with('success', ucfirst($type) . ' removido com sucesso!');
    }

    public function addresses()
    {
        $countries = Country::all();
        $addressTypes = TypeAddress::all();
    }

    public function phones()
    {
        $phoneTypes = TypePhone::all();
    }
}
