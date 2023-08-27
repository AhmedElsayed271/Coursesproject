<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\SectionCourse;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $course = Course::find($id);
        $course_id = $course->id;
        if (!$course) {
            return redirect()->route('dashboard')->with(['error' => 'This Course Dson\' Exist']);
        }
        $sections = SectionCourse::where('course_id', $course_id)->paginate(15);

        return view('dashboard.sections.index', compact('sections', 'course_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('dashboard')->with(['error' => 'This Course Dson\' Exist']);
        }

        $course_id = $id;

        return view('dashboard.sections.create', compact('course_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $section = SectionCourse::with('course')->whereHas('course', function ($q) use ($request) {

            $q->where(function ($q) use ($request) {

                $q->where('course_id', $request->course_id);
            });
        })->where('Section_no', $request->section_no)->get();

    
        $request->validate([
            'name' => 'required|min:3',
            'section_no' => [
                'required',

                function ($attribute, $value, $fail) use ($request) {

                    $section = SectionCourse::with('course')->whereHas('course', function ($q) use ($request) {

                        $q->where(function ($q) use ($request) {

                            $q->where('course_id', $request->course_id);
                        });
                    })->where('Section_no', $request->section_no)->get();

                    if (count($section) != 0) {
                        $fail('This Number Is Already Taken');
                    }
                }
            ],
        ]);

        SectionCourse::create([
            'name' => $request->name,
            'section_no' => $request->section_no,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route("sections.index", $request->course_id)->with(['success' => "Added Successfuly"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $section =  SectionCourse::find($id);

        if (!$section) {
            return redirect()->route('courses.index')->with(['error' => 'This Course Dson\' Exist']);
        }
        $course_id = $section->course_id;
        return view('dashboard.sections.edit', compact('section', 'course_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        

    
        $section =  SectionCourse::find($id);

        if (!$section) {
            return redirect()->route('courses.index')->with(['error' => 'This Course Dson\' Exist']);
        }


        $request->validate([
            'name' => 'required|min:3',
            'section_no' => [
                'required',

                function ($attribute, $value, $fail) use ($request,$section) {

                    $section = SectionCourse::with('course')->whereHas('course', function ($q) use ($section,$request) {

                        $q->where(function ($q) use ($section,$request) {
            
                            $q->where('course_id', $section->course_id);
                        });
                    })->where('Section_no', $request->section_no)->where('id','!=',$section->id)->get();

                    if (count($section) != 0) {
                        $fail('This Number Is Already Taken');
                    }
                }
            ],
        ]);

        $course_id = $section->course_id;

        $section->update([
            'name' => $request->name,
            'section_no' => $request->section_no,
        ]);

        return redirect()->route("sections.index", $course_id)->with(['success' => "Updated Successfuly"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $section =  SectionCourse::find($id);

        $course_id = $section->course_id;

        if (!$section) {
            return redirect()->route('dashboard')->with(['error' => 'This Course Dson\' Exist']);
        }

        $section->delete();

        return redirect()->route("sections.index", $course_id)->with(['success' => "Deleted Successfuly"]);
    }
}
