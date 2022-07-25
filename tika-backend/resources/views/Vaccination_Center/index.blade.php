<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vaccination_Center') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Session::get('message'))
                    <div class="p-3 bg-green-200 mb-6 text-center">
                            {{Session::get('message')}}
                    </div>
                    @endif
                   <table class="text-center border w-full border-b">
                        <tr>
                            <th class="border-t border-l-4 px-2 py-1 ">Name</th>
                            <th class="border-t border-l-4 px-2 py-1 ">Action</th>
                        </tr>
                       <tr>
                           @foreach($vaccination_center as $center)
                               <td>{{$center->name}}</td>
                           <td>
                               <a href="{{route('vaccination_center.edit',$center->id)}}" class="text-green-600 inline-block">Edit</a>

                           </td>

                       </tr>
                       @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
