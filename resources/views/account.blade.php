@include('partials.header')

<section class="flex">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        {{-- Main Section --}}
        <div class="container flex flex-col w-full h-auto p-10">
            <div class="flex gap-x-4">
                <div class="flex flex-col w-1/2 p-5">
                    <h1 class="font-bold text-xl">Personal Detail</h1>
                    <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Name</label>
                    <input type="text" name="name" value="{{$userdetail->name}}" class="w-4/2 border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">

                    <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Email</label>
                    <input type="text" name="email" value="{{$userdetail->email}}" class="w-4/2 border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">

                    <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Password</label>
                    <input type="password" name="password" value="" class="w-4/2 border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">

                    <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Confirm Password</label>
                    <input type="password" name="confirmation_password" value="" class="w-4/2 border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">

                    <a href="#" class="w-4/2 font-medium text-slate-100 bg-green-700 hover:bg-green-500 rounded-xl p-3 px-12 mt-8 text-center">Save Changes</a>
                </div>
                <div class="w-1/2 h-auto border-2 border-solid border-gray-200 p-5 rounded-xl">
                    <h1 class="font-bold text-xl">User Overview</h1>
                    <div class="flex flex-col items-center justify-center">
                        <div class="shrink-0">
                            @php $default_img="https://api.dicebear.com/7.x/initials/svg?seed={$userdetail->name}" @endphp
                            <img class="h-20 w-20 object-cover rounded-full" src="{{$default_img}}" alt="avatar" />
                        </div>
                        <p class="text-xl font-semibold">{{$userdetail->name}}</p>
                        <p class="text-sm font-regular text-gray-500">#{{$userdetail->id}}</p>
                    </div>

                    <div class="flex flex-col p-4">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Registered Email</label>
                        <input type="text" name="confirmation_password" disabled value="{{$userdetail->email}}" class="w-full border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Assign Position</label>
                        <input type="text" name="confirmation_password" disabled value="{{$userdetail->position}}" class="w-full border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Account Status</label>
                        <input type="text" name="confirmation_password" disabled value="{{$userdetail->status}}" class="w-full border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                </div>
            </div>
            

            <h1 class="font-bold text-xl mt-8">List of Registered User</h1>
            <p>List of all registered user in the system</p>
            <hr><br>

            <table id="dashboardTbl" class="display">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alluser as $user)  
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->position}}</td>
                        <td>{{$user->status}}</td>
                        <td class="flex gap-x-3">
                            <a href="/edit_citizen/{{$user->id}}">Edit</a>
                            <a href="/delete_citizen/{{$user->id}}">Deactivate</a>
                            <a href="/view_citizen/{{$user->id}}">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>

@include('partials.footer')