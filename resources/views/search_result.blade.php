@include('partials.header')

<section class="flex">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

         {{-- Main Section --}}
        <div class="container w-full h-auto p-10">
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
                    @foreach ($seniors as $senior)  
                      <tr>
                          <td class="uppercase">{{$senior->lastname}}</td>
                          <td class="uppercase">{{$senior->firstname}}</td>
                          <td class="uppercase">{{$senior->middlename}}</td>
                          <td class="uppercase">{{$senior->sex}}</td>
                          <td class="uppercase">{{$senior->birthdate}}</td>
                          <td class="flex gap-x-3">
                            <a href="/edit_citizen/{{$senior->id}}"><span class="material-symbols-outlined">edit</span></a>
                            @if(auth()->user()->position == 'Admin')
                              <a href="/delete_citizen/{{$senior->id}}" id="delete_confirmation"><span class="material-symbols-outlined">delete</span></a>
                            @endif
                            <a href="/view_citizen/{{$senior->id}}"><span class="material-symbols-outlined">visibility</span></a>
                          </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>   

       
    </div>

</section>

{{-- Component --}}
<x-message />
@include('partials.footer')