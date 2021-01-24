<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Promote My Video') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Show Succss Message  --}}
                @if (session('suc_msg'))
                <div class="text-green-500 bg-white py-4 text-center font-bold shadow-xl sm:rounded-lg mb-4">
                    {{ session('suc_msg') }}
                </div>
                @endif
                @if (session('fai_msg'))
                <div class="text-red-500 bg-white py-4 text-center font-bold shadow-xl sm:rounded-lg mb-4">
                    {{ session('fai_msg') }}
                </div>
                @endif
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-12">
                            <form action="{{route('user.store')}}" method="POST">
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div>
                                            <label for="user_id" class="block text-sm font-medium text-gray-700">User
                                                ID</label>
                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                <input required type="text" name="user_id" id="user_id"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                                    placeholder="Enter User ID">
                                            </div>
                                            {{-- Show error message  --}}
                                            @error('user_id')
                                            <p class="font-bold text-red-500 mt-2">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="video_id" class="block text-sm font-medium text-gray-700">Video
                                                ID</label>
                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                <input required type="text" name="video_id" id="video_id"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                                    placeholder="Enter Video ID">
                                            </div>
                                            {{-- Show error message  --}}
                                            @error('video_id')
                                            <p class="font-bold text-red-500 mt-2">{{$message}}</p>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Promot
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
