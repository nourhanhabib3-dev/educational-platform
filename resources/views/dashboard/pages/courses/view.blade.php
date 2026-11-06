@extends('dashboard.layout.main')

@section('body')

<div class="card">
    <div class="m-3">
        @if (Auth::guard('tech')->check())
            <a href="{{route('course.create')}}" class=" btn btn-primary text-white btn-sm">Add Course</a>
        @endif

       <div class="col-lg-6 grid-margin stretch-card mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Courses Table</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                          <th> #     </th>
                          <th> image  </th>
                          <th> Title  </th>
                          <th> Price </th>
                          <th> Subject </th>
                          <th> Name teacher </th>
                          <th> Descreption </th>
                          <th> Lessons </th>

                            <th> Edit</th>
                            <th> Delete </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $data as $key=>$course )
                        <tr class="teacher_row" id="row-">
                          <td>{{++$key}}</td>
                          <td><div><img src="{{asset('storage/' .$course->img)}}" alt=""></div></td>
                          <td> <a href="{{route('course.lesson.index' , $course->id)}}">{{$course->name}}</a> </td>
                          <td>{{$course->price}}</td>
                          <td>{{$course->sub->name}}</td>
                          <td>{{$course->teacher->name}}</td>
                          <td>{{$course->desc}}</td>
                          <td>{{$course->lessons_count}}</td>

                          <td>
                            <a href="{{route('course.edit' , $course->id)}}" class="btn btn-sm btn-info" >
                                <i class="mdi mdi-pencil"></i>
                            </a>
                          </td>
                          <td>
                            <div>

                                <button class="btn btn-danger btn-sm btn_delete"

                                    type="button"

                                    data_id={{$course->id}}

                                    data_url={{route('course.destroy' , $course->id)}}>

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

        </div>
</div>


@endsection

