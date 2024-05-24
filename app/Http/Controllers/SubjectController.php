<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('subject.index', compact('subjects'));
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'teacher' => 'required',
        ]);

        Subject::create([
            'name' => $request->name,
            'description' => $request->description,
            'teacher' => $request->teacher,
        ]);

        return redirect('/subjects')->with('info', 'A new subject has been added');
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Subject $subject, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'teacher' => 'required',
        ]);

        $subject->update($request->all());
        return redirect('/subjects')->with('info', "$subject->name has been updated successfully");
    }


    public function delete(Subject $subject)
    {
        $subject->delete();
        return redirect('/subjects')->with('message', $subject->name . " has been deleted successfully");
    }
    

}
