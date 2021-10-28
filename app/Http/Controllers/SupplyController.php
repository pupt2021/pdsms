<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supply;

class SupplyController extends Controller
{
    //
    public function addSupply()
    {
        return view('supply.add-supply');
    }

    public function trashSupply()
    {
        $trash_supplies = Supply::onlyTrashed()->get();
        return view('supply.trash-supply',compact('trash_supplies'));
    }

    public function storeSupply(Request $request)
    {
        $request->validate([
            'supply_name' => 'required|unique:supplys',
            'file' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            //'quantity' => 'required',
            'unit' => 'required',
            'danger_level' => 'required',
            'date_received' => 'required',
        ]);

        $supply_name = $request->supply_name;  
        //$path = $request->file('file')->store('images');
        //$quantity = $request->quantity;
        $unit = $request->unit;
        $danger_level = $request->danger_level;
        $date_received = $request->date_received;

        $supply = new Supply();
         if($request->hasFile('file'))
        {
            $image = $request->file('file');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageName);
            $supply->picture = $imageName;
        }

        //$checkSupplyName = Supply::where('supply_name','=',$supply_name)->first();

        //if(!$checkSupplyName)
        //{
            //$supply->supply_name = $supply_name;
        //}else{
          //  return back()->with('error','Supply Name already exists!');
        //}
        
        $supply->supply_name = $supply_name;
       
       // $supply->quantity = $quantity;
        $supply->unit = $unit;
        $supply->danger_level = $danger_level;
        $supply->date_received = $date_received;
        $supply->save();

      /* $image = $request->file('file');
       $imageName = time().'.'.$image->extension();
       $image->move(public_path('images'),$imageName);
       $supply = new Supply();
       $supply->name = $request->name;
       $supply->picture = $imageName;
       $supply->quantity = $request->quantity;
       $supply->unit = $request->unit;
       $supply->date_received = $request->date_received;
       $supply->save();*/
       return back()->with('supply_added','Supply record has been inserted!');
       //return response()->json($supply);
    }

    public function supplies()
    {
        $supplies = Supply::all();
        return view('supply.all-supplies',compact('supplies'));
       //->with('supply_added','Supply record has been inserted');
    }

    public function editSupply($id)
    {
      $supply = Supply::find($id);
      return view('supply.edit-supply',compact('supply'));
      //return response()->json($supply);
    }

    public function updateSupply(Request $request)
    {
        $request->validate([
            'supply_name' => 'required',
            //'quantity' => 'required',
            'unit' => 'required',
            'danger_level' => 'required',
            'date_received' => 'required',
        ]);

        $supply = Supply::find($request->id);
       //$imageName = $supply->file;
        if($request->hasFile('file'))
        {
            //if($imageName){
                // delete(public_path('images'),$imageName);
            //}
            $request->validate([
                'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $image = $request->file('file');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageName);
            $supply->picture = $imageName;
        }

        $supply_name = $request->supply_name;
        //$quantity = $request->quantity;
        $unit = $request->unit;
        $danger_level = $request->danger_level;
        $date_received = $request->date_received;

        $supply->supply_name = $supply_name;
       // $supply->quantity = $quantity;
        $supply->unit = $unit;
        $supply->danger_level = $danger_level;
        $supply->date_received = $date_received;
        $supply->save();
        return back()->with('supply_updated','Supply details updated successfully!');
    }

    public function deleteSupply($id)
    {
        $supply = Supply::find($id);
        //delete picture in storage after delete supply
        //unlink(public_path('images').'/'.$supply->picture);
        $supply->delete();
        //return back()->with('supply_deleted','Supply deleted successfully!');
        return response()->json(['status'=>'Supply deleted successfully!']);
    }

    public function restoreSupply($id)
    {
        $restore = Supply::withTrashed()->find($id);
        $restore->restore();
        //return back()->with('dental_supply_restored','Supply has been restored successfully!');
        return response()->json(['status'=>'Supply restored successfully!']);
    }
}
