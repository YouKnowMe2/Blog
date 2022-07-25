<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <style>
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
        <form action=" {{route('editedChef',$chef->id)}}" method="POST" enctype="multipart/form-data">@csrf

            <div style="padding: 15px">
                <label for="name">Name</label>
                <input type="text" name="name"  style="color: #0a0a0a" value="{{$chef->name}}">
            </div>

            <div style="padding: 15px;">
                <label for="speciality">Spciality</label>
                <input type="text" name="speciality"  style="color: #0a0a0a" value="{{$chef->speciality}}">
            </div>
            <div style="padding: 15px;">
                <label for="speciality">Old Image</label>
                <img height="200px" width="200px" src="/chefImage/{{$chef->image}}" alt="">
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
