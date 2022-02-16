<div class="fixed top-0 w-full py-4 px-12 flex justify-between items-center z-30 sticky-header {{request()->routeIs('home') ? '' : 'general-header'}}">
    <div class="min-w-max">
        <a href={{route('home')}}><img width="100" src="/img/logo.jpeg" alt=""></a>
    </div>

    <div class="w-full">
        <ul class="flex justify-center">
            <li><a class="inline-block px-4 py-2 text-white" href="">Land</a></li>
            <li><a class="inline-block px-4 py-2 text-white" href="">Villa</a></li>
            <li><a class="inline-block px-4 py-2 text-white" href="">Apartment</a></li>
            <li><a class="inline-block px-4 py-2 text-white" href="">About Us</a></li>
            <li><a class="inline-block px-4 py-2 text-white" href="">Contact Us</a></li>
        </ul>
    </div>


    <div class="min-w-max flex">
        <a class="pr-4" href=""><img src="https://flagcdn.com/40x30/tr.png"></a>
        <a href=""><img src="https://flagcdn.com/40x30/us.png"></a>
    </div>
</div>
