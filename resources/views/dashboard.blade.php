@include('partials.header')

<section class="flex">
  {{-- Sidebar --}}
  @include('partials.sidebar')
    
  <div class="flex flex-col w-screen">
    {{-- Navbar --}}
    @include('partials.navbar')
    
    <h1 class="ml-7 font-semibold text-lg">Latest Added</h1>

    {{-- Main Section --}}
    <div class="container rounded-lg border-solid border-2 border-gray-100 max-w-5xl w-full h-auto m-7 p-8">

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
                    <td class="flex">
                      <a href="/edit_citizen/{{$senior->id}}">Edit</a>
                      <button>Delete</button></td>
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