<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicineStock;
use App\Models\MedicineTransaction;

class MedicineTransactionsController extends Controller
{
    //
     public function indexMedicineTransaction()
    {
        $medicine_transactions = MedicineTransaction::orderBy('created_at', "desc")->get();

        return view('medicine_transactions.index-transactions-medicine', compact('medicine_transactions'));
    }

    public function storeStock(MedicineStock $stock_medicine)

    {
        $action      = request()->input('action', 'add') == 'add' ? 'add' : 'remove';
        $stockAmount = request()->input('stock', 1);
        $sign        = $action == 'add' ? '+' : '-';

        if ($stockAmount < 1) {
            return back()->with([
                'error' => 'No item was added/removed. Amount must be greater than 1.',
            ]);
        }

        MedicineTransaction::create([
            'stock'    => $sign . $stockAmount,
            'medicines_id' => $stock_medicine->medicine->id,           
            'user_id'  => auth()->user()->id,
        ]);

        if ($action == 'add') {
            $stock_medicine->increment('current_stock', $stockAmount);
            $stock_medicine->increment('total', $stockAmount);
            
           
            $status = $stockAmount . ' item(-s) was added to stock.';
        }

        if ($action == 'remove') {
            if ($stock_medicine->total - $stockAmount < 0) {     //current_stock - original
                return back()->with([
                    'error' => 'Not enough items in stock.',
                ]);
            }

            if ($stock_medicine->total - $stockAmount < $stock_medicine->medicine->danger_level) {     //current_stock - original

             $status = $stock_medicine->medicine->medicine_name . ' is about to run out of supply.';
                return back()->with([
                    'error' => $status,
                ]);
            }

            $stock_medicine->decrement('total', $stockAmount);
            $stock_medicine->increment('consumed', $stockAmount);
            $status = $stockAmount . ' item(-s) was removed from stock.';
        }

        return back()->with(['status' => $status,]);
    }
}
