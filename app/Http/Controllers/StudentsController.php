<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::all();

        return view('index', compact('students'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'=> 'required | max: 255',
            'email'=>'required | max: 255',
            'phone'=>'required | max: 255',
            'section'=>'required | max: 255',
            'image'=>'required | image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $image = $request->file('image');
        $destinationPath = 'image/';
        $profileImage=date('YmdHis').".".$image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image']= $profileImage;
        $student = Students::create($validateData);

        return redirect('/students');

/**
 * 
 public function store(Request $request)
{
    $validateData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'phone' => 'required|max:255',
        'section' => 'required|max:255',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $destinationPath = 'images/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image'] = $profileImage;
    }

    Students::create($validateData);

    return redirect()->route('students.index')->with('success', 'Student created successfully.');
}

 */



        //
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Students::find($id);
        return view('show', compact('student'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
