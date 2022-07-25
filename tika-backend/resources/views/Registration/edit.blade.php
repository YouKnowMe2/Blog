<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class=" w-full font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Vaccine Date') }}
            </h2>
            <div class="min-w-max">

                <a  href="{{route('registration.index')}}" class="p-2 bg-gray-800 text-white" >Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <form action="{{route('registration.update',$registration->id)}}" method="POST">@method('PUT') @csrf
                        <p class="mb-12">
                            <h3  class=" text-green-600 text-4xl uppercase">Vaccine 01 Date and Vaccine 02 Date</h3>

                            <h3 class="text-3xl text-center">Add Date <br>Vaccine 01 date will be added after 7 Days of Today's Date-{{$current}}</h3>
                            <h3 class="text-3xl text-center">Vaccine 01 Date- {{$vaccine01}}</h3>
                        <h3 class="text-3xl text-center">Vaccine 02 date will be added after 30 Days of Vaccine 01 Date-{{$vaccine01}}</h3>
                            <h3 class="text-3xl text-center">Vaccine 02 Date - {{$vaccine02}}</h3>
                        </p>


                        <button type="submit" class="p-2 bg-green-600 text-white ">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
