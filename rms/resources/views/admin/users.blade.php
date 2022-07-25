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
                    <th style="padding: 40px">User Type</th>
                    <th style="padding: 40px">Action</th>
                </tr>
                @foreach($users as $user)
                <tr align="center">
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @if($user->usertype=='1')
                            <td style="padding: 20px">Admin</td>
                            <td style="padding: 20px">Not Allowed</td>
                        @else
                            <td>User</td>
                            <td style="padding: 20px">  <a href="{{url('/deleteUser',$user->id)}}" class="btn btn-danger">Delete</a></td>
                        @endif

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
