<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate(10);

        return view('dashboard.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|min:3',
            'descritpoin' => 'nullable',
            'price' => 'required|Numeric',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'old_price' => "nullable|gt:price",
        ]);
   
        $photo = $request->photo->store('courses_photo', 'upload');
        
       Course::create([
        'name' => $request->name,
        'descriptoin' => $request->description,
        'price' => $request->price,
        'old_price' => $request->old_price,
        'photo' => $photo

       ]);

       return redirect()->route('courses.index')->with(['success' => "Added Successfuly"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id);

        if(!$course){
            return redirect()->route('courses.index')->with(['error' => 'This Course Dson\' Exist']);
        }

        return view('dashboard.courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $request->validate([
            'name' => 'required|min:3',
            'descritpoin' => 'nullable',
            'price' => 'required|Numeric',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'old_price' => "nullable|gt:price",
        ]);

       
        $course = Course::find($id);

        if(!$course){
            return redirect()->route('courses.index')->with(['error' => 'This Course Dson\' Exist']);
        }

        $oldPhoto = $course->photo;

        $photo = $oldPhoto;

        if($request->has('photo')){
            $photo = $request->photo->store('courses_photo', 'upload');
        }

        $course->update([
            'name' => $request->name,
            'descriptoin' => $request->description,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'photo' => $photo
        ]);

        if ($oldPhoto != $photo) {
            Storage::disk('upload')->delete($oldPhoto);
        }

        return redirect()->route('courses.index')->with(['success' => "Updated Successfuly"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);

        if(!$course){
            return redirect()->route('courses.index')->with(['error' => 'This Course Dson\' Exist']);
        }

        $oldPhoto = $course->photo;

        Storage::disk('upload')->delete($oldPhoto);

        $course->delete();

        return redirect()->route('courses.index')->with(['success' => "Deleted Successfuly"]);
        
    }
}
