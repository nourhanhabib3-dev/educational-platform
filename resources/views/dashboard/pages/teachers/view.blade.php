@extends('dashboard.layout.main')

@section('body')

<div class="card">
    <div class="m-3">
       <a href="{{route('teacher.create')}}" class=" btn btn-primary text-white btn-sm">Add Teacher</a>

       <div class="col-lg-6 grid-margin stretch-card mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Teachers Table</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                          <th> #     </th>
                          <th> img   </th>
                          <th> Name  </th>
                          <th> Email </th>
                          <th> Subject </th>
                          <th> Phone </th>
                          <th> Bio   </th>
                          <th> Edit</th>
                          <th> Delete </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $teacher as $key => $tec )
                        <tr class="teacher_row" id="row-{{$tec->id}}">
                          <td>{{++$key}}</td>
                          <td><div><img src="{{asset('storage/'.$tec->img)}}" alt=""></div></td>
                          <td>{{$tec->name}}</td>
                          <td>{{$tec->email}}</td>
                          <td>{{$tec->sub->name}}</td>
                          <td>{{$tec->phone}}</td>
                          <td>{{$tec->bio}}</td>
                          <td>
                            <a href="{{route('teacher.edit' , $tec->id)}}" class="btn btn-sm btn-info" >
                                <i class="mdi mdi-pencil"></i>
                            </a>
                          </td>
                          <td>
                            <div>

                                <button class="btn btn-danger btn-sm btn_delete"

                                    type="button"

                                    data_id={{$tec->id}}

                                    data_url={{route('teacher.destroy' , $tec->id)}}>

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
            {{$teacher->links()}}
        </div>
</div>


@endsection

