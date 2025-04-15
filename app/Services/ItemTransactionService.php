<?php

namespace App\Services;

use App\Models\ItemQuantity;
use App\Models\ItemTransaction;
use App\Models\Purchase;

class ItemTransactionService
{
    public function worthItemsDetails($warehouseId, $itemId = null)
    {
        // Buscar a quantidade total de cada item disponível no armazém
        $availableItems = ItemQuantity::where('warehouse_id', $warehouseId)
            ->where('quantity', '>', 0)
            ->when($itemId, fn($query) => $query->where('item_id', $itemId))
            ->groupBy('item_id')
            ->selectRaw('item_id, SUM(quantity) as total_quantity')
            ->pluck('total_quantity', 'item_id');

        // Se não houver itens disponíveis, retorna os valores zerados
        if ($availableItems->isEmpty()) {
            return ['totalPurchaseCost' => 0, 'totalSalePrice' => 0, 'totalAvailableQuantity' => 0];
        }

        // Buscar dados de compra e preços de venda dos itens
        $purchasesData = ItemTransaction::where('warehouse_id', $warehouseId)
            ->where(function ($query) {
                $query->where('transaction_type', getMorphedModelName(Purchase::class))
                    ->orWhere('transaction_type', getMorphedModelName('Item Opening'))
                    ->orWhere(fn($subQuery) => $subQuery
                        ->where('transaction_type', getMorphedModelName('Stock Transfer'))
                        ->where('unique_code', 'STOCK_RECEIVE')
                    );
            })
            ->whereIn('item_id', $availableItems->keys()->all())
            ->join('items', 'items.id', '=', 'item_transactions.item_id')
            ->select([
                'item_transactions.item_id',
                DB::raw('COALESCE(items.sale_price, 0) as sale_price'),
                DB::raw('SUM(item_transactions.total) as total_sum'),
                DB::raw('SUM(item_transactions.quantity) as total_quantity_sum'),
            ])
            ->groupBy('item_transactions.item_id', 'items.sale_price')
            ->get()
            ->keyBy('item_id');

        // Inicializando valores totais
        $totalPurchaseCost = 0;
        $totalSalePrice = 0;
        $totalAvailableQuantity = 0;

        // Loop para calcular os custos e preços baseados nos itens disponíveis
        foreach ($availableItems as $itemId => $availableQuantity) {
            if (!$purchaseRecord = $purchasesData->get($itemId)) {
                continue;
            }

            $totalSum = $purchaseRecord->total_sum;
            $totalSumQty = $purchaseRecord->total_quantity_sum;

            $averagePurchasePrice = ($totalSumQty > 0) ? ($totalSum / $totalSumQty) : 0;

            $totalPurchaseCost += $averagePurchasePrice * $availableQuantity;
            $totalSalePrice += $purchaseRecord->sale_price * $availableQuantity;
            $totalAvailableQuantity += $availableQuantity;
        }

        return [
            'totalPurchaseCost' => round($totalPurchaseCost, 2),
            'totalSalePrice' => round($totalSalePrice, 2),
            'totalAvailableQuantity' => $totalAvailableQuantity,
        ];
    }

}
