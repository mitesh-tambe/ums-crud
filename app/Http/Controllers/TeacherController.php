<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\TeacherStoreRequest;
use App\Http\Requests\TeacherUpdateRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $query = Teacher::where('status', 1);

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('gender', 'like', "%{$search}%");
        }

        $teachers = $query->latest()->paginate(5);
          
        return view('teachers.index', compact('teachers'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('teachers.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherStoreRequest $request): RedirectResponse
    {
        // dd($request->all());
        Teacher::create($request->post());
           
        return redirect()->route('teachers.index')
                         ->with('success', 'teacher created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherUpdateRequest $request, Teacher $teacher)
    {
        $teacher->update($request->validated());
          
        return redirect()->route('teachers.index')
                        ->with('success','Teacher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher): RedirectResponse
    {
        $teacher->update(['status' => 0]);
           
        return redirect()->route('teachers.index')
                        ->with('success','Teacher deleted successfully');
    }
}
