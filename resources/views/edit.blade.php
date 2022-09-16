<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Table</title>

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
      
      <script src="{{ asset('admin/js/core/popper.min.js') }}" defer></script>
      <script src="{{ asset('admin/js/core/bootstrap.min.js') }}" defer></script>
      
      <
      <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}" defer></script>
      <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}" defer></script>
      <script src="{{ asset('js/jquery.dataTables.js') }}" defer></script>
      <script src="https://code.jquey.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
</head>
<body>
@include('inc.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
     <div class="container-fluid py-4">
        <div class="row mb-4">
  <h3>
    Update User</h3>
<div class="container">
    <form name="contact"  id="editForm" >
    <div class="form-group inline">
         <label for="type">ID</label>
         <div class="input-group input-group-outline">
         <label >{{$person->id}}</label>
         </div>
       </div>

       <div class="form-group inline">
         <label for="type">Name</label>
         <div class="input-group input-group-outline">
         <input type="text" class="form-control" name="name" id="name" value="{{$person->name}}">
         </div>
       </div>
       <div class="form-group">
          <label for="price">Father Name</label>
          <div class="input-group input-group-outline">
          <input type="text" class="form-control" name="fathername" id="fathername" value="{{$person->fathername}}">
          </div>
        </div>
        <div class="form-group">
            <label for="price">Address</label>
            <div class="input-group input-group-outline">
            <input type="text" class="form-control" name="address" id="address" value="{{$person->address}}">
            </div>
          </div>
          <div class="form-group">
            <label for="price">Email</label>
            <div class="input-group input-group-outline">
            <input type="text" class="form-control" name="email" id="email" value="{{$person->email}}">
            </div>
          </div>
          <br/>
       <input  class="btn btn-secondary" type="submit" value="update">
     </form>
 </div>
</div>
</div>
</main>
@include('sweetalert::alert')
</body>
</html>




<script>
 $('#editForm').on('submit',function(event){
    event.preventDefault();
 
    id = $('#id').val();
    fathername = $('#fathername').val();
    name = $('#name').val();
    address = $('#address').val();
    email = $('#email').val();

    
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $.ajax({
      url: "/update/"+id, //Define Post URL
      type:"POST",
      data:{
        "name":name,
        "fathername":fathername,
        "email":email,
        "address":address,
        success:function(response){
            window.location.href="/users";
        }
      },

      //Display Response Success Message

  });

});
</script>

