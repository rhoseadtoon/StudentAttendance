@extends('pages.home')

@section('content')
    <div class="jumbotron">
        <h1 class="name">Create Attendance</h1>
        <div class="col-md-5 mx-auto">
            <form action="{{url('attendances/create')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="student_id">Select Name of Student</label>
                    <select name="student_id" id="student_id" class="form-control">
                        <option hidden="true">Select Name of Student</option>
                        <option selected disabled> Select Name of Student</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->fullname }}</option>
                        @endforeach
                        @error('student_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </select>
                </div>

                <div class="form-group">
                    <label for="subject_id">Select Subject</label>
                    <select name="subject_id" id="subject_id" class="form-control">
                        <option hidden="true">Select Counselor </option>
                        <option selected disabled>Select Counselor</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @error('subject_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="status">Status</label>
                    <select class="form-select" name="status" id="status">
                        <option disabled {{ old('status') ? '' : 'selected' }}>Select Status</option>
                        <option value="Present" {{ old('status') == 'Present' ? 'selected' : '' }}>Present</option>
                        <option value="Absent" {{ old('status') == 'Absent' ? 'selected' : '' }}>Absent</option>
                    </select>
                    @error('status')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mt-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button class="btn btn-primary">
                        Add Attendance
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style scoped>
        .name {
            color: rgb(244, 244, 249);
            text-shadow: 5px 5px 5px black;
        }

        label {
            color: rgb(244, 244, 249);
            text-shadow: 5px 5px 5px black;
        }

        .jumbotron {
            padding: 20px;
            padding-top: 25px;
            height: 400px;
            background-color: rgba(74, 73, 73, 0.5);
        }
    </style>
@endsection
