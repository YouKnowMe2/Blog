

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <style type="text/css">
        label{
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

    <div class="container-fluid page-body-wrapper">

            <div class="container" style="padding-top: 100px; text-align: center">
                @if(session()->has('message'))

                    <div class="alert alert-success">
                        {{session()->get('message')}}
                        <button type="button" class="close" data-dismiss="alert">x</button>
                    </div>
                @endif
                <form action=" {{url('upload_info')}}" method="POST" enctype="multipart/form-data">@csrf

                        <div style="padding: 20px">
                            <label for="name">Doctor Name</label>
                            <input type="text" name="name"  style="color: #0a0a0a" placeholder="write the name">
                        </div>

                        <div style="padding: 15px;">
                            <label for="number">Phone Number</label>
                            <input type="number" name="number"  style="color: #0a0a0a" placeholder="write the Phone Number">
                        </div>

                        <div style="padding: 15px;">
                            <label for="room">Room Number</label>
                            <input type="number" name="room"  style="color: #0a0a0a" placeholder="write the room">
                        </div>

                        <div style="padding: 15px;">
                            <label>Speciality</label>
                            <select name="speciality" id="" style="color: black">
                                <option value="">--Select--</option>
                                <option value="skin">Skin</option>
                                <option value="heart">Heart</option>
                                <option value="eye">Eye</option>
                                <option value="nose">Nose</option>
                            </select>
                        </div>

                        <div style="padding: 15px;">
                            <label for="room">Room Number</label>
                            <input type="number" name="room"  style="color: #0a0a0a" placeholder="write the room">
                        </div>



                    <div style="padding: 15px;">
                        <label for="image">Upload the Image</label>
                        <input type="file" name="file">
                    </div>

                    <div style="padding: 20px">
                        <input type="submit" class="btn btn-success">
                    </div>

                </form>
            </div>
    </div>
    <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
</body>
</html>
