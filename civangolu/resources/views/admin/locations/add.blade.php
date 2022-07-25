<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Yeni konum ekle') }}
            </h2>

            <div class="min-w-max">
                <a href="{{route('dashboard-location.index')}}" class="fullwidth-btn">Geri</a>
            </div>
        </div>
    </x-slot>




    <form action="{{route('dashboard-locations.store')}}" method="post" class="p-6 bg-white border-b border-gray-200"> @csrf
        <div class="flex -mx-4 mb-6">
            <div class="flex-1 px-4">
                <label class="civanoglu-label" for="name">Başlık <span class="required-text">*</span></label>
                <input class="civanoglu-input" type="text" id="name" name="name" required>
            </div>
        </div>

        <button class="btn" type="submit">Kayıt etmek</button>
    </form>



</x-app-layout>
