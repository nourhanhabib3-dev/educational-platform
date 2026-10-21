@extends('dashboard.layout.main')
@section('body')

<div class="card">
<div class="card-body col-lg-6">
    <h4 class="card-title">Subject Form</h4>
    <form class="forms-sample form_add" action="{{route('sub.store')}}" method="POST" data-target-table="#subTableBody">
        @csrf
        <div class="form-group row d-flex justify-content-center">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Sub Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="exampleInputUsername2" name="name">
            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Year Name</label>
            <div class="col-sm-6">
                <select name="year_id" id="exampleInputUsername2">
                    <option value="">chooese the year</option>
                    @foreach ($years as $year )
                    <option value="{{$year->id}}">{{$year->year}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-gradient-primary me-2 ">Submit</button>

    </form>
</div>


    <div class="col-lg-6 grid-margin stretch-card mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Subject table</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                          <th> Sub Name </th>
                          <th> Year Name </th>
                          <th> Action</th>
                        </tr>
                    </thead>
                    <tbody id="subTableBody">
                        @foreach ($subData as $value )
                         @include('dashboard.pages.subs.row' , ['value' =>$value])
                        {{-- <tr>
                          <td>{{$value->name}}</td>
                          <td>{{$value->year->year}}</td>
                          <td>
                            <div>
                                    <button
                                      type="button"
                                     data_url={{route('sub.destroy' , $value->id)}}
                                     class="btn btn-danger btn-sm btn_delete">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                            </div>

                          </td>
                        </tr> --}}
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection


