<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catogories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <table class="text-center border w-full border-b">
                        <tr>
                            <th class="border-t border-l-4 px-2 py-1 text-left">ID</th>
                            <th class="border-t border-l-4 px-2 py-1 ">Name</th>
                            <th class="border-t border-l-4 px-2 py-1 ">Minimum Age</th>
                            <th class="border-t border-l-4 px-2 py-1 ">Action</th>
                        </tr>
                       <tr>
                           @foreach($categories as $category)
                           <td>{{$category->id}}</td>
                           <td>{{$category->name}}</td>
                           <td>{{$category->min_age}}</td>
                           <td><a href="{{route('categories.show',$category->id)}}" class="text-green-600">Edit</a></td>
                       </tr>
                       @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
