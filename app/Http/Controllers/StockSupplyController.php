<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplyStock;


class StockSupplyController extends Controller
{
    //
    public function showSupplyHistory($id)
    {
        $stock_supply = SupplyStock::findOrFail($id);
        //$stock_supply->load('supply.transactions.user');
        //dd($stock_supply);
        return view('supply_stock.show_stock_supply', compact('stock_supply'));
    }

    public function editSupplyStock($id)
    {
        /*$request->validate([
            'current_stock' => 'required',
            'consumed' => 'required',
            'total' => 'required',
        ]);*/

        $stock_supply = SupplyStock::find($id);

        /*$current_stock = $request->current_stock;
        $consumed = $request->consumed;
        $total = $request->total;
        
        $stock_supply->current_stock = $current_stock;
        $stock_supply->consumed = $consumed;
        $stock_supply->total = $total;
        $stock_supply->save();
        return back()->with('stock_supply_updated','Supply stock details updated successfully!');*/
        return response()->json([
            'status'=>200,
            'stock_supply'=> $stock_supply,
        ]);
    }

   public function updateSupplyStock(Request $request)
    {
        $stock_supply_id = $request->input('id');
        
        $stock_supply = SupplyStock::find($stock_supply_id);
        $stock_supply->current_Stock = $request->input('current_stock');
        $stock_supply->consumed = $request->input('consumed');
        $stock_supply->total = $request->input('total');
        $stock_supply->update();
        return redirect()->back()->with('stock_supply_updated','Supply stock details updated successfully!');
    }

    public function stocksSupply()
    {
        $stocks_supply = SupplyStock::all();
        //$total = $stocks_supply->total;
        //$total = $stocks_supply->current_stock - $stocks_supply->consumed;
        //if($stocks_supply->supply->deleted_at != NULL)
        //{
          //  return $stocks_supply;
        //}
        //->isoFormat('MMMM Do YYYY, h:mm:ss a')
        return view('supply_stock.index-stock-supply',compact('stocks_supply'));
    }



}
