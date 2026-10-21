<tr id="row-{{$value->id}}">
    <td>{{$value->year}}</td>
    <td>
        <div>
            <button
                type="button"
                data_url={{route('year.destroy' , $value->id)}}
                class="btn btn-danger btn-sm btn_delete" >
                <i class="mdi mdi-delete"></i>
            </button>

        </div>

    </td>
</tr>
