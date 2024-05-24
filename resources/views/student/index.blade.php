@extends('pages.home')

@section('content')
    <div class="container">
        <h1>Students</h1>

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <a href="{{ url('/students/create') }}" class="btn btn-success me-md-2" type="button">
                Add new user
            </a>

            <a href="student/pdf" class="btn btn-outline-warning mb-3">Generate PDF</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Course</th>
                    <th>Year Level</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>QR Code</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($student as $student)
                    <tr>
                        <td>{{ $student->fullname }}</td>
                        <td>{{ $student->course }}</td>
                        <td>{{ $student->year_level }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->contact }}</td>
                        <td>
                            {!! QrCode::size(100)->generate("Student: $student->fullname") !!}
                        </td>
                        <td class="text-center">
                            <a href="{{ url('/students/'.$student->id) }}" class="btn btn-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
