
<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        @foreach($foods as $food)
            <form action="{{url('/addCart',$food->id)}}" method="post">@csrf


        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
                <div class="item">
                    <div class='card ' style="background-image: url('/foodImage/{{$food->image}}')">
                        <div class="price"><h6>{{$food->price}}</h6></div>
                        <div class='info'>
                            <h1 class='title'>{{$food->title}}</h1>
                            <p class='description'>{{$food->description}}.</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <input type="number" name="quantity" min="0" style="width: 80px;" value="1">
                    <input type="submit" value="add_cart">
                </div>

                </form>
                @endforeach
            </div>
        </div>
    </div>
</section>
