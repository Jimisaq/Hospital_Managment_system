<!DOCTYPE html>
<html lang="en">

    <head>

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

            <div class="container-fluid page-body-wrapper">


                <!-- Display any success message -->
                @if(session()->has('message'))

                    <div class ="alert alert-success alert-dismissable fade show" role="alert">{{ session()->get('message') }}

                        <button type = "button" class="close" data-dismiss="alert"> Close </button>

                    </div>

                @endif

                <div class="container" text="center" style="padding-top: 100px; width: 100%">

                    <h1 style="padding: 20px; text-align: left;">Update Doctor Details</h1>

                    <form action="{{ url('editdoctor', $data->id) }}" method="POST" enctype="multiport/form-data">

                        <!-- enctype="multipart/form-data" is used to upload files in form data. -->

                        @csrf

                        <div style="padding: 15px;">
                            <label>Doctor ID</label>
                            <input type="text" name="id" value="{{$data->id}}" style="color: black;" required>
                        </div>

                        <div style="padding: 15px;">
                            <label>Doctor Name</label>
                            <input type="text" name="name" value="{{$data->name}}" style="color: black;" required>
                        </div>

                        <div style="padding: 15px;">
                            <label>Phone</label>
                            <input type="number" name="phone" value="{{$data->phone}}" style="color: black;" required>
                        </div>

                        <div style="padding: 15px;">
                            <label>Specialty</label>
                            <input type="text" name="specialty" value="{{$data->specialty}}" style="color: black;" required>
                        </div>

                        <div style="padding: 15px;">
                            <label>Room No</label>
                            <input type="text" name="room" value="{{$data->room}}" style="color: black;" required>
                        </div>

                        <div style="padding: 15px;">
                            <label>Old Image</label>
                            <img src="doctorimage/{{$data->image}}" height="150" width="150">
                        </div>

                        <div style="padding: 15px;">
                            <label>Change Image</label>
                            <input type="file" name="file" style="color: black;" required>
                        </div>

                        <div style="padding: 15px;">
                            <input type="submit" class="btn btn-primary">
                        </div>
                             

                    </form>

            </div>

        
        @include('admin.script')
        <!-- End custom js for this page -->

    </body>

</html>