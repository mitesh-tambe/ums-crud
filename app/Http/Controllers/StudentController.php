<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $query = Student::where('status', 1)->with('teacher');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('students.name', 'like', "%{$search}%")
                  ->orWhere('students.admission_date', 'like', "%{$search}%")
                  ->orWhere('students.gender', 'like', "%{$search}%")
                  ->orWhereHas('teacher', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $students = $query->latest()->paginate(5);
        $teachers = Teacher::all();

        // dd($students);
        return view('students.index', compact('students'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $teachers = Teacher::all();
        return view('students.edit', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentStoreRequest $request): RedirectResponse
    {
        // dd($request->all());
        Student::create($request->post());
           
        return redirect()->route('students.index')
                         ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // dd($student);
        $teachers = Teacher::all();
        return view('students.edit',compact('student','teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $student->update($request->validated());
          
        return redirect()->route('students.index')
                        ->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $student = Student::findOrFail($id);
        $student->update(['status' => 0]);
           
        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }
}
