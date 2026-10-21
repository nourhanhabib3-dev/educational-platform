@extends('dashboard.layout.main')

@section('body')

<div class="card">
    <div class="card-body col-lg-6">
    <h4 class="card-title"> Form</h4>

    {{-- @if($errors->any())
     <div class="alart alart-denger">
        <ul>
            @foreach ($errors->all() as $error)
             <li>{{$errors}}</li>
            @endforeach
        </ul>
     </div>

    @endif --}}

    <form class="my-form" action="" method="POST"
          enctype="multipart/form-data" >
        @csrf
        @method('PUT')

        <div class="form-group row d-flex justify-content-center">
            @error('name')
              <p style="color: red">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control"
                 id="exampleInputUsername2" name="name" value="">
            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            @error('email')
              <p style="color: red">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value=""
                id="exampleInputUsername2" name="email">
            </div>
        </div>


        <div class="form-group row d-flex justify-content-center">
            @error('password')
              <p style="color: red">{{$message}}</p>
            @enderror
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value=""
                id="exampleInputUsername2" name="password">
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
