@extends('dashboard.layout.main')

@section('body')

<div class="card">
    <div class="m-3">
         <a href="{{route('course.lesson.create' , $course->id)}}" class=" btn btn-primary text-white btn-sm">Add Lesson</a>


       <div class="col-lg-6 grid-margin stretch-card mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lesson Table</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                          <th> #     </th>
                          <th> Title </th>
                          <th> video </th>

                          <th> Edit</th>
                          <th> Delete </th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($lessons as $key=>$lesson)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$lesson->title}}</td>
                            <td>
                                <video width="200" controls>
                                    <source src="{{asset('storage/' . $lesson->video)}}" type="video/mp4">
                                </video>
                            </td>

                          <td>
                            <a href="{{route('course.lesson.edit' , [$course->id , $lesson->id])}}" class="btn btn-sm btn-info" >
                                <i class="mdi mdi-pencil"></i>
                            </a>
                          </td>
                          <td>
                            <div>

                                <button class="btn btn-danger btn-sm  btn_delete"

                                type="button"

                                    data_url="{{route('course.lesson.destroy' ,[$course->id , $lesson->id])}}"

                                    data_id="{{$lesson->id}}">

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
    {{-- <div class=" d-flex justify-content-center my-4  ">
        {{$data->links()}}
    </div> --}}
</div>


@endsection

