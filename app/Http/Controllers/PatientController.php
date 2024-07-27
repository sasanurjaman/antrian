<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use App\Models\Queue;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('patient.index', [
            'patients' => Patient::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        $validated = $request->validated();

        $validated['patient_image'] = $request
            ->file('patient_image')
            ->store('/patient');

        if ($request->file('patient_file')) {
            $validated['patient_file'] = $request
                ->file('patient_file')
                ->store('/bpjs');
        }

        Patient::create($validated);

        // $patien_id = Patient::insertGetId($validated);

        // // create queue nomber
        // $date = date('Y-m-d');
        // $queue = Queue::where('created_at', 'LIKE', "%$date%")->count() + 1;

        // Queue::create([
        //     'patient_id' => $patien_id,
        //     'queue_number' => $queue,
        //     'queue_active' => 1,
        //     'created_at' => now(),
        // ]);

        return redirect('/dashboard')->with(
            'success',
            'pendaftaran pasien berhasil dilakukab'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        // dd($patient);
        return view('patient.show', [
            'patient' => $patient,
            'queque' => Queue::where('patient_id', $patient->id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patient.edit', [
            'patient' => $patient,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $validated = $request->validated();

        $patient->update($validated);

        return redirect()->route('patient.show', $patient->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function queuelatest()
    {
        $data = [];
        $date = date('Y-m-d');
        $queue_latest = Queue::where('created_at', 'LIKE', "%$date%")
            ->where('queue_active', 1)
            ->first();
        $data['queue_latest'] = $queue_latest->queue_number;

        $queue_count = Queue::where('created_at', 'LIKE', "%$date%")->count();
        $data['queue_count'] = $queue_count;
        return $data;
    }
}
