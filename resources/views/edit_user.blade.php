@include('partials.header')
<section class="flex">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        {{-- Main Section --}}
        <div class="container flex flex-col w-full h-auto p-10">
            <form action="/process_edit_user/{{$users->id}}" method="post">
                @csrf
                <label class="block mb-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Name</span>
                    <input type="text" name="name" value="{{$users->name}}" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"/>
                    @error('name')
                        <p class="text-red-500 text-xs p-2">
                            {{$message}}
                        </p>
                    @enderror    
                </label>

                <label class="block mb-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Email</span>
                    <input type="email" name="email" value="{{$users->email}}" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="you@example.com"/>
                    @error('email')
                        <p class="text-red-500 text-xs p-2">
                            {{$message}}
                        </p>
                    @enderror    
                </label>

                <label class="block mb-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">New Password</span>
                    <input type="password" name="password" value="" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"/>
                    @error('password')
                        <p class="text-red-500 text-xs p-2">
                            {{$message}}
                        </p>
                    @enderror    
                </label>
                
                <label class="block mb-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Confirm Password</span>
                    <input type="password" name="password_confirmation" value="" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"/>
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs p-2">
                            {{$message}}
                        </p>
                    @enderror    
                </label>

                <label class="flex w-full block mb-5 gap-x-2">
                    <div class="w-1/2">
                        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Position</span>
                        <select name="position" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option value="" selected {{ $users->position == '' ? 'selected' : '' }}>Choose Role</option>
                            <option value="OSCA Staff" {{ $users->position == 'OSCA Staff' ? 'selected' : '' }} >OSCA Staff</option>
                            <option value="Admin" {{ $users->position == 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('position')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror   
                    </div>

                    <div class="w-1/2">
                        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Account Status</span>
                        <select name="status" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option value="" selected {{ $users->status == '' ? 'selected' : '' }}>Choose Status</option>
                            <option value="Active" {{ $users->status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ $users->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror   
                    </div>
                    
                </label>

                <button type="submit" class="text-white bg-sky-700 hover:bg-sky-600 active:bg-sky-700 focus:outline-none focus:ring focus:ring-sky-300 p-1.5 w-full rounded">
                    Save Changes
                </button>
              </form>
        </div>
    </div>
</section>

{{-- Component --}}
<x-message />
@include('partials.footer')

