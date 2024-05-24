@extends('pages.home')

@section('content')

<style>
    a {
        text-decoration-line: none;
    }
    .btn-primary {
        background-color: #28a745; 
        border-color: #28a745; 
    }

    .btn-primary:hover {
        background-color: #218838; 
        border-color: #1e7e34; 
    }
</style>

<h1>Subjects</h1>
@if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<div class="modal fade" id="deletesubjectModal" tabindex="-1" aria-labelledby="deletesubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deletesubjectModalLabel">Delete subject</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteSubjectForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this subject?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    <a href="{{ url('/subjects/create') }}" class="btn btn-primary me-md-2" type="button">
        Add new subject
    </a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Teacher</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->description }}</td>
                <td>{{ $subject->teacher }}</td>
                <td class="d-flex justify-content-between align-items-center mt-3">
                    <div class="form-group my-3 d-grid d-md-flex justify-content-end">
                        <button type="button" class="btn btn-danger me-md-2 mt-2" data-bs-toggle="modal" data-bs-target="#deletesubjectModal" onclick="setModalData('{{ $subject->id }}', '{{ $subject->name }}')">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No subjects available.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<script>
function setModalData(subjectId, subjectName) {
    document.getElementById('deletesubjectModalLabel').textContent = 'Delete subject - ' + subjectName;
    document.getElementById('deleteSubjectForm').action = '/subjects/' + subjectId;
}
</script>

@endsection
