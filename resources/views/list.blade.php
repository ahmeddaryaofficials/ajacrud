<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Table</title>
     
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.css') }}"/>
    <link href="{{ asset('admin/css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.js') }}"></script>  
    <script src="{{ asset('admin/js/material-dashboard.min.js?v=3.0.4') }}" defer></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script>
      <!-- Github buttons -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="{{ asset('admin/js/material-dashboard.min.js?v=3.0.4') }}" defer></script>
      <script src="{{ asset('admin/js/core/popper.min.js') }}" defer></script>
      <script src="{{ asset('admin/js/core/bootstrap.min.js') }}" defer></script>
      
      <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js') }}" defer></script>
      <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}" defer></script>
      <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}" defer></script>
      <script src="{{ asset('js/jquery.dataTables.js') }}" defer></script>
      <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
</head>
<body>
    @include('inc.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
     <div class="container-fluid py-4">
        <div class="row mb-4">
    <div>
        <h3>User</h3>

 
  


          <form id="deleteForm" >
          <div style="padding:10px" class="row">
     <input  type="submit" class=" col-md-1 btn btn-secondary delete_all" value="delete" >

     </div>















        <table id="datatable" class="display">
            <thead>
                <tr align="left">
                <th data-sortable="false">
                <div class="form-check">
                <input name="personall"  type="checkbox"    id="personall">
                </div>

</th>
                    <th>ID</th>
                    <th data-sortable="true">Name</th>
                    <th data-sortable="false">Father Name</th>
                    <th data-sortable="false">Address</th>
                    <th data-sortable="false">Email</th>
                     <th>action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        
    </div>
    </div>
    </div>
</main>
</body>

<script>
    $(document).ready(function(){
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            order: [[ 0, "desc" ]],
            ajax: "{{ url('users-data') }}",
            columns: [
                { data: 'id' },
                { data: 'ids' },
                { data: 'name' },
                { data: 'fathername' },
                { data: 'address' },
                { data: 'email' },
                { data: 'edit' },
                
            ]
        });
    });
</script>
<script>

    // delete button via form
      $('.delete_all').on('click', function(e) {
      var idsArr = [];
      $(".checkbox:checked").each(function() {
             idsArr.push($(this).attr('data-id'));
             });
           if(idsArr.length <=0)
             {
              alert("Please select atleast one record to delete.");
            }
             else {
                if(confirm('do you want to delete the users?'))
                {

               
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var strIds = idsArr.join(",");
$.ajax({
url: "{{ route('user.multiple-delete') }}",
type: 'delete',
data: 'ids='+strIds,
success: function () {
}
});
                }
                
}
        });
//   checkbox on logic
    
</script>
<script>
    $('#personall').on('click', function(e) {
           
            if($(this).is(":checked", true))
            {
                $('.checkbox').prop('checked',true);
            }
            else{
                $('.checkbox').prop('checked',false);
            }
        });

</script>
<script>
     $('.toggle').each(function(index) { 
      alert('hi');
      });
</script>
</html>