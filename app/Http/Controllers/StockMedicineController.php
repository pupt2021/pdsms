<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicineStock;

class StockMedicineController extends Controller
{
    //
    public function showMedicineHistory($id)
    {
        $stock_medicine = MedicineStock::findOrFail($id);
        return view('medicine_stock.show_stock_medicine', compact('stock_medicine'));
    }

    public function editMedicineStock($id)
    {
        $stock_medicine = MedicineStock::find($id);
        return response()->json([
            'status'=>200,
            'stock_medicine'=> $stock_medicine,
        ]);
    }

   public function updateMedicineStock(Request $request)
    {
        $stock_medicine_id = $request->input('id');
        
        $stock_medicine = MedicineStock::find($stock_medicine_id);
        $stock_medicine->current_Stock = $request->input('current_stock');
        $stock_medicine->consumed = $request->input('consumed');
        $stock_medicine->total = $request->input('total');
        $stock_medicine->update();
        return redirect()->back()->with('stock_medicine_updated','Medicine stock details updated successfully!');
    }

    public function stocksMedicine()
    {
        $stocks_medicine = MedicineStock::all();
        return view('medicine_stock.index-stock-medicine',compact('stocks_medicine'));
    }

}
