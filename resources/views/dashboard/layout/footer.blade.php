</div>
</div>
</div>
<footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        {{-- </div> --}}
        <!-- main-panel ends -->
      {{-- </div> --}}
      <!-- page-body-wrapper ends -->
    {{-- </div> --}}
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('dash')}}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('dash')}}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{asset('dash')}}/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('dash')}}/js/off-canvas.js"></script>
    <script src="{{asset('dash')}}/js/hoverable-collapse.js"></script>
    <script src="{{asset('dash')}}/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('dash')}}/js/dashboard.js"></script>
    <script src="{{asset('dash')}}/js/todolist.js"></script>
    <!-- End custom js for this page -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).on('click' , '.btn_delete' , function(e){
        e.preventDefault();
        if(!confirm('Are you went to delete this ?')){
            return ;
        }
        var data_url=$(this).attr('data_url');
        var data_id = $(this).attr('data_id');
        var _token = "{{csrf_token()}}";
        var row = $(this).closest('tr');
        $.ajax({
            url : data_url,
            type : "POST",
            data : {
                _token : _token,
                _method : 'DELETE'
            },
            success:function(response){

                row.remove();

            },
            error:function(xhr){
                // console.log(data_url);
                // console.log(y.responseText)
                alert('try agin');
            }
        })
    })
</script>

{{-- <script>
    $(document).on('submit' , '.ajax_form' , function(e){
        e.preventDefault();

        var form = $(this);
        var actionUrl = form.attr('action');
        var formData = new FormData(this);
        var submitBtn = form.find('button[tybe="submit"]');
        var modal = form.closest('.modal');

        submitBtn.prop('disabled' , true).text('saving . . . .');

        $.ajax({
            url:actionUrl,
            type:"POST",
            data:formData,
            processData:false,
            contentType:false,

            success:function(response){
                submitBtn.prop('disabled' , false).text('submit');
                form[0].reset();
                if(modal.length){
                    modal.modal('hide');
                }
                var item = response.data;
                var newRow =`
                 <tr id="row-${item.id}" class="teacher-row">
                    <td>#</td>
                    <td><div><img scr="{$item.img ?? ''}"></div></td>
                    <td>${item.name}</td>
                    <td>${item.email}</td>
                    <td>${item.sub.name}</td>
                    <td>${item.phone}</td>
                    <td>${item.bio}</td>
                    <td>
                        <a href="${item.editUrl}" class="btn btn-sm btn-info" >
                             <i class="mdi mdi-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <div>
                                <form  action="${item.deleteUrl}" method="POST">
                                    @csrf
                                    @method ('DELETE')
                                    <button class="btn btn-danger btn-sm btn_delete"
                                    type="button"
                                    data_id=${item.id}
                                    data_url=${item.deleteUrl}>
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </form>

                            </div>
                    </td>

                 </tr>
                ` ;
                $('table tbody').prepend(newRow);
                alert(response.message);

            },error:function(xhr){
                submitBtn.prop('disabled' , false).text('submit');
                alert('try agin')
            }
        })
        })
</script> --}}

<script>
    $(document).off('submit' , '.form_add').on('submit' , '.form_add' , function(e){
        e.preventDefault();
        var form = $(this);
        var actionUrl = $(this).attr('action');
        var submitBtn =form.find('button[type="submit"]');
        var formData = form.serialize() ;
        var targetTable = form.attr('data-target-table');
        $.ajax({
            url:actionUrl,
            type:'POST',
            data:formData,
            success: function(response){
                if(response.status){
                    form[0].reset();
                    if(response.html && targetTable){
                        $(targetTable).prepend(response.html);
                    }
                }
            },error :function(xhr){
                console.log(xhr.responseText);
                alert('try agin');

            }
        });
    });
</script>

<script>

</script>

  </body>
</html>
