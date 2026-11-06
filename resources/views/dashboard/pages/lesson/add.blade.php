@extends('dashboard.layout.main')

@section('body')

<div class="card">
    <div class="card-body col-lg-6">
    <h4 class="card-title">Lesson Form</h4>

    @if($errors->any())
     <div class="alart alart-denger">
        <ul>
            @foreach ($errors->all() as $error)
             <li>{{$errors}}</li>
            @endforeach
        </ul>
     </div>

    @endif

    <form class="my-form " action="{{route('course.lesson.store' , $course->id)}}" method="POST"
          enctype="multipart/form-data" >
        @csrf
    
        <div class="form-group row d-flex justify-content-center">
            @error('title')
              <p class="text-denger d-block mt-1">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Title</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="exampleInputUsername2" name="title" value="{{old('title')}}">
            </div>
        </div>


        <div class="form-group row d-flex justify-content-center">
            @error('video')
              <p class="text-denger d-block mt-1">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Video</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" value="{{old('video')}}" id="exampleInputUsername2" name="video">
            </div>
        </div>




        <div>
          <button type="submit" class="btn btn-primary ">Submit</button>
          {{-- <a href="{{route('teacher.index')}}" class="">Cancel</a> --}}
        </div>

    </form>
</div>
</div>


@endsection
