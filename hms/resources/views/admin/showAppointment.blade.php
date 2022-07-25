

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
            <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                <div class="ps-lg-1">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                        <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
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

        <!-- partial:partials/_navbar.html -->
    @include('admin.navbar')
    <!-- partial -->
    <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
    <div class="container-fluid page-body-wrapper justify-center">
        <!-- partial -->
        <div style="padding: 70px">
            <table align="center" >
                <tr style="background-color: #0a58ca; color: white">
                    <th style="padding-left: 30px ">Name</th>
                    <th style="padding-left: 30px ">Email</th>
                    <th style="padding-left: 30px ">Phone</th>
                    <th style="padding-left: 30px ">Doctor Name</th>
                    <th style="padding-left: 30px">Date</th>
                    <th style="padding-left: 30px">Message</th>
                    <th style="padding-left: 30px">Status</th>
                    <th style="padding-left: 30px">Approve</th>
                    <th style="padding-left: 30px">Cancel</th>
                    <th style="padding-right: 30px; padding-left: 30px">Mail</th>
                </tr>

                @foreach($appointment as $info)
                    <tr align="center">
                        <td style="padding-left: 30px ">{{$info->name}}</td>
                        <td style="padding-left: 30px ">{{$info->email}}</td>
                        <td style="padding-left: 30px ">{{$info->phone}}</td>
                        <td style="padding-left: 30px ">{{$info->doctor}}</td>
                        <td style="padding-left: 30px ">{{$info->date}}</td>
                        <td style="padding-left: 30px ">{{$info->message}}</td>
                        <td style="padding-left: 30px">{{$info->status}}</td>
                        <td><a href="{{url('approve',$info->id)}}" onclick="return confirm('Are you sure you want to Approve?')" class="btn btn-success" style="padding: 5px; margin: 8px">Approve</a></td>
                        <td><a href="{{url('cancel',$info->id)}}" onclick="return confirm('Are you sure you want to Cancel?')" class="btn btn-danger" style="padding: 5px;">Cancel</a></td>
                        <td><a href="{{url('emailView',$info->id)}}"  class="btn btn-primary" style="padding: 5px;">Send Mail</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
</body>
</html>
