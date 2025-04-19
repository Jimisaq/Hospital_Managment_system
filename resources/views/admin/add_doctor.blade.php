<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <style type="text/css">

      label {
          display: inline-block;

          width: 200px;
      }
    </style>

    @include('admin.css')

  </head>

  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
       

      <!-- Added inline style for margin-top and text-align left; adjust margin as needed -->
      <div class="container" text="center" style= "padding-top: 100px;">

        <!-- Display any success message -->
        @if(session()->has('message'))

        <div class ="alert alert-success alert-dismissable fade show" role="alert">

          {{ session()->get('message') }}

          <button type = "button" class="close" data-dismiss="alert"> Close </button>


        </div>
 
        @endif

        <div class="container" text="center" style="padding-top: 100px; width: 100%">

              <h1 style="padding: 20px; text-align: left;">Enter Doctor Details</h1>

          <!-- Update form: Method set to POST -->
          <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="padding: 15px;">
              <label>Doctor Name</label>
              <input type="text" name="name" placeholder="write name">
            </div>

            <div style="padding: 15px;">
              <label>Phone</label>
              <input type="number" name="number" placeholder="write number">
            </div>

            <div style="padding: 15px;">
              <label>Specialty</label>
              <select name="specialty" style="width: 200px;">

                <option>--select--</option>
                <option value="skin">Dermatology</option>
                <option value="heart">Cardiology</option>
                <option value="eyes">ENT</option>
                <option value="teeth">Dentist</option>
              </select>

            </div>

            <div style="padding: 15px;">
              <label>Room No</label>
              <input type="text" name="room" placeholder="write room number">
            </div>

            <div style="padding: 15px;">
              <label>Doctor Image</label>
              <input type="file" name="file">
            </div>

            <div style="padding: 15px;">
              <input type="submit" class="btn btn-success">
            </div>

          </form> 

        </div>

      </div>
    
    <!-- partial -->
    <!-- container-scroller -->
    <!-- plugins:js -->

    @include('admin.script')
    <!-- End custom js for this page -->

  </body>
</html>
