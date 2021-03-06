<div class="fixed top-0 w-full py-4 px-12 flex justify-between items-center z-30 sticky-header {{request()->routeIs('home') ? '' : 'general-header'}}">
    <div class="min-w-max">
        <a href={{route('home')}}><img width="100" src="/img/logo.jpeg" alt=""></a>
    </div>

    <div class="w-full">
        <ul class="flex justify-center">
            <li><a class="inline-block px-4 py-2 text-white" href="{{route('properties')}}?type=0">Land</a></li>
            <li><a class="inline-block px-4 py-2 text-white" href="{{route('properties')}}?type=1">{{__('Apartment')}}</a></li>
            <li><a class="inline-block px-4 py-2 text-white" href="{{route('properties')}}?type=2">{{__('Villa')}}</a></li>
            <li><a class="inline-block px-4 py-2 text-white" href="{{route('page','about-us')}}">About Us</a></li>
            <li><a class="inline-block px-4 py-2 text-white" href="{{route('page','contact-us')}}">Contact Us</a></li>
        </ul>
    </div>


    <div class="min-w-max mr-10 text-2xl">
        <a class="inline-block mr-5 text-white" href="{{route('currency','usd')}}">$</a>
        <a class="inline-block mr-5 text-white" href="{{route('currency','tr')}}">₺</a>

    </div>

    <div class="min-w-max text-3xl flex">
        <a class=" mx-2" href="{{ LaravelLocalization::getLocalizedURL('tr') }}"><img
                src="https://flagcdn.com/32x24/tr.png"></a>
        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}"><img
                src="https://flagcdn.com/32x24/us.png"></a>

    </div>
</div>
