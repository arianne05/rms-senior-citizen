@include('partials.header')

<section class="flex">
    {{-- Sidebar --}}
    @include('partials.sidebar')
    
    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        @if(auth()->user()->position == 'Admin')
            <div class="pr-16 pt-8 flex justify-end">
                <form action="/viewbrgypdf" method="POST">
                    @csrf
                    <input type="hidden" name="brgyname" value="{{$title}}">
                    <div class="flex gap-2">
                        <div class="">
                            <label>Date From</label>
                            <input type="date" value="{{ $datefrom ?? '' }}" name="datefrom" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm mb-2">
                        </div>
                        <div class="">
                            <label>Date To</label>
                            <input type="date" value="{{ $dateto ?? '' }}" name="dateto" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm mb-2">
                        </div>
                        <div class="">
                            <button type="submit" class="font-medium text-slate-100 bg-gray-400 hover:bg-blue-500 rounded-xl p-3 px-12">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif

        <div class="container w-full h-auto p-20">

            <table id="dashboardTbl" class="display">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Sex</th>
                        <th>Birthdate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangay_list as $list)  
                      <tr>
                          <td>{{$list->lastname}}</td>
                          <td>{{$list->firstname}}</td>
                          <td>{{$list->middlename}}</td>
                          <td>{{$list->sex}}</td>
                          <td>{{$list->birthdate}}</td>
                          <td>
                            <a href="/edit_citizen/{{$list->id}}">Edit</a> 
                            <a href="/view_citizen/{{$list->id}}">View</a> 
                            @if(auth()->user()->position == 'Admin')
                                <a href="/delete_citizen/{{$list->id}}" id="delete_confirmation">Delete</button></a>
                            @endif
                          </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
      
          </div>
    </div>
</section>

{{-- Components --}}
<x-delete_message />
<x-message />

@include('partials.footer')