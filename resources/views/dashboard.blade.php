@include('partials.header')

<section class="flex">
  {{-- Sidebar --}}
  @include('partials.sidebar')
    
  <div class="flex flex-col w-screen">
    {{-- Navbar --}}
    @include('partials.navbar')


    {{-- Main Section --}}
    <div class="container w-full h-auto p-10">
      {{-- Header --}}
      <div class="flex justify-between items-center w-full h-auto p-[20px] bg-gradient-to-r from-[#2D3C61] to-[#5C7CC7] text-white rounded-tl-[100px] rounded-bl-[0] rounded-tr-[20px] rounded-br-[20px]">
        <div class="pl-10">
          <h1 class="text-3xl font-bold">Welcome, <span class="text-[#FBE94B]">{{$name}}</span></h1>
          <p class="text-slate-300 pt-1">Start the day with a smile on your face, focus on the goal and aim higher.</p>
        </div>
        <div class="">
          <img src="{{asset('img/3d-icon.png')}}" class="w-[150px] h-[150px] p-0 m-0" alt="">
        </div>
      </div>

      <br>
      <h1 class="text-2xl text-[#2D3C61] font-bold p-0 m-0">Latest Updates</h1>
      <p class="p-0 m-0 text-[#2D3C61]">Report Overview in the following category</p>
      <br>

      {{-- Card Dashboard --}}
      <div class="flex w-full gap-3">
        <a href="/citizen" class="relative w-2/5 p-10 border-2 border-gray-300 rounded-lg hover:shadow-lg">
          <!-- Background Image -->
          <img src="{{asset('img/totals.png')}}" class="absolute right-0 z-0 w-[250px] h-[150px] pr-5 opacity-70" alt="">
          <!-- Text Content -->
          <div class="relative z-10" id="text">
            <h2 class="text-8xl p-0 m-0 font-bold">{{$totalCount}}</h2>
            <p class="font-bold pl-5">Total Record</p>
            <p class="pl-5">As of today {{$timeFormatted}}</p>
          </div>
        </a>

        <div class="w-3/5 flex gap-3">
          <div class="w-1/2 flex flex-col gap-3">
            <a href="/barangay" class="relative p-10 border-2 border-gray-300 rounded-lg hover:shadow-lg">
              <!-- Background Image -->
              <img src="{{asset('img/totalbrgy.png')}}" class="absolute right-0 z-0 w-[150px] h-[50px] pr-5 opacity-70" alt="">
               <!-- Text Content -->
              <div class="relative z-10" id="text">
                <h2 class="text-5xl font-bold">{{$totalBarangay}}</h2>
                <p>Total Barangay</p>
                <p>No. of Registered Barangays</p>
              </div>
            </a>
            <div class="border-2 border-gray-300 bg-[#C5E0F9] rounded-lg p-5 flex items-center">
              <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-blue-500"></div>
                <h2 class="text-4xl font-bold pl-5">{{$totalMaleCount}}</h2>
              </div>
              <p class="pl-2">Total Male</p>
            </div>
          </div>

          <div class="w-1/2 flex flex-col gap-3">
            <div class="relative p-10 border-2 border-gray-300 rounded-lg hover:shadow-lg">
              <!-- Background Image -->
              <img src="{{asset('img/totaluser.png')}}" class="absolute right-0 z-0 w-[120px] h-[100px] pr-5 opacity-70" alt="">
               <!-- Text Content -->
              <div class="relative z-20" id="text">
                <h2 class="text-5xl font-bold">{{$totalUsers}}</h2>
                <p>Total Users</p> <!--only clickable for admin user-->
                <p>No. of Registered Users</p>
              </div>
            </div>
            <div class="border-2 border-gray-300 bg-[#F9C5C5] rounded-lg p-5 flex items-center">
              <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-red-500"></div>
                <h2 class="text-4xl font-bold pl-5">{{$totalFemaleCount}}</h2>
              </div>
              <p class="pl-2">Total Female</p>
            </div>
          </div>
        </div>
      </div>

      <br>
      <h1 class="text-2xl text-[#2D3C61] font-bold p-0 m-0">Record Updates</h1>
      <p class="p-0 m-0">Lates Record Added</p>
      <br>

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
                    <td>{{$senior->lastname}}</td>
                    <td>{{$senior->firstname}}</td>
                    <td>{{$senior->middlename}}</td>
                    <td>{{$senior->sex}}</td>
                    <td>{{$senior->birthdate}}</td>
                    <td class="flex gap-x-3">
                      <a href="/edit_citizen/{{$senior->id}}">Edit</a>
                      @if(auth()->user()->position == 'Admin')
                        <a href="/delete_citizen/{{$senior->id}}" id="delete_confirmation">Delete</a>
                      @endif
                      <a href="/view_citizen/{{$senior->id}}">View</a>
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
<x-delete_message />

@include('partials.footer')