<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">

    <!-- partial:partials/_sidebar.html -->
@include('admin.navbar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <div style="position: relative; top: 60px; right: -150px; align-items: center">
            <table bgcolor="grey" border="3px">
                <tr >
                    <th style="padding: 40px">Name</th>
                    <th style="padding: 40px">Email</th>
                    <th style="padding: 40px">Phone</th>
                    <th style="padding: 40px">Guest</th>
                    <th style="padding: 40px">Date</th>
                    <th style="padding: 40px">Time</th>
                    <th style="padding: 40px">Message</th>
                    <th style="padding: 40px">Action</th>
                </tr>
                @foreach($reserve as $reserve)
                    <tr align="center">
                        <td>{{$reserve->name}}</td>
                        <td>{{$reserve->email}}</td>
                        <td>{{$reserve->phone}}</td>
                        <td>{{$reserve->guest}}</td>
                        <td>{{$reserve->date}}</td>
                        <td>{{$reserve->time}}</td>
                        <td>{{$reserve->message}}</td>
                        <td style="padding: 20px">  <a href="{{url('/deleteReservation',$reserve->id)}}" class="btn btn-danger">Delete</a></td>


                    </tr>
                @endforeach
            </table>
        </div>

    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
</body>
</html>
