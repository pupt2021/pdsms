<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use Carbon\Carbon;

class MedicineController extends Controller
{
    //function ng add medicine
    public function addMedicine()
    {
        return view('medicine.add-medicine');
    }

    public function trashMedicines()
    {
        $trash_medicines = Medicine::onlyTrashed()->get();
        return view('medicine.trash-medicine',compact('trash_medicines'));
    }

    //function ng list of medicine
    public function medicines()
    {
        $dental_medicines = Medicine::all();
        return view('medicine.all-medicine',compact('dental_medicines'));
       //->with('supply_added','Supply record has been inserted');
    }

    //function for storing medicine
    public function storeMedicine(Request $request)
    {
        $request->validate([
            'medicine_name' => 'required',
            //'quantity' => 'required',
            'unit' => 'required',
            'danger_level' => 'required',
            'date_received' => 'required',
            'expiration_date' => 'required',
        ]);

        $medicine_name = $request->medicine_name;
       // $quantity = $request->quantity;
        $unit = $request->unit;
        $danger_level = $request->danger_level;
        $date_received = $request->date_received;
        $expiration_date = $request->expiration_date;

        $medicine = new Medicine();
        $medicine->medicine_name = $medicine_name;
       // $medicine->quantity = $quantity;
        $medicine->unit = $unit;
        $medicine->danger_level = $danger_level;
        $medicine->date_received = $date_received;
        $medicine->expiration_date = $expiration_date;
        $medicine->save();
        return back()->with('medicine_added','Medicine record has been inserted!');
       //return response()->json($supply);
    }

    //function for editing medicine
    public function editMedicine($id)
    {
      $medicine = Medicine::find($id);
      return view('medicine.edit-medicine',compact('medicine'));
      //return response()->json($supply);
    }

    public function updateMedicine(Request $request)
    {
       $request->validate([
            'medicine_name' => 'required',
            //'quantity' => 'required',
            'unit' => 'required',
            'danger_level' => 'required',
            'date_received' => 'required',
            'expiration_date' => 'required',
        ]);

        $medicine = Medicine::find($request->id);

        $medicine_name = $request->medicine_name;
        //$quantity = $request->quantity;
        $unit = $request->unit;
        $danger_level = $request->danger_level;
        $date_received = $request->date_received;
        $expiration_date = $request->expiration_date;

        $medicine->medicine_name = $medicine_name;
       // $medicine->quantity = $quantity;
        $medicine->unit = $unit;
        $medicine->danger_level = $danger_level;
        $medicine->date_received = $date_received;
        $medicine->expiration_date = $expiration_date;
        $medicine->save();
        return back()->with('medicine_updated','Medicine information updated successfully!');
    }

    public function deleteMedicine($id)
    {
        $medicine = Medicine::find($id);
        //unlink(public_path('images').'/'.$supply->picture);
        $medicine->delete();
        //return back()->with('medicine_deleted','Medicine deleted successfully!');
        return response()->json(['status'=>'Medicine deleted successfully!']);
    }

    public function restoreMedicine($id)
    {
        $restore = Medicine::withTrashed()->find($id);
        $restore->restore();
        //return back()->with('medicine_restored','Medicine has been restored successfully!');
        return response()->json(['status'=>'Medicine record restored successfully!']);
    }
}
