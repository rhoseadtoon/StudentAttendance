@extends('pages.home')

@section('content')

@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif
<h1>Attendance</h1>



<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    <a href="{{ url('/attendances/create') }}" class="btn btn-outline-success mb-3" type="button">
        Add New Attendance
    </a>

    <a href="{{ route('scanner') }}" class="btn btn-outline-secondary btn-sm align-items-center mb-3">
                <svg id="Layer_1" data-name="Layer 1" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.61 122.88" style="width: 20px; height: 20px;">
                    <title>scan</title>
                    <path d="M23.38,0h13V11.15h-13a12.22,12.22,0,0,0-8.64,3.57l0,0a12.22,12.22,0,0,0-3.57,8.64V39.32H0V23.38A23.32,23.32,0,0,1,6.86,6.89l0,0A23.31,23.31,0,0,1,23.38,0ZM3.25,54.91H119.36a3.29,3.29,0,0,1,3.25,3.27V64.7A3.29,3.29,0,0,1,119.36,68H3.25A3.28,3.28,0,0,1,0,64.7V58.18a3.27,3.27,0,0,1,3.25-3.27ZM90.57,0h8.66a23.28,23.28,0,0,1,16.49,6.86v0a23.32,23.32,0,0,1,6.87,16.52V39.32H111.46V23.38a12.2,12.2,0,0,0-3.6-8.63v0a12.21,12.21,0,0,0-8.64-3.58H90.57V0Zm32,81.85V99.5a23.46,23.46,0,0,1-23.38,23.38H90.57V111.73h8.66A12.29,12.29,0,0,0,111.46,99.5V81.85Zm-86.23,41h-13A23.32,23.32,0,0,1,6.86,116l-.32-.35A23.28,23.28,0,0,1,0,99.5V81.85H11.15V99.5a12.25,12.25,0,0,0,3.35,8.41l.25.22a12.2,12.2,0,0,0,8.63,3.6h13v11.15Z"/>
                </svg>
            </a>
</div>

<div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
    <a href="{{ route('attendance.csv') }}" class="btn btn-primary me-md-2" type="button">
        Download CSV
    </a>
    <a href="{{ route('attendance.import') }}" class="btn btn-secondary" type="button">
        Import CSV
    </a>
</div>


<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $attendance)
                        <tr>
                            <td>{{ $attendance->student->fullname }}</td>
                            <td>{{ $attendance->subject->name }}</td>
                            <td>
                                @if ($attendance->status == 'Absent')
                                    <span class="text-danger">{{ $attendance->status }}</span>
                                @elseif ($attendance->status == 'Present')
                                    <span class="text-success">{{ $attendance->status }}</span>
                                @else
                                    {{ $attendance->status }}
                                @endif
                            </td>
                            <td>{{ $attendance->created_at->format('M d, Y h:i A') }}</td>
                            <td class="d-flex justify-content-between align-items-center mt-3">
                                <div class="btn-group">
                                    <form action="{{ url('attendance/'.$attendance->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
