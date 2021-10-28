<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Appointment;

class DynamicPDFController extends Controller
{
    //
    function patientReport()
    {
        $patient_data = $this->get_patient_data();
        return view('pdf_reports.patientpdf')->with('patient_data', $patient_data);
    }

    function get_patient_data(){
        $patient_data = DB::table('patients')
            ->limit(5)
            ->get();
        return $patient_data;
    }

    function patientpdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_patient_data_to_html());
        return $pdf->stream();
    }

    function convert_patient_data_to_html()
    {
        $patient_data = $this->get_patient_data();
        $output = '
     <img src="assets/dms_images/PUPTLogo.png" style="width:15%; margin-left:45px;" ></img>
       <h3 style="margin-top:-125px; margin-left:180px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h>
       <h3 style="margin-left:135px;">Taguig Branch</h3>
       <h4 style="margin-left:40px; margin-top:-20px;">Patient and Dental Supply Monitoring System</h4>
     <h3 style="margin-left:130px;">List of Patients</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="25%">Patients Name</th>
    <th style="border: 1px solid; padding:12px;" width="8%">Gender</th>
   <!--<th style="border: 1px solid; padding:12px;" width="15%">Birthdate</th>-->
    <th style="border: 1px solid; padding:12px;" width="10%">Contact No.</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Email</th>
   
   </tr>

     ';
        foreach($patient_data as $patient)
        {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$patient->firstname.' '.$patient->middlename.' '.$patient->lastname.' '.$patient->extensionname.'</td>
       <td style="border: 1px solid; padding:12px;">'.$patient->gender.'</td>
       <!--<td style="border: 1px solid; padding:12px;">'.$patient->birthday.'</td>-->
       <td style="border: 1px solid; padding:12px;">'.$patient->contactnumber.'</td>
       <td style="border: 1px solid; padding:12px;">'.$patient->email.'</td>
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }

    function medicineReport()
    {
        $medicine_data = $this->get_medicine_data();
        return view('pdf_reports.medicinepdf')->with('medicine_data', $medicine_data);
    }

    function get_medicine_data(){
        $medicine_data = DB::table('medicines')
            ->limit(5)
            ->get();
        return $medicine_data;
    }
    function medicinepdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_medicine_data_to_html());
        return $pdf->stream();
    }

    function convert_medicine_data_to_html()
    {
        $medicine_data = $this->get_medicine_data();
        $output = '
     <img src="assets/dms_images/PUPTLogo.png" style="width:15%; margin-left:45px;" ></img>
       <h3 style="margin-top:-125px; margin-left:180px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h>
       <h3 style="margin-left:135px;">Taguig Branch</h3>
       <h4 style="margin-left:40px; margin-top:-20px;">Patient and Dental Supply Monitoring System</h4>
     <h3 style="margin-left:130px;">List of Medicines</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="30%">Medicine Name</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Quantity</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Date Received</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Expiration Date</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Unit</th>
   </tr>

     ';
        foreach($medicine_data as $medicine)
        {
            $output .= '
       <tr>
       <td style="border: 1px solid; padding:12px;">'.$medicine->medicine_name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$medicine->quantity.'</td>
       <td style="border: 1px solid; padding:12px;">'.$medicine->date_received.'</td>
       <td style="border: 1px solid; padding:12px;">'.$medicine->expiration_date.'</td>
       <td style="border: 1px solid; padding:12px;">'.$medicine->unit.'</td>
      </tr>

      ';
        }
        $output .= '</table>';
        return $output;
    }

    function supplyReport()
    {
        $supply_data = $this->get_supply_data();
        return view('pdf_reports.supplypdf')->with('supply_data', $supply_data);
    }

    function get_supply_data(){
        $supply_data = DB::table('supplys')
            ->limit(5)
            ->get();
        return $supply_data;
    }

    function supplypdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_supply_data_to_html());
        return $pdf->stream();
    }

    function convert_supply_data_to_html()
    {
        $supply_data = $this->get_supply_data();
        $output = '
     <img src="assets/dms_images/PUPTLogo.png" style="width:15%; margin-left:45px;" ></img>
       <h3 style="margin-top:-125px; margin-left:180px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h>
       <h3 style="margin-left:135px;">Taguig Branch</h3>
       <h4 style="margin-left:40px; margin-top:-20px;">Patient and Dental Supply Monitoring System</h4>
     <h3 style="margin-left:130px;">List of Supplies</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Supply Name</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Quantity</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Unit</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Date Received</th>
   </tr>

     ';
        foreach($supply_data as $supply)
        {
            $output .= '
       <tr>
       <td style="border: 1px solid; padding:12px;">'.$supply->supply_name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$supply->quantity.'</td>
       <td style="border: 1px solid; padding:12px;">'.$supply->unit.'</td>
       <td style="border: 1px solid; padding:12px;">'.$supply->date_received.'</td>
      </tr>


      ';
        }
        $output .= '</table>';
        return $output;
    }

    function appointmentReport()
    {
        $appointment_data = $this->get_appointment_data();
        return view('pdf_reports.appointmentpdf')->with('appointment_data', $appointment_data);
    }

    function get_appointment_data(){
        $appointment_data = Appointment::all();
        return $appointment_data;
    }

    function appointmentpdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_appointment_data_to_html());
        return $pdf->stream();
    }

    function convert_appointment_data_to_html()
    {
        $appointment_data = $this->get_appointment_data();
        $output = '
     <img src="assets/dms_images/PUPTLogo.png" style="width:15%; margin-left:45px;" ></img>
       <h3 style="margin-top:-125px; margin-left:180px;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h>
       <h3 style="margin-left:135px;">Taguig Branch</h3>
       <h4 style="margin-left:40px; margin-top:-20px;">Patient and Dental Supply Monitoring System</h4>
     <h3 style="margin-left:110px;">List of Appointments</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="35%">Patient Name</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Service rendered</th>
    <th style="border: 1px solid; padding:12px;" width="10%">Date</th>
    <!--<th style="border: 1px solid; padding:12px;" width="12%">Time</th>
    <th style="border: 1px solid; padding:12px;" width="10%">Status</th>-->
   </tr>

     ';
        foreach($appointment_data as $appointment)
        {
            $output .= '
       <tr>
       <td style="border: 1px solid; padding:12px;">'.$appointment->patient->firstname.' '.$appointment->patient->middlename.' '.$appointment->patient->lastname.' '.$appointment->patient->extensionname.' </td>
       <td style="border: 1px solid; padding:12px;">'.$appointment->service->service.'</td>
       <td style="border: 1px solid; padding:12px;">'.date('m/d/Y', strtotime($appointment->date)).'</td>
       <!--<td style="border: 1px solid; padding:12px;">'.date('h:m A', strtotime($appointment->time)).'</td>-->
       <!--<td style="border: 1px solid; padding:12px;">'.$appointment->status.'</td>-->
      </tr>


      ';
        }
        $output .= '</table>';
        return $output;
    }
}
