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
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">
                  Free 24/7 customer support, updates, and more with this template!
                </p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">
                  Get Pro
                </a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/">
                <i class="mdi mdi-home me-3 text-white"></i>
              </a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
      <!-- partial -->
       

      <!-- Added inline style for margin-top and text-align left; adjust margin as needed -->
      <div class="container" style="margin-top: 100px; text-align: left; padding-top: 50px;">
        <!-- Display any success message -->
        @if(session('message'))
          <p style="color: green;">{{ session('message') }}</p>
        @endif

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
            <label>Speciality</label>
            <select name="Speciality" style="width: 200px;">
              <option>--select--</option>
              <option value="skin">Skin</option>
              <option value="heart">Heart</option>
              <option value="eye">Eye</option>
              <option value="nose">Nose</option>
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
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
