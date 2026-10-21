@extends('dashboard.layout.main')

@section('body')

<div class="card">
    <div class="m-3">
       <a href="{{route('manager.create')}}" class=" btn btn-primary text-white btn-sm">Add Manager</a>

       <div class="col-lg-6 grid-margin stretch-card mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Manager Table</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                          <th> #     </th>
                          <th> Name  </th>
                          <th> Email </th>
                          <th> Edit</th>
                          <th> Delete </th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $key=>$manager)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$manager->name}}</td>
                            <td>{{$manager->email}}</td>
                          <td>
                            <a href="{{route('manager.edit' , $manager->id)}}" class="btn btn-sm btn-info" >
                                <i class="mdi mdi-pencil"></i>
                            </a>
                          </td>
                          <td>
                            <div>

                                <button class="btn btn-danger btn-sm  btn_delete"

                                type="button"

                                    data_url={{route('manager.destroy' , $manager->id)}}

                                    data_id={{$manager->id}}>

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
</div>


@endsection

