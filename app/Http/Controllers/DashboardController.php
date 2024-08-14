<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role_id == 2) {
            if (Doctor::where('user_id', Auth::user()->id)->count() == 1) {
                $doctor = Doctor::where('user_id', Auth::user()->id)->first();
                return redirect()->route('doctor.show', $doctor->id);
            } else {
                return redirect()->route('doctor.create');
            }
        } else {
            if (Auth::user()->role_id == 3) {
                $patient = Patient::where('user_id', Auth::user()->id)->first();
                return redirect()->route('patient.show', $patient->id);
            } else {
                return redirect()->route('patient.index');
            }
        }
    }
}
