<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <base href="/public">
    
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
          <form action="{{ url('sendemail',$data->id) }}" method="POST">
            @csrf
            <div style="padding: 15px;">
              <label>Greeting</label>
              <input type="text" name="greeting" required="">
            </div>

            <div style="padding: 15px;">
              <label>Body</label>
              <input type="text" name="body" required="">
            </div>

            <div style="padding: 15px;">
              <label>Action Text</label>
              <input type="text" name="actiontext" required="">
            </div>

            <div style="padding: 15px;">
              <label>Action Url</label>
              <input type="text" name="actionurl" required="">
            </div>

            <div style="padding: 15px;">
              <label>End Part</label>
              <input type="text" name="endpart" required="">
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
