@extends('pages.home')

@section('content')
    <div class="container">
        <h1>Edit Subject</h1>
        <form method="post" action="{{ route('subjects.update', $subject->id) }}">
            @csrf
            @method('PUT')

            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $subject->name }}" required>
            
            <label for="description">Description:</label>
            <input type="text" name="description" value="{{ $subject->description }}" required>

            <label for="teacher">Teacher:</label>
            <input type="text" name="teacher" value="{{ $subject->teacher }}" required>

            <button type="submit">Update Subject</button>
        </form>

        <form method="post" action="{{ route('subjects.destroy', $subject->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this subject?')">Delete Subject</button>
        </form>
    </div>
@endsection
