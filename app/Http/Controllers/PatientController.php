<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Appointment;
use App\Imports\PatientImport;
use Illuminate\Support\Collection;
use Excel;
use Carbon\Carbon;
use DB;

class PatientController extends Controller
{
    //function ng add patient
    public function addPatient()
    {
        return view('patient.add-patient');
    }

    public function trashPatients()
    {
        $trash_patients = Patient::onlyTrashed()->get();
        return view('patient.trash-patient',compact('trash_patients'));
    }

    //function ng list of patient
    public function patients()
    {
        $patients = Patient::all();
       
        return view('patient.all-patient',compact('patients'));
       //->with('supply_added','Supply record has been inserted');
    }

    //function for storing patient
    public function storePatient(Request $request)
    {
    //dd($request->all());
        $request->validate([
            'firstname' => 'required|regex:/^[a-zA-Z\s]+$/',
            'middlename' => 'nullable|regex:/^[a-zA-Z\s]+$/',
            'lastname' => 'required|regex:/^[a-zA-Z\s]+$/',
            'extensionname' => 'nullable|regex:/^[a-zA-Z\s]+$/',
            'patient_category'=> 'required',
            'group_class'=> 'required',
            'picture' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'gender' => 'required',
            'birthday' => 'required',
            'email' => 'required|email|unique:patients',
            //'contactnumber' => 'required|min:11|max:11|unique:patients|regex:/^(09)[0-9]{9}$/|numeric',
            'streetnumber' => 'required',
            'streetname' => 'required',
            'brgy' => 'required',
            'district' => 'required',
            'city' => 'required',
        ]);

        
        
        //$patient_picture = $request->file('picture');
        //$imageName = time().'.'.$patient_picture->extension();
        //$patient_picture->move(public_path('patient_pics'),$imageName);

        $first_name = $request->firstname;
        $middle_name = $request->middlename;
        $last_name = $request->lastname;
        $extension_name = $request->extensionname;
        $patient_category = $request->patient_category;
        $group_class = $request->group_class;
        $gender = $request->gender;
        $birthday = $request->birthday;
        $email = $request->email;
        $contact_number = $request->contactnumber;
        $street_number = $request->streetnumber;
        $street_name = $request->streetname;
        $brgy = $request->brgy;
        $district = $request->district;
        $city = $request->city;
        //$med_history = implode(',', $request->med_history);
        //$input_med_history = $request->all();
        $input_med_history = $request->input('med_history');
        $allergies = $request->allergies;
        $medication = $request->medication;
        $others = $request->others;

        $patient = new Patient();

        if($request->hasFile('picture'))
        {
            $request->validate([
                'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $patient_picture = $request->file('picture');
            $imageName = time().'.'.$patient_picture->extension();
            $patient_picture->move(public_path('patient_pics'),$imageName);
            $patient->picture = $imageName;
        }

        $patient->firstname = $first_name;
        $patient->middlename = $middle_name;
        $patient->lastname = $last_name;
        $patient->extensionname = $extension_name;
        $patient->patient_category = $patient_category;
        $patient->group_class = $group_class;
        $patient->gender = $gender;
        $patient->birthday = $birthday;
        $patient->email = $email;
        $patient->contactnumber = $contact_number;
        $patient->streetnumber = $street_number;
        $patient->streetname = $street_name;
        $patient->brgy = $brgy;
        $patient->district = $district;
        $patient->city = $city;
        $patient->med_history = $input_med_history;
        $patient->allergies = $allergies;
        $patient->medication = $medication;
        $patient->others = $others;

         
        $patient->save();
        
        return back()->with('patient_added','Patient record has been inserted');
    }

    //function for editing patient
    public function editPatient($id)
    {
      $patient = Patient::find($id);
      //$med_history = [];
      //$collection = collect(Patient::where('id',$id)->get());
      //$med_history = $collection->pluck('med_history');
      //$chunks = $med_history->chunk(1);
      //$chunks->toArray();
      //$collection->toArray();
      //$med_history->toArray();
      //$pota = $med_history->contains(["High Blood"]);
     //$pota->all();

     //$isTrue = $med_history->contains('High Blood');
    // 'High Blood, Low Blood, Heart Attack, Stroke, Respiratory Disease, Diabetes, Heart Disease, Infection Disease, Asthma, Cancer, Kidney Disease, Thyroid Problems, Ulcer, Blood Disease'
      //dd($pota);
     //dd($med_history);
      //$collection->toArray();
      //$collection->contains('High Blood', 'Low Blood', 'Heart Attack');
      // $md = json_decode($patient->med_history, true);
       $collection = collect(json_decode($patient->med_history, true));
       //$collection = $md->collect();
       //$collection->toArray();
       // dd($try);
      return view('patient.edit-patient',compact('patient', 'collection'));
    }

    public function updatePatient(Request $request)
    {
        //dd($request->all());
       $request->validate([
            'firstname' => 'required|regex:/^[a-zA-Z\s]+$/',
            'lastname' => 'required|regex:/^[a-zA-Z\s]+$/',
            'gender' => 'nullable',
            //'patient_category'=>'required',
            //'birthday' => 'required',
            'email' => 'required|email',
            'contactnumber' => 'required|min:11|max:11',
            'streetnumber' => 'required',
            'streetname' => 'required',
            'brgy' => 'required',
            'district' => 'required',
            'city' => 'required',
        ]);

        $patient = Patient::find($request->id);

        if($request->hasFile('picture'))
        {
            $request->validate([
                'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $patient_picture = $request->file('picture');
            $imageName = time().'.'.$patient_picture->extension();
            $patient_picture->move(public_path('patient_pics'),$imageName);
            $patient->picture = $imageName;
        }

        $first_name = $request->firstname;
        $middle_name = $request->middlename;
        $last_name = $request->lastname;
        $extension_name = $request->extensionname;
        $gender = $request->gender;
        $patient_category = $request->patient_category;
        $group_class = $request->group_class;
        //$birthday = $request->birthday;
        $email = $request->email;
        $contact_number = $request->contactnumber;
        $street_number = $request->streetnumber;
        $street_name = $request->streetname;
        $brgy = $request->brgy;
        $district = $request->district;
        $city = $request->city;
        $med_history = $request->med_history;
        //dd($input_med_history);
        /*if($request->has('med_history'))
        {
        $med_history = implode(',', $request->med_history);
        $patient->med_history = $med_history;
        }else{
             $med_history = $request->med_history;
        $patient->med_history = $med_history;
        }*/
        $allergies = $request->allergies;
        $medication = $request->medication;
        $others = $request->others;
        $remarks = $request->remarks;

        $patient->firstname = $first_name;
        $patient->middlename = $middle_name;
        $patient->lastname = $last_name;
        $patient->extensionname = $extension_name;
        $patient->gender = $gender;
        $patient->patient_category = $patient_category;
        $patient->group_class = $group_class;
        //$patient->birthday = $birthday;
        $patient->email = $email;
        $patient->contactnumber = $contact_number;
        $patient->streetnumber = $street_number;
        $patient->streetname = $street_name;
        $patient->brgy = $brgy;
        $patient->district = $district;
        $patient->city = $city;

        $patient->med_history = $med_history;
        $patient->allergies = $allergies;
        $patient->medication = $medication;
        $patient->others = $others;
        $patient->remarks = $remarks;
        $patient->save();
        return back()->with('patient_updated','Patient information updated successfully!');
    }

    public function deletePatient($id)
    {
        $patient = Patient::find($id);
        //unlink(public_path('patient_pics').'/'.$patient->picture);
        $patient->delete();
        //return back()->with('patient_deleted','Patient deleted successfully!');
        return response()->json(['status'=>'Patient deleted successfully!']);
    }

    public function patientDetails($id){
        $patient= Patient::findOrFail($id);
        $md = json_decode($patient->med_history, true);

        $apt = Appointment::where([
                ['patient_id',$id],
                ['status', 'Closed']
                ])->get();
        //dd($apt);
        return view('patient.details-patient',compact('patient', 'md', 'apt'));
    }

    public function restorePatient($id)
    {
        $restore = Patient::withTrashed()->find($id);
        $restore->restore();
        //return back()->with('patient_restored','Patient has been restored successfully!');
        return response()->json(['status'=>'Patient record restored successfully!']);
    }

    public function importFormPatients()
    {
        return view('patient.import-patient-form');
    }

    public function importPatients(Request $request)
    {
         $request->validate([
                'file' => 'required|mimes:csv,txt,xlsx,xls',
            ]);

      //Excel::import(new PatientImport, $request->file);
      $file = $request->file('file');
      $import = new PatientImport;
      $import->import($file);

      if($import->failures()->isNotEmpty()){
        return back()->withFailures($import->failures());
      }
      //dd($import->failures());

       return back()->with('patient_imported','Record has been imported successfully!');
       //kapag nakaqueue
       //return back()->with('patient_imported','Import in queue, we will send notification after import finished.');
    }
}
