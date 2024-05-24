@extends('pages.home')

@section('content')
    <h1>Create New Student</h1>
    <div class="row">
        <div class="col-md-5">
            <form action="{{url('students/create')}}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="fullname"> Fullname </label>
                    <input type="text" name="fullname" class="form-control">
                    @error('fullname')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="course"> Course </label>
                    <input type="text" name="course" class="form-control">
                    @error('course')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="year_level"> Year Level </label>
                    <input type="text" name="year_level" class="form-control">
                    @error('year_level')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="email"> E-Mail </label>
                    <input type="text" name="email" class="form-control">
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="contact"> Contact </label>
                    <input type="text" name="contact" class="form-control">
                    @error('contact')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button class="btn btn-success">
                        Add Student
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
