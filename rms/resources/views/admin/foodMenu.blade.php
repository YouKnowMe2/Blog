<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
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
            <form action=" {{route('upload_food')}}" method="POST" enctype="multipart/form-data">@csrf

                <div style="padding: 15px">
                    <label for="title">Title</label>
                    <input type="text" name="title"  style="color: #0a0a0a" placeholder="write the title">
                </div>

                <div style="padding: 15px;">
                    <label for="price">Price</label>
                    <input type="number" name="price"  style="color: #0a0a0a" placeholder="write the price">
                </div>

                <div style="padding: 15px;">
                    <label for="description">Description</label>
                    <input type="text" name="description"  style="color: #0a0a0a" placeholder="write the description">
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
                <th style="padding: 40px">Title</th>
                <th style="padding: 40px">Price</th>
                <th style="padding: 40px">Image</th>
                <th style="padding: 40px">Description</th>
                <th style="padding: 40px" colspan="2">Action</th>
            </tr>
            @foreach($foods as $food)
                <tr align="center">
                    <td>{{$food->title}}</td>
                    <td>{{$food->price}}</td>
                    <td><img style="height: 50px; width: 50px" src="{{url('foodImage').'/'.$food->image}}" alt=""></td>
                    <td>{{$food->description}}</td>
                    <td style="padding: 10px"><a href="{{route('viewFood',$food->id)}}" class="btn btn-success">Update</a></td>
                    <td style="padding: 10px"><a href="{{route('deleteFood',$food->id)}}" class="btn btn-danger">Delete</a></td>

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
