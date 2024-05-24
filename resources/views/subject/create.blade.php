@extends('pages.home')

@section('content')
    <h1> Create New Subject </h1>
    <div class="row">
        <div class="col-md-5">
            <form action="{{url('subjects/create')}}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="name"> Subject Name </label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="description"> Description </label>
                    <input type="text" name="description" class="form-control">
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="teacher"> Teacher </label>
                    <input type="text" name="teacher" class="form-control">
                    @error('teacher')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button class="btn btn-primary">
                        Add New Subject
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
