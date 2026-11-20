<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();

        return view('student.list', compact('students'));
    }

    // Display the create student form
    public function create()
    {
        return view('student.create');
    }

    // Store a new student
    public function store(Request $request)
    {
        $student = Student::create(
            $request->validate($this->rules())
        );

        return redirect()->route('students.index')
            ->with('success', "Student {$student->name} created successfully!");
    }

    // Display a specific student
    public function show(Student $student)
    {
        return view('student.detail', compact('student'));
    }

    // Display the edit student form
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    // Update an existing student
    public function update(Request $request, Student $student)
    {
        $student->update(
            $request->validate($this->rules($student))
        );

        return redirect()->route('students.show', $student)
            ->with('success', "Student {$student->name} updated successfully!");
    }

    // Delete a student
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }

    // Reusable validation rules
    private function rules(?Student $student = null): array
    {
        return [
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students')->ignore($student?->id),
            ],

            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
            'date_of_birth' => 'nullable|date',
        ];
    }
}
