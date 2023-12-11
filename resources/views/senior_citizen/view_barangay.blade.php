@include('partials.header')

<section class="flex">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

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
                          <td><button>Edit</button> <button>Delete</button></td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
      
          </div>

    </div>

</section>

@include('partials.footer')