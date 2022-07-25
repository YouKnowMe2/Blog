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
        <div class="container">
        <!-- partial:partials/_navbar.html -->
        <h1>Customers</h1>
        <form action="{{url('/search')}}" method="get">@csrf
            <input type="text" name="search" style="color: black" >
            <input type="submit" value="Search" class="btn btn-success">
        </form>

        <!-- partial -->
        <table align="center">
            <tr>
                <td style="padding: 20px">Name</td>
                <td style="padding: 20px">Phone</td>
                <td style="padding: 20px">Address</td>
                <td style="padding: 20px">Food Name</td>
                <td style="padding: 20px">Price($)</td>
                <td style="padding: 20px">Quantity</td>
                <td>Total Price</td>
            </tr>
            @foreach($data as $data)
            <tr align="center">
                <td >{{$data->name}}</td>
                <td >{{$data->phone}}</td>
                <td >{{$data->address}}</td>
                <td>{{$data->foodname}}</td>
                <td >{{$data->price}}</td>
                <td>{{$data->quantity}}</td>
                <td>{{$data->quantity * $data->price}}</td>
            </tr>
            @endforeach

        </table>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
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

