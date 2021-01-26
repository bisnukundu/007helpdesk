<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Watch Promote Video') }}
        </h2>
    </x-slot>
    @php
    $check_data = [];
    foreach ($data2 as $key => $value) {
    array_push($check_data,$value['user_id']);
    array_push($check_data,$value['video_id']);
    }
    @endphp
    @if (session('msg'))
    <div class="text-green-500 bg-white py-4 mt-5 text-center font-bold shadow-xl sm:rounded-lg">
        {{ session('msg') }}
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="grid py-12  grid-rows-2 sm:grid-cols-3 gap-4">
                @foreach ($data as $item)
                @if (in_array($item['user_id'],$check_data))
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$item['video_id']}}"
                        frameborder="0" allow="accelerometer;" allowfullscreen></iframe>
                    <div class="text-center my-4">
                        <form method="POST" action="{{route('complate')}}">
                            @csrf
                            <input type="hidden" value="{{$item['user_id']}}" name="id">
                            <input type="hidden" value="{{$item['video_id']}}" name="video">
                            <button type="submit" disabled
                                class="mb-2 px-12 inline py-3 shadow-xl button border rounded-lg font-bold">
                                Complate
                            </button>
                        </form>
                        <p>10:00</p>
                    </div>
                </div>
                @else
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$item['video_id']}}"
                        frameborder="0" allow="accelerometer;" allowfullscreen></iframe>

                    <div class="text-center my-4">
                        <button class="mb-2 px-12 inline py-3 shadow-xl button border rounded-lg font-bold">
                            Start
                        </button>
                        <form method="POST" action="{{route('complate')}}">
                            @csrf
                            <input type="hidden" value="{{session('user_id')}}" name="id">
                            <input type="hidden" value="{{$item['video_id']}}" name="video">
                            <button type="submit"
                                class="mb-2 px-12 inline py-3 shadow-xl button border rounded-lg font-bold">
                                Complate
                            </button>
                        </form>
                        <p>10:00</p>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            {{-- //main Content  --}}


            @php
echo "<pre>";print_r($check_data); echo "<pre>";
    echo "<br>";
    echo "<br>";echo "<pre>";print_r($data); echo "<pre>";
    echo "<br>";
            foreach ($data as $key => $value) {
            if (in_array($value['user_id'],$check_data) && in_array($value['video_id'],$check_data)) {
            echo "Complate";
            echo "<br>";
            echo $value['video_id'];
            echo "<br>";
            echo "<br>";
            }else {
            echo "Start";
            echo "<br>";
            echo $value['video_id'];
            echo "<br>";
            };
            }
            @endphp
        </div>
    </div>


</x-app-layout>
