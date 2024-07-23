<?php

namespace App\Http\Controllers;

use App\Models\StudentRegister;
use App\Http\Requests\StoreStudentRegisterRequest;
use App\Http\Requests\UpdateStudentRegisterRequest;
use Illuminate\Http\Request;

class StudentRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = StudentRegister::all();
        return view('auth.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);

        StudentRegister::create($validated);

        return redirect()->route('user.students')->with('success', 'Student registered successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentRegister $studentRegister)
    {
        return view('auth.students.show', compact('studentRegister'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentRegister $studentRegister)
    {
        return view('auth.students.edit', compact('studentRegister'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRegisterRequest $request, StudentRegister $studentRegister)
    {
        $validated = $request->validated();

        if ($request->has('password')) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $studentRegister->update($validated);

        return redirect()->route('user.students')->with('success', 'Student information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentRegister $studentRegister)
    {
        $studentRegister->delete();

        return redirect()->route('user.students')->with('success', 'Student deleted successfully.');
    }
}
