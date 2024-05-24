<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    // Display a listing of the attendances
    public function index()
    {
        $attendances = Attendance::orderBy('id')->get();
        return view('attendance.index', compact('attendances'));
    }

    // Show the form for creating a new attendance
    public function create()
    {
        $subjects = Subject::all(); 
        $students = Student::all(); 
        return view('attendance.create', compact('subjects', 'students'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|numeric',
            'student_id' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Attendance::create($request->only('subject_id', 'student_id', 'status'));

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Attendance recorded successfully']);
        }

        return redirect('/attendances')->with('message', 'A new attendance has been added');
    }


    public function delete($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return redirect('/attendances')->with('message', $attendance->student->fullname . " has been deleted successfully");
    }


    // Export attendances to CSV
    public function exportCsv()
    {
        $attendances = Attendance::all();
        $filename = 'attendances.csv';
        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['ID', 'Subject Name', 'Student FullName', 'Status']);
    
        foreach ($attendances as $attendance) {
            fputcsv($handle, [
                $attendance->id,
                $attendance->subject->name,
                $attendance->student->fullname,
                $attendance->status
            ]);
        }
    
        fclose($handle);
    
        $headers = [
            'Content-Type' => 'text/csv',
        ];
    
        return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
    }
    
    public function importCsvForm()
    {
        return view('attendance.import');
    }

    // Import attendances from CSV
    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');

        if ($file) {
            $csvData = file_get_contents($file);
            $rows = array_map('str_getcsv', explode("\n", $csvData));
            $header = array_shift($rows);

            // Standardize header keys to avoid undefined key issues
            $header = array_map('trim', $header);

            // Expected header names
            $expectedHeaders = ['Student', 'Subject', 'Status'];

            // Check if the headers match the expected headers
            if ($header !== $expectedHeaders) {
                return redirect('/attendances')->with('message', 'CSV headers do not match expected headers.');
            }

            foreach ($rows as $row) {
                // Skip empty rows
                if (empty($row) || count($row) !== count($header)) {
                    continue;
                }

                $row = array_combine($header, $row);

                // Ensure data is trimmed to avoid issues with leading/trailing spaces
                $row = array_map('trim', $row);

                // Find or create the subject and student
                $subject = Subject::firstOrCreate(['name' => $row['Subject Name']]);
                $student = Student::firstOrCreate(['fullname' => $row['Student FullName']]);

                // Create the attendance record
                Attendance::create([
                    'subject_id' => $subject->id,
                    'student_id' => $student->id,
                    'status' => $row['Status'],
                ]);
            }
        }

        return redirect('/attendances')->with('message', 'Attendances imported successfully.');
    }

    public function handleScan(Request $request)
    {
        $data = $request->input('data');

        // Assuming the QR code contains student information in JSON format
        $studentInfo = json_decode($data, true);

        if (!$studentInfo || !isset($studentInfo['fullname'])) {
            return response()->json(['success' => false, 'message' => 'Invalid QR code data.']);
        }

        $student = Student::where('fullname', $studentInfo['fullname'])->first();

        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Student not found.']);
        }

        // Assuming you have a default subject or you can pass the subject_id from the QR code
        $subject = Subject::first(); // Get the first subject or customize as needed

        if (!$subject) {
            return response()->json(['success' => false, 'message' => 'No subjects available.']);
        }

        Attendance::create([
            'subject_id' => $subject->id,
            'student_id' => $student->id,
            'status' => 'Present',
        ]);

        return response()->json(['success' => true, 'message' => 'Attendance added successfully.']);
    }

}
