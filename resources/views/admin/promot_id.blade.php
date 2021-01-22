<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Promot') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    {{-- Show Succss Message  --}}
                    @if (session('create_msg'))
                    <div class="text-green-500 bg-white py-4 text-center font-bold shadow-xl sm:rounded-lg mb-4">
                        {{ session('create_msg') }}
                    </div>
                    @endif

                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-12">
                            <form action="{{route('promot_id')}}" method="POST">
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div>
                                            <label for="promot_id"
                                                class="block text-sm font-medium text-gray-700">Promot
                                                User ID</label>
                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                <input required type="text" name="promot_id" id="promot_id"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                                    placeholder="Create User ID">
                                            </div>
                                            {{-- Show Error Message  --}}
                                            @error('promot_id')
                                            <p class="text-red-500 py-4 font-bold sm:rounded-lg mb-4">
                                                {{$message}}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="watch_time"
                                                class="block text-sm font-medium text-gray-700">Watch
                                                Time</label>
                                            <div class="mt-1 relative rounded-md shadow-sm">

                                                <input value="10" required type="number" name="watch_time"
                                                    id="watch_time"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                                    placeholder="Set Time">
                                            </div>
                                            {{-- Show Error Message  --}}
                                            @error('watch_time')
                                            <p class="text-red-500 py-4 font-bold sm:rounded-lg mb-4">
                                                {{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @php
            $sn = 1;
            @endphp
            {{-- List  --}}
            {{-- delete message --}}
            @if (session('delete_msg'))
            <div class="text-green-500 bg-white py-4 mt-5 text-center font-bold shadow-xl sm:rounded-lg">
                {{ session('delete_msg') }}
            </div>
            @endif
            <div class="flex flex-col mt-20 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            #SN
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Promot ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Watch Time
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Video ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Upload Time
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Done Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($data as $promot)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$sn++}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{$promot->promot_id ? $promot->promot_id:"N/A"}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-green-800">
                                                {{$promot->watch_time ? $promot->watch_time." Minute" : "N/A"}}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-green-800">
                                                {{$promot->video_id ? $promot->video_id: "N/A"}}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-green-800">
                                                {{-- {{$promot->video_id ? $promot->video_id: "N/A"}} --}}
                                                এখনো করা হইনি
                                            </span>
                                        </td>


                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{$promot->done_status ? $promot->done_status: "N/A"}}

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                            <a href="delete_promot/{{$promot->id}}"
                                                class="text-red-500 font-bold hover:text-indigo-900">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    <!-- More items... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>