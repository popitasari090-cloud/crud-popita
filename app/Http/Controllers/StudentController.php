<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim'           => 'required|unique:students,nim',
            'name'          => 'required|string|max:255',
            'birth_place'   => 'required|string|max:100',
            'birth_date'    => 'required|date',
            'gender'        => 'required|in:L,P',
            'address'       => 'required|string',
            'study_program' => 'required|string|max:100',
            'phone_number'  => 'required|numeric',
            'email'         => 'required|email|unique:students,email',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nim'           => 'required|unique:students,nim,' . $student->id,
            'name'          => 'required|string|max:255',
            'birth_place'   => 'required|string|max:100',
            'birth_date'    => 'required|date',
            'gender'        => 'required|in:L,P',
            'address'       => 'required|string',
            'study_program' => 'required|string|max:100',
            'phone_number'  => 'required|numeric',
            'email'         => 'required|email|unique:students,email,' . $student->id,
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}