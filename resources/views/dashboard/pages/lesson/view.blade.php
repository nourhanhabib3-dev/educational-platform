@extends('dashboard.layout.main')

@section('body')

<div class="card">
    <div class="m-3">



       <div class="col-lg-6 grid-margin stretch-card mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lesson Table</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                          <th> # </th>
                          <th> course </th>
                          <th> Title </th>
                          <th> video </th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($lessons as $key=>$lesson)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$lesson->title}}</td>
                            <td>{{$lesson->course->name}}</td>
                            <td>
                                <video width="200" controls>
                                    <source src="{{asset('storage/' . $lesson->video)}}" type="video/mp4">
                                </video>
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

