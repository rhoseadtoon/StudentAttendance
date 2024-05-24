<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentController extends Controller
{
   
    public function index()
    {
        $student = Student::orderBy('fullname')->get();
        return view('student.index', compact('student'));
    }

 
    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'course' => 'required',
            'year_level' => 'required|integer',
            'email' => 'required|email|unique:students,email',
            'contact' => 'required',
        ]);
    
        Student::create([
            'fullname' => $request->fullname,
            'course' => $request->course,
            'year_level' => $request->year_level,
            'email' => $request->email,
            'contact' => $request->contact
        ]);
    
        return redirect('/students')->with('message', 'A new student has been added');
    }
    


    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    } 

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'fullname' => 'required',
            'course' => 'required',
            'year_level' => 'required|integer',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'contact' => 'required',
        ]);


        $student->update($request->all());
        return redirect('/students')->with('message', "$student->fullname has been updated successfully!");
    }

    public function delete(Student $student)
    {
        $student->delete();

        return redirect('/students')->with('message', "$student->fullname has been deleted successfully!");

    }

    public function generateQrCode(Student $student)
    {
        $url = route('students.show', $student);
        $qrCode = QrCode::size(300)->generate($url);
        return response($qrCode)->header('Content-Type', 'image/png');
    }

    public function pdf()
    {
        $students = Student::orderBy('id')->get();

        foreach ($students as $student) {
            $student->qrCode=QrCode::size(100)->generate($student->id);
        }

        $pdf = Pdf::loadView('student.pdf', compact('students'));

        return $pdf->download('list of students.pdf');
    }
}
