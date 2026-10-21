@extends('dashboard.layout.main')

@section('body')


<div class="card">
<div class="card-body col-lg-6 bg-dark text-white m-5">
    <h4 class="card-title text-white ">Years Form</h4>

    <form class="forms-sample form_add"  action="{{route('year.store')}}" method="POST" data-target-table="#yearsTableBody" >
        @csrf
        <div class="form-group row d-flex justify-content-center">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Year Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="exampleInputUsername2" name="year">
            </div>
        </div>

        <button type="submit" class="btn btn-gradient-primary me-2 subForm">Submit</button>

    </form>
</div>


    <div class="col-lg-6 grid-margin stretch-card mt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Years table</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                          <th> Year </th>
                          <th> Action</th>
                        </tr>
                    </thead>
                    <tbody id="yearsTableBody">
                        @foreach ($yearData as $key=>$value )
                         @include('dashboard.pages.years.row' , ['value' =>$value ])
                        {{-- <tr id="row-{{$value->id}}">
                          <td>{{++$key}}</td>
                          <td>{{$value->year}}</td>
                          <td>
                            <div>
                                <form  action="{{route('year.destroy' , $value->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this year?')">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </form>

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
