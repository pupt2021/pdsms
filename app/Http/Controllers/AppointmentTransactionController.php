<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentTransaction;

class AppointmentTransactionController extends Controller
{
    //
    public function indexAppointmentTransaction()
    {
        $appointment_transactions = AppointmentTransaction::orderBy('created_at', "desc")->get();

        return view('appointment_transactions.index-transactions-appointments', compact('appointment_transactions'));
    }
}
