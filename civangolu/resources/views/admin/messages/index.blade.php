<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Messages') }}
            </h2>

        </div>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto mb-6">
                        <thead>
                        <tr>
                            <th class="border px-4 py-2">Name</th>
                            <th style="width: 250px" class="border px-4 py-2">Email</th>
                            <th style="width: 250px" class="border px-4 py-2">Phone</th>
                            <th style="width: 250px" class="border px-4 py-2">Message</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td class="border px-4 py-2">{{$message->name}}</td>
                                <td class="border px-4 py-2">{{$message->email}}</td>
                                <td class="border px-4 py-2">{{$message->phone}}</td>
                                <td class="border px-4 py-2">{{$message->message}}</td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
