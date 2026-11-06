@extends('dashboard.layout.main')

@section('body')

<div class="card">
    <div class="card-body col-lg-6">
    <h4 class="card-title">{{$course->name}} Form</h4>

    @if($errors->any())
     <div class="alart alart-denger">
        <ul>
            @foreach ($errors->all() as $error)
             <li>{{$errors}}</li>
            @endforeach
        </ul>
     </div>

    @endif

    <form class="my-form" action="{{route('course.update' , $course->id)}}" method="POST"
          enctype="multipart/form-data" >
        @csrf
        @method('PUT')

        <div class="form-group row d-flex justify-content-center">
            @error('name')
              <p style="color: red">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Title</label>
            <div class="col-sm-6">
                <input type="text" class="form-control"
                 id="exampleInputUsername2" name="name" value="{{old('name' , $course->name)}}">
            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            @error('price')
              <p style="color: red">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Price</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="{{old('price' , $course->price)}}"
                id="exampleInputUsername2" name="price">
            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            @error('desc')
              <p style="color: red">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Descreption</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="{{old('desc' , $course->desc)}}"
                id="exampleInputUsername2" name="desc">
            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            @error('img')
              <p style="color: red">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">It Image</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" id="exampleInputUsername2" name="img">
            </div>
        </div>


        <div class="form-group row d-flex justify-content-center">
            @error('sub')
              <p style="color: red">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Subjects</label>
            <div class="col-sm-6">
                <select name="sub_id" id="exampleInputUsername2">
                    @foreach ( $sub as $key=>$sub )
                    <option value="{{$sub->id}}" {{old('sub_id') == $course->sub_id ? 'selected' : ''}}>{{$sub->name}}</option>
                    @endforeach
                </select>
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
