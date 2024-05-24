<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <h1>Students List</h1>
    <table>
        <thead>
            <tr>
                <th>QR Code</th>
                <th>ID</th>
                <th>Full Name</th>
                <th>Course</th>
                <th>Year Level</th>
                <th>Email</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::size(80)->generate('Student: ' . $student->fullname . '\n' .
                        'Student: ' . $student->fullname . '\n' .
                        'Student: ' . $student->course . '\n' .
                        'Student: ' . $student->year_level)) !!} ">
                    </td>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->fullname }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->year_level }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->contact }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
