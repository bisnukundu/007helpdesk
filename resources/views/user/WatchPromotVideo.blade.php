<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Watch Promote Video') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="grid py-12  grid-rows-2 sm:grid-cols-3 gap-4">

                @for($i=0;$i<10;$i++) <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/8ElcE1gEhwg" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                    <div class="text-center my-4">
                        <button class="mb-2 px-12 inline py-3 shadow-xl button border rounded-lg font-bold">Start</button>
                    <p>10:00</p>
                    </div>

            </div>
            @endfor



        </div>
    </div>
    </div>


</x-app-layout>
