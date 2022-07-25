<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto">
            <div class="">


                <h2 class="text-white font-bold text-2xl">Summery</h2>
                <div class="grid grid-cols-4 gap-5 mt-6">



                    <div class="bg-gradient-to-tr from-teal-200 to-yellow-500 rounded-md">
                        <a href=" {{route('client.index')}}" class="flex px-10 py-14 flex-col items-center">
                            <h1 class="font-bold text-3xl">{{count($user->clients)}}</h1>
                            <h2 class="text-emerald-900 font-black uppercase">Clients</h2>
                        </a>

                    </div>
                    <div class="bg-gradient-to-tr from-teal-200 to-yellow-500 rounded-md">
                        <a href="{{route('task.index')}}?status=pending" class="flex px-10 py-14 flex-col items-center">
                            <h1 class="font-bold text-3xl">{{count($pending_tasks)}}</h1>
                            <h2 class="text-emerald-900 font-black uppercase">Pending Tasks</h2>
                        </a>

                    </div>
                    <div class="bg-gradient-to-tr from-teal-200 to-yellow-500 rounded-md">
                        <a href="{{route('task.index')}}?status=complete" class="flex px-10 py-14 flex-col items-center">
                            <h1 class="font-bold text-3xl">{{count($user->tasks) - count($pending_tasks)}}</h1>
                            <h2 class="text-emerald-900 font-black uppercase">Completed Tasks</h2>
                        </a>

                    </div>

                    <div class="bg-gradient-to-tr from-teal-200 to-yellow-500 rounded-md">
                        <a href="{{route('invoice.index')}}?status=unpaid" class="flex px-10 py-14 flex-col items-center">
                            <h1 class="font-bold text-3xl">{{count($unpaid_invoice) }}</h1>
                            <h2 class="text-emerald-900 font-black uppercase">Due Invoice</h2>
                        </a>

                    </div>








                </div>
            </div>
        </div>
        <div class=" flex max-w-5xl mx-auto p-12">
            <div class="flex-1 ">
                <h3>Todo:</h3>
                <ul class="bg-slate-300 px-10 py-10 inline-block">
                    @forelse($pending_tasks->slice(0,5) as $task)
                        <li><a href="{{route('task.show',$task->id)}}">{{$task ->name}}</a></li></br>
                    @empty
                        <li>No list has been found</li>
                    @endforelse
                </ul>
            </div>
            <div>
                <div class="flex-1">
                    <h3>Payment Done:</h3>
                    <ul class="bg-slate-300 px-10 py-10 inline-block">
                        @forelse($paid_invoice->slice(0,5) as $invoice)
                            <li><a href="">{{$invoice->client->name}}</a></li></br>
                        @empty
                            <li>No Payment history found</li>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>


    </div>




</x-app-layout>
