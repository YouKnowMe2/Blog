<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrations') }}
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
                            <th class="border-t border-l-4 px-2 py-1 ">Date of Birth</th>
                            <th class="border-t border-l-4 px-2 py-1 ">Phone</th>
                            <th class="border-t border-l-4 px-2 py-1 ">Center</th>
                            <th class="border-t border-l-4 px-2 py-1 ">Message Sent Date</th>
                            <th class="border-t border-l-4 px-2 py-1 ">Vaccine 01 Date</th>
                            <th class="border-t border-l-4 px-2 py-1 ">Vaccine 02 Date</th>
                            <th class="border-t border-l-4 px-2 py-1 ">Diabates</th>
                            <th class="border-t border-l-4 px-2 py-1 ">Action</th>
                        </tr>
                       <tr>
                           @foreach($registrations as $registraiton)

                               <td>{{$registraiton->name}}</td>
                               <td>{{$registraiton->dob}}</td>
                               <td>{{$registraiton->phone_no}}</td>
                               <td>{{$registraiton->center_id}}</td>
                               <td>{{$registraiton->upcoming_days}}</td>
                               <td>{{$registraiton->v1_date}}</td>
                               <td>{{$registraiton->v2_date}}</td>
                               <td>@if($registraiton->diabates ==1)
                                    No
                                   @else
                                   Yes
                                   @endif
                               </td>
                           <td>
                               <a href="{{route('registration.edit',$registraiton->id)}}" class="text-green-600 inline-block">Add Vaccine Date 01 and 02</a>
                           </td>

                       </tr>
                       @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
