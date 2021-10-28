<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplyStock;
use App\Models\SupplyTransaction;

class SupplyTransactionsController extends Controller
{
    //
    public function indexSupplyTransaction()
    {
        $supply_transactions = SupplyTransaction::orderBy('created_at', "desc")->get();

        return view('supply_transactions.index-transactions-supply', compact('supply_transactions'));
    }

    public function storeStock(SupplyStock $stock_supply)

    {
        $action      = request()->input('action', 'add') == 'add' ? 'add' : 'remove';
        $stockAmount = request()->input('stock', 1);
        $sign        = $action == 'add' ? '+' : '-';

        if ($stockAmount < 1) {
            return back()->with([
                'error' => 'No item was added/removed. Amount must be greater than 1.',
            ]);
        }

        SupplyTransaction::create([
            'stock'    => $sign . $stockAmount,
            'supplys_id' => $stock_supply->supply->id,           
            'user_id'  => auth()->user()->id,
        ]);

        if ($action == 'add') {
            //$current_stock = $stock_supply->current_stock;
            $stock_supply->increment('current_stock', $stockAmount);
            $stock_supply->increment('total', $stockAmount);
            
           
            $status = $stockAmount . ' item(-s) was added to stock.';
        }

        if ($action == 'remove') {
            if ($stock_supply->total - $stockAmount < 0) {     //current_stock - original
                return back()->with([
                    'error' => 'Not enough items in stock.',
                ]);
            }

            
            if ($stock_supply->total - $stockAmount < $stock_supply->supply->danger_level) {     //current_stock - original

             $status = $stock_supply->supply->supply_name . ' is about to run out of supply.';
                return back()->with([
                    'error' => $status,
                ]);
            }

            //$stock_supply->decrement('current_Stock', $stockAmount);
            $stock_supply->decrement('total', $stockAmount);
            $stock_supply->increment('consumed', $stockAmount);
            //total = $stock_supply->total;
            //$total = $stock_supplyquantity - ;
            //dd($stock_supply);
            
            $status = $stockAmount . ' item(-s) was removed from stock.';
        }

        return back()->with([
            'status' => $status,
        ]);
    }
}
