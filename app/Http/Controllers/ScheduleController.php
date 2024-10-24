<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3) {
            return redirect()->route('doctor.index');
        } else {
            return view('schedule.index', [
                'schedules' => Schedule::where(
                    'user_id',
                    Auth::user()->id
                )->get(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Schedule::create([
            'user_id' => $request->user_id,
            'schedule_name' => $request->schedule_name,
            'schedule_date' => $request->schedule_date,
        ]);

        return redirect('/schedule')->with(
            'success',
            'Berhasil Menambahkan Jadwal!'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update([
            'user_id' => $request->user_id,
            'schedule_name' => $request->schedule_name,
            'schedule_date' => $request->schedule_date,
        ]);

        return redirect('/schedule')->with(
            'success',
            'Berhasil Merubah Jadwal!'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect('/schedule')->with(
            'success',
            'Berhasil Menghapus Jadwal!'
        );
    }
}
