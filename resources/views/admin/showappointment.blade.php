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

              <h1 style="padding: 20px; text-align: center;">All Appointments</h1>

                <table style="width: 90%; text-align: left; border: 1px solid black; border-collapse: collapse;">
                  
                  @php
                    $thStyle = 'padding: 10px; font-size: 18px; border: 1px solid black; background-color: black; color: white;';
                  @endphp

                  <tr style="background-color:black;">

                    <th style="padding:10px">Appointment ID</th>
                    <th style="padding:10px">Patient Name</th>
                    <th style="padding:10px">Email</th>
                    <th style="padding:10px">Phone</th>
                    <th style="padding:10px">Doctor Name</th>
                    <th style="padding:10px">Date</th>
                    <th style="padding:10px">Message</th>
                    <th style="padding:10px">Status</th>
                    <th style="padding:10px">Approved</th>
                    <th style="padding:10px">Canceled</th>
                    <th style="padding:10px">Send Mail</th>
                  </tr>


                  @foreach($data as $appoint)

                      <tr text-align="left" style="background-color: white; color: black; border: 1px solid black;">

                        <td>{{$appoint->id}}</td>
                        <td>{{$appoint->name}}</td>
                        <td>{{$appoint->email}}</td>
                        <td>{{$appoint->phone}}</td>
                        <td>{{$appoint->doctor}}</td>
                        <td>{{$appoint->date}}</td>
                        <td>{{$appoint->message}}</td>
                        <td>{{$appoint->status}}</td>

                        <td><a class="bt btn-success" onclick="" href="{{ url('approved', $appoint->id) }}">Approved</a></td>

                        <td><a class="bt btn-danger" onclick="" href="{{ url('canceled', $appoint->id) }}">Canceled</a></td>
                      
                        <td><a class="bt btn-primary" onclick="" href="{{ url('emailview', $appoint->id) }}">Send Mail</a></td>

                      </tr>

                  @endforeach
                
                </table>
            </div>

    
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    @include('admin.script')
    <!-- End custom js for this page -->

  </body>
</html>
