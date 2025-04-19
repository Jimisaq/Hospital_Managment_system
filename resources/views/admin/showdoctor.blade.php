<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    @include('admin.css')

  </head>

  <body>
    <div class="container-scroller">
     
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <div style="padding-top:100px; width: 100%;">

                <h1 style="padding: 20px; text-align: center;">All Doctors</h1>

                <table style="width: 90%; text-align: left; border: 1px solid black; border-collapse: collapse;">

                    @php
                        $thStyle = 'padding: 10px; font-size: 18px; border: 1px solid black; background-color: black; color: white;';
                    @endphp

                    <tr style="background-color:black;">

                        <th style="{{ $thStyle }}">Doctor ID</th>                     
                        <th style="{{ $thStyle }}">Doctor Name</th>
                        <th style="{{ $thStyle }}">Phone</th>
                        <th style="{{ $thStyle }}">Specialty</th>
                        <th style="{{ $thStyle }}">Room No</th>
                        <th style="{{ $thStyle }}">Image</th>
                        <th style="{{ $thStyle }}">Delete</th>
                        <th style="{{ $thStyle }}">Update</th>

                    </tr>

                    @foreach($data as $doctor)

                        <tr text="left" style="background-color: white; color: black; border: 1px solid black;">

                            <td>{{$doctor->id}}</td>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->number}}</td>
                            <td>{{$doctor->specialty}}</td>
                            <td>{{$doctor->room}}</td>

                            <td><img height="100" width="100" src="/doctorimage/{{$doctor->image}}"></td>

                            <td><a class="bt btn-danger" onclick="return confirm('Are you sure you want to delete this')" href="{{ url('deletedoctor', $doctor->id) }}">Delete</a></td>

                            <td><a class="bt btn-primary" onclick="" href="{{ url('updatedoctor', $doctor->id) }}">Update</a></td>
                        </tr>

                    @endforeach
                
                </table>
            </div>
    </div>

    @include('admin.script')
    <!-- End custom js for this page -->
     
  </body>

</html>

