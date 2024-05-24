
@extends('pages.home')

@section('content')

  <style>
    #deletestudentModalLabel {
        color: #333; 
    }

    .form-group {
        margin-top: 15px;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545; 
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff; 
    }

  </style>

  <div class="modal fade" id="deletestudentModal" tabindex="-1" aria-labelledby="deletestudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deletestudentModalLabel">Delete student - {{$student->fullname}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form action="{{url('students/delete/' . $student->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <div class="modal-body">
            Are you sure you want to delete this student information?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>

      <h1>Edit Student Information</h1>
      <div class="row">
          <div class="col-md-5">
              <form action="{{url('students/' . $student->id)}}" method="post">
                  @csrf
                  <div class="form-group mt-2">
                      <label for="fullname">Fullname</label>
                      <input class="form-control" type="text" name="fullname" value="{{$student->fullname}}">
                      @error('fullname')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="form-group mt-2">
                      <label for="course">Course</label>
                      <input class="form-control" type="text" name="course" value="{{$student->course}}">
                      @error('course')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="form-group mt-2">
                      <label for="year_level">Year Level</label>
                      <input class="form-control" type="text" name="year_level" value="{{$student->year_level}}">
                      @error('year_level')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="form-group mt-2">
                      <label for="email">Email</label>
                      <input class="form-control" type="text" name="email" value="{{$student->email}}">
                      @error('email')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="form-group mt-2">
                      <label for="contact">Contact</label>
                      <input class="form-control" type="text" name="contact" value="{{$student->contact}}">
                      @error('contact')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>

                    <div class="form-group my-3 d-grid d-md-flex justify-content-end">
                      <button type="button" class="btn btn-danger me-md-2 mt-2" data-bs-toggle="modal" data-bs-target="#deletestudentModal">
                        Delete
                      </button>
                    
                      <button class="btn btn-primary me-md-2 mt-2" type="submit">
                        Update</button>
                    </div>

                
                    </div>
                      

              </form>
          </div>
      </div>

      


@endsection