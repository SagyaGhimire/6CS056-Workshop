<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();

        return StudentResource::collection($students);
    }

    // Store a new student
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());

        return (new StudentResource($student))
            ->response()
            ->setStatusCode(201);
    }

    // Display a single student
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    // Update an existing student
    public function update(
        UpdateStudentRequest $request,
        Student $student
    ) {
        $student->update($request->validated());

        return new StudentResource($student->fresh());
    }

    // Delete a student
    public function destroy(Student $student): JsonResponse
    {
        $student->delete();

        return response()->json(null, 204);
    }
}
