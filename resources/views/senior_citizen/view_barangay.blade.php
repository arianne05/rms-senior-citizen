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
                            <button type="submit" class="font-medium text-slate-100 bg-gray-400 hover:bg-blue-500 rounded-xl p-3 px-12">View</button>
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
                        <th>Suffix</th>
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
                          <td>{{$list->suffix}}</td>
                          <td>{{$list->sex}}</td>
                          {{-- <td>{{$list->birthdate}}</td> --}}
                          <td>{{ date('m/d/Y', strtotime($list->birthdate)) }}</td>
                          <td class="flex gap-3">
                            <a href="/edit_citizen/{{$list->id}}"><span class="material-symbols-outlined">edit</span></a> 
                            <a href="/view_citizen/{{$list->id}}"><span class="material-symbols-outlined">visibility</span></a> 
                            @if(auth()->user()->position == 'Admin')
                                <a href="/delete_citizen/{{$list->id}}" id="delete_confirmation"><span class="material-symbols-outlined">delete</span></button></a>
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