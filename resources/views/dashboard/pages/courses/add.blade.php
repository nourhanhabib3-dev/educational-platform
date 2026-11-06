@extends('dashboard.layout.main')

@section('body')

<div class="card">
    <div class="card-body col-lg-6">
    <h4 class="card-title">Course Form</h4>
    @if($errors->any())
     <div class="alart alart-denger">
        <ul>
            @foreach ($errors->all() as $error)
             <li>{{$errors}}</li>
            @endforeach
        </ul>
     </div>

    @endif

    <form class="my-form " action="{{route('course.store')}}" method="POST"
          enctype="multipart/form-data" >
        @csrf

        <div class="form-group row d-flex justify-content-center">
            @error('name')
              <p class="text-denger d-block mt-1">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="exampleInputUsername2" name="name" value="{{old('name')}}">
            </div>
        </div>


        <div class="form-group row d-flex justify-content-center">
            @error('price')
              <p class="text-denger d-block mt-1">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Price</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="{{old('price')}}" id="exampleInputUsername2" name="price">
            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            @error('desc')
              <p class="text-denger d-block mt-1">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">describtion</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="{{old('desc')}}" id="exampleInputUsername2" name="desc">
            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            @error('img')
              <p class="text-denger d-block mt-1">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">image</label>
            <div class="col-sm-6">
                <input type="file" name="img" class="form-control"  id="exampleInputUsername2">
            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            @error('sub')
              <p class="text-denger d-block mt-1">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Subject</label>
            <div class="col-sm-6">
                <select name="sub_id" id="exampleInputUsername2">
                    <option value="">Choose a Subject</option>
                    @foreach ( $sub as $key=>$sub )
                    <option value="{{$sub->id}}" {{old('sub_id') == $sub->id ? 'selected' :''}}>{{$sub->name}}</option>
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
