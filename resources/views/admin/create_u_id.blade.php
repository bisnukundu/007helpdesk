<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create User') }}
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
          {{-- Show Error Message  --}}
          @error('user_id')
          <p class="text-red-500 bg-white py-4 text-center font-bold shadow-xl sm:rounded-lg mb-4">{{$message}}</p>
          @enderror
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-12">
              <form action="{{route('create_id')}}" method="POST">
                @csrf
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                  <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div>
                      <label for="user_id" class="block text-sm font-medium text-gray-700">Create User ID</label>
                      <div class="mt-1 relative rounded-md shadow-sm">

                        <input required type="text" name="user_id" id="user_id"
                          class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                          placeholder="Create User ID">
                      </div>

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
      {{-- List  --}}
      {{-- delete message --}}
      @if (session('delete_msg'))
      <div class="text-green-500 bg-white py-4 mt-5 text-center font-bold shadow-xl sm:rounded-lg">
        {{ session('delete_msg') }}
      </div>
      @endif

      <div class="flex  mt-10 flex-col bg-white overflow-hidden shadow-xl sm:rounded-lg">
        {{-- Search option  --}}
        <div class="flex flex-row-reverse">
          <form action="{{route('search_user')}}" method="GET" class=" block max-w-3xl">
            <div class="shadow sm:rounded-md  sm:overflow-hidden">
              <div class="px-4  py-3 bg-gray-50 text-right sm:px-6">
                <div class="space-x-4 mr-0">
                  <div class=" inline-block mt-1 relative rounded-md shadow-sm">
                    <input required type="text" name="search_user" id="user_id"
                      class="focus:ring-indigo-500 focus:border-indigo-500 block  pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                      placeholder="Search User">
                  </div>
                  <button type="submit"
                    class="inline-block justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Search
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
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
                      User ID
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Name
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Phone
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Email
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Channel Name
                    </th>

                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @php
                  $sl = 1;
                  @endphp
                  @foreach ($data as $id)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      {{$sl++}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      {{$id->user_id}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      {{$id->name ? $id->name : "N/A"}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      {{$id->phone ? $id->phone : "N/A"}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      {{$id->email ? $id->email : "N/A"}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      {{$id->channel_name ? $id->channel_name : "N/A"}}

                    </td>


                    <td class="px-6 py-4 whitespace-nowrap">
                      <form action="delete_user/{{$id->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are you sure?')"
                          class="text-red-500 font-bold hover:text-indigo-900">
                          Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  <!-- More items... -->
                </tbody>
              </table>
              <div class="px-5 pb-5"> {{$data->links()}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>