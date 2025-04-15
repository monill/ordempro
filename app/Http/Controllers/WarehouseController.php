<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\ItemQuantity;
use App\Models\ItemTransaction;
use App\Models\State;
use App\Models\Warehouse;
use App\Services\ItemTransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //with('users')
        $warehouses = Warehouse::get()->map(function ($warehouse) {
            $totalItems = ItemQuantity::where('warehouse_id', $warehouse->id)
                ->where('quantity', '>', 0)
                ->distinct('item_id')
                ->count();

            $availableStock = ItemQuantity::where('warehouse_id', $warehouse->id)->sum('quantity');

            $worthItemsDetails = app(ItemTransactionService::class)->worthItemsDetails($warehouse->id);
            $worthCost = $worthItemsDetails['totalPurchaseCost'];
            $worthSalePrice = $worthItemsDetails['totalSalePrice'];
            $worthProfit = $worthSalePrice - $worthCost;

            return (object) [
                'id' => $warehouse->id,
                'name' => $warehouse->name,
                'total_items' => $totalItems,
                'available_stock' => $availableStock,
                'worth_cost' => number_format($worthCost, 2),
                'worth_sale_price' => number_format($worthSalePrice, 2),
                'worth_profit' => number_format($worthProfit, 2),
                'created_at' => $warehouse->created_at
            ];
        });
        return view('warehouses.index', ['warehouses' => $warehouses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('warehouses.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseRequest $request)
    {
        Warehouse::create($request->all());
        return redirect()->route('warehouses.index')->with('success', 'Armazém criado com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {
        $countries = Country::all();
        $states = State::where('country_id', $warehouse->country_id)->get();
        $cities = City::where('state_id', $warehouse->state_id)->get();
        $companies = Company::all();

        return view('warehouses.edit', compact('warehouse', 'countries', 'states', 'cities', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WarehouseRequest $request, Warehouse $warehouse)
    {
        $warehouse->update($request->all());
        return redirect()->route('warehouses.index')->with('success', 'Armazém atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect()->route('warehouses.index')->with('success', 'Armazém excluído com sucesso.');
    }
}
