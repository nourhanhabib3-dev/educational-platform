<tr>
  
    <td>{{$value->name}}</td>

    <td>{{$value->year['year']}}</td>

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

</tr>


