<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('doctor.index', [
            'doctors' => Doctor::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        $validateData = $request->validated();

        $validateData['doctor_image'] = $request
            ->file('doctor_image')
            ->store('/doctor');

        Doctor::create($validateData);

        return redirect()
            ->route('doctor.index')
            ->with(
                'success',
                "Data dokter $request->doctor_name berhasih disimpan!"
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('doctor.show', [
            'doctor' => User::join(
                'doctors',
                'users.id',
                '=',
                'doctors.user_id'
            )
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->select('users.*', 'doctors.*', 'roles.role_name as role_name')
                ->where('doctors.id', $doctor->id)
                ->first(),
            'schedules' => Schedule::where('doctor_id', $doctor->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctor.edit', [
            'doctor' => $doctor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $validateData = $request->validate([
            'user_id' => '',
            'doctor_name' => '',
            'doctor_gender' => '',
            'doctor_brithday' => '',
            'doctor_address' => '',
            'doctor_specialization' => '',
            'doctor_image' => '',
        ]);

        if ($request->file('doctor_image')) {
            $validateData['doctor_image'] = $request
                ->file('doctor_image')
                ->store('/doctor');
        }

        $doctor->update($validateData);

        return redirect()->route('doctor.show', $doctor->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        if ($doctor->doctor_image) {
            if (Storage::exists($doctor->doctor_image)) {
                Storage::delete($doctor->doctor_image);
            }
        }

        $doctor->delete();

        $user = User::where('id', $doctor->user_id)->first();

        if ($user) {
            $user->delete();
        }

        return redirect()->route('doctor.index');
    }
    /**
     * add new user doctor in storage
     */
    public function add(Request $request)
    {
        $validateData = $request->validate(
            [
                'role_id' => 'required',
                'name' => 'required|string|min:4',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ],
            [
                'role_id' => 'Harus diisi',
                'name' => 'nama minimal 4 karakter',
                'email' => 'email telah terdaftar',
                'password' => 'password min 8 karakter',
            ]
        );

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);
        return redirect()
            ->route('doctor.index')
            ->with(
                'success',
                "Akun Dokter $request->name berhasil ditambakan!"
            );
    }
}
