<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.index')
        ->with('students',Mahasiswa::all());
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
        $validatedData = $request->validate([
            'nrp' => ['required', 'string', 'max:9', 'unique:student,nrp'],
            'name' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:300'],
            'birth_date' => ['required'],
            'phone' => ['required', 'numeric'],
            'email' => ['nullable', 'email', 'max:50', 'unique:student,email'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'dosen_nik' => ['required', 'string'],
          ]);
          $student = new Mahasiswa($validatedData);
          if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $newFileName = $validatedData['nrp'] . '.' . $file->getClientOriginalExtension();
            $file->storePubliclyAs('students_picture', $newFileName);
            $student['profile_picture'] = $newFileName;
          }
          $student->save();
          return redirect()->route('student-list');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
