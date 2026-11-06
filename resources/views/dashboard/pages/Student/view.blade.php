@extends('dashboard.layout.main')

@section('body')

<div class="card">
    <div class="m-3">
       <a href="{{route('student.create')}}" class=" btn btn-primary text-white btn-sm">Add Student</a>

       <div class="col-lg-6 grid-margin stretch-card mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Student Table</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                          <th> #     </th>
                          <th> Name  </th>
                          <th> Email </th>
                          <th> Year </th>
                          <th> Edit</th>
                          <th> Delete </th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $key=>$student)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->year->year}}</td>
                          <td>
                            <a href="{{route('student.edit' , $student->id)}}" class="btn btn-sm btn-info" >
                                <i class="mdi mdi-pencil"></i>
                            </a>
                          </td>
                          <td>
                            <div>

                                <button class="btn btn-danger btn-sm  btn_delete"

                                type="button"

                                    data_url={{route('student.destroy' , $student->id)}}

                                    data_id={{$student->id}}>

                                    <i class="mdi mdi-delete"></i>

                                </button>

                            </div>
                          </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <div class=" d-flex justify-content-center my-4  ">
        {{$data->links()}}
    </div>
</div>


@endsection

