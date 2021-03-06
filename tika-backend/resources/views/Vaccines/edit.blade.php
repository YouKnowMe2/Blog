<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class=" w-full font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Vaccine') }}
            </h2>
            <div class="min-w-max">

                <a  href="{{route('vaccines.index')}}" class="p-2 bg-gray-800 text-white" >Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('vaccines.update',$vaccine->id)}}" method="POST">@method('PUT') @csrf
                        <p class="mb-6">
                            <label for="name" class="w-full text-green-600 text-sm uppercase">Name</label>
                            <input id="name" name="name" type="text" class="border p-3 w-full" value="{{$vaccine->name}}">

                            @error('name')
                            <span class="block text-red-600">{{$message}}</span>
                            @enderror
                        </p>


                        <button type="submit" class="p-2 bg-green-600 text-white">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
