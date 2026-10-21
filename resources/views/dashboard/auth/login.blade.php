@extends('dashboard.layout.main')

@section('body')

<div class="col-8 grid-margin stretch-card d-flex align-middle justify-content-center ">
                <div class="card d-flex align-middle justify-content-center">
                  <div class="card-body ">
                    <h4 class="card-title">Login</h4>
                     <form action="{{route('check_login')}}" method="POST">
                        @csrf
                        <div>
                            @error('email')
                              <p class="text-denger d-block mt-1">{{$message}}</p>
                            @enderror
                            <label class="sr-only" for="inlineFormInputGroupUsername2">Email</label>
                            @error('password')
                              <p class="text-denger d-block mt-1">{{$message}}</p>
                            @enderror
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" name="email" id="inlineFormInputGroupUsername2" placeholder="Email">
                            </div>
                        </div>
                        <div>
                            <label class="sr-only" for="inlineFormInputName2">Password</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" name="password" id="inlineFormInputName2">
                        </div>
                      <div  class="d-flex align-middle justify-content-center ">
                        <button type="submit" class="btn btn-gradient-primary m-2 ">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

@endsection
