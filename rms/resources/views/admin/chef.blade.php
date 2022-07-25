<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
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
        <form action=" {{route('upload_chef')}}" method="POST" enctype="multipart/form-data">@csrf

            <div style="padding: 15px">
                <label for="name">Name</label>
                <input type="text" name="name"  style="color: #0a0a0a" placeholder="write the Name">
            </div>

            <div style="padding: 15px;">
                <label for="speciality">Spciality</label>
                <input type="text" name="speciality"  style="color: #0a0a0a" placeholder="write the Spciality">
            </div>


            <div style="padding: 15px;">
                <label for="image">Upload the Image</label>
                <input type="file" name="file">
            </div>

            <div style="padding: 20px">
                <input type="submit" class="btn btn-success">
            </div>

        </form>
        <table bgcolor="grey" border="3px">
            <tr >
                <th style="padding: 40px">Name</th>
                <th style="padding: 40px">Specialtiy</th>
                <th style="padding: 40px">Image</th>
                <th style="padding: 40px" colspan="2">Action</th>
            </tr>
            @foreach($chefs as $chef)
                <tr align="center">
                    <td>{{$chef->name}}</td>
                    <td>{{$chef->speciality}}</td>
                    <td><img style="height: 50px; width: 50px" src="{{url('chefImage').'/'.$chef->image}}" alt=""></td>
                    <td style="padding: 10px"><a href="{{route('editchef',$chef->id)}}" class="btn btn-success">Update</a></td>
                    <td style="padding: 10px"><a href="{{route('deleteChef',$chef->id)}}" class="btn btn-danger">Delete</a></td>

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
