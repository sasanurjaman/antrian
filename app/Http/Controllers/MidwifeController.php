<?php

namespace App\Http\Controllers;

use App\Http\Requests\MidwifeRequest;
use App\Models\Midwife;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MidwifeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('midwife.index', [
            'midwives' => Midwife::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('midwife.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MidwifeRequest $request)
    {
        $validateData = $request->validated();

        $validateData['midwife_image'] = $request
            ->file('midwife_image')
            ->store('/midwife');

        Midwife::create($validateData);

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                "Data Bidan $request->doctor_name berhasih disimpan!"
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Midwife $midwife)
    {
        return view('midwife.show', [
            'midwife' => $midwife->load('user', 'user.schedule', 'user.role'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Midwife $midwife)
    {
        return view('midwife.edit', [
            'midwife' => $midwife,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Midwife $midwife)
    {
        $validateData = $request->validate([
            'user_id' => '',
            'midwife_name' => '',
            'midwife_gender' => '',
            'midwife_brithday' => '',
            'midwife_address' => '',
            'midwife_specialization' => '',
            'midwife_image' => '',
        ]);

        if ($request->file('midwife_image')) {
            if ($midwife->midwife_image) {
                if (Storage::exists($midwife->midwife_image)) {
                    Storage::delete($midwife->midwife_image);
                }
            }
            $validateData['midwife_image'] = $request
                ->file('midwife_image')
                ->store('/midwife');
        }

        $midwife->update($validateData);

        return redirect()->route('midwife.show', $midwife->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Midwife $midwife)
    {
        $user = User::where('id', $midwife->user_id)->first();

        if ($midwife->midwife_image) {
            if (Storage::exists($midwife->midwife_image)) {
                Storage::delete($midwife->midwife_image);
            }
        }

        $user->delete();
        $midwife->delete();

        return redirect()
            ->route('midwife.index')
            ->with(
                'success',
                "Akun Bidan $midwife->midwife_name berhasil dihapus!"
            );
    }

    public function addmid(Request $request)
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
            ->route('midwife.index')
            ->with('success', "Akun Bidan $request->name berhasil ditambakan!");
    }
}
