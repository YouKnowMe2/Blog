<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
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

    <!-- partial:partials/_sidebar.html -->
@include('admin.navbar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <div style="position: relative; top: 60px" align-items: center">
        <form action=" {{route('updateFood',$food->id)}}" method="POST" enctype="multipart/form-data">@csrf

            <div style="padding: 15px">
                <label for="title">Title</label>
                <input type="text" name="title"  style="color: #0a0a0a" placeholder="write the title" value="{{$food->title}}">
            </div>

            <div style="padding: 15px;">
                <label for="price">Price</label>
                <input type="number" name="price"  style="color: #0a0a0a"  value="{{$food->price}}">
            </div>

            <div style="padding: 15px;">
                <label for="description">Description</label>
                <input type="text" name="description"  style="color: #0a0a0a" placeholder="write the description" value="{{$food->description}}">
            </div>

            <div style="padding: 15px;">
                <label for="">Old Image</label>
                <img src="/foodimage/{{$food->image}}" height="200px" width="200px" alt="">
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



<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
</body>
</html>
