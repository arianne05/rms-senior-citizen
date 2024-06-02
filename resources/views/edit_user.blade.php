@include('partials.header')
<section class="flex">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        {{-- Main Section --}}
        <div class="container flex flex-col w-full h-auto p-10">
            <form action="/process_edit_user/{{$users->id}}" id="myForm" method="post">
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

                    <div class="w-1/2">
                        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Assign Barangay</span>
                        <select name="assignbrgy" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option value="" disabled {{ $users->assignbrgy == '' ? 'selected' : '' }}>Select Barangay</option>
                            <option value="Agus-Os" {{ $users->assignbrgy == 'Agus-Os' ? 'selected' : '' }}>Agus-Os</option>
                            <option value="Alulod" {{ $users->assignbrgy == 'Alulod' ? 'selected' : '' }}>Alulod</option>
                            <option value="Banaba Cerca" {{ $users->assignbrgy == 'Banaba Cerca' ? 'selected' : '' }}>Banaba Cerca</option>
                            <option value="Banaba Lejos" {{ $users->assignbrgy == 'Banaba Lejos' ? 'selected' : '' }}>Banaba Lejos</option>
                            <option value="Bancod" {{ $users->assignbrgy == 'Bancod' ? 'selected' : '' }}>Bancod</option>
                            <option value="Buna Cerca" {{ $users->assignbrgy == 'Buna Cerca' ? 'selected' : '' }}>Buna Cerca</option>
                            <option value="Buna Lejos 1" {{ $users->assignbrgy == 'Buna Lejos 1' ? 'selected' : '' }}>Buna Lejos 1</option>
                            <option value="Buna Lejos 2" {{ $users->assignbrgy == 'Buna Lejos 2' ? 'selected' : '' }}>Buna Lejos 2</option>
                            <option value="Calumpang Cerca" {{ $users->assignbrgy == 'Calumpang Cerca' ? 'selected' : '' }}>Calumpang Cerca</option>
                            <option value="Calumpang Lejos" {{ $users->assignbrgy == 'Calumpang Lejos' ? 'selected' : '' }}>Calumpang Lejos</option>
                            <option value="Carasuchi" {{ $users->assignbrgy == 'Carasuchi' ? 'selected' : '' }}>Carasuchi</option>
                            <option value="Daine 1" {{ $users->assignbrgy == 'Daine 1' ? 'selected' : '' }}>Daine 1</option>
                            <option value="Daine 2" {{ $users->assignbrgy == 'Daine 2' ? 'selected' : '' }}>Daine 2</option>
                            <option value="Guyam Malaki" {{ $users->assignbrgy == 'Guyam Malaki' ? 'selected' : '' }}>Guyam Malaki</option>
                            <option value="Guyam Munti" {{ $users->assignbrgy == 'Guyam Munti' ? 'selected' : '' }}>Guyam Munti</option>
                            <option value="Harasan" {{ $users->assignbrgy == 'Harasan' ? 'selected' : '' }}>Harasan</option>
                            <option value="Kayquit 1" {{ $users->assignbrgy == 'Kayquit 1' ? 'selected' : '' }}>Kayquit 1</option>
                            <option value="Kayquit 2" {{ $users->assignbrgy == 'Kayquit 2' ? 'selected' : '' }}>Kayquit 2</option>
                            <option value="Kayquit 3" {{ $users->assignbrgy == 'Kayquit 3' ? 'selected' : '' }}>Kayquit 3</option>
                            <option value="Καυταμβog" {{ $users->assignbrgy == 'Καυταμβog' ? 'selected' : '' }}>Καυταμβog</option>
                            <option value="Καυταροs" {{ $users->assignbrgy == 'Καυταροs' ? 'selected' : '' }}>Καυταροs</option>
                            <option value="Limbon" {{ $users->assignbrgy == 'Limbon' ? 'selected' : '' }}>Limbon</option>
                            <option value="Lumampong Balagbag" {{ $users->assignbrgy == 'Lumampong Balagbag' ? 'selected' : '' }}>Lumampong Balagbag</option>
                            <option value="Lumampong Halayhay" {{ $users->assignbrgy == 'Lumampong Halayhay' ? 'selected' : '' }}>Lumampong Halayhay</option>
                            <option value="Mahabang Kahoy Cerca" {{ $users->assignbrgy == 'Mahabang Kahoy Cerca' ? 'selected' : '' }}>Mahabang Kahoy Cerca</option>
                            <option value="Mahabang Kahoy Lejos" {{ $users->assignbrgy == 'Mahabang Kahoy Lejos' ? 'selected' : '' }}>Mahabang Kahoy Lejos</option>
                            <option value="Mataas Na Lupa" {{ $users->assignbrgy == 'Mataas Na Lupa' ? 'selected' : '' }}>Mataas Na Lupa</option>
                            <option value="Poblacion 1" {{ $users->assignbrgy == 'Poblacion 1' ? 'selected' : '' }}>Poblacion 1</option>
                            <option value="Poblacion 2" {{ $users->assignbrgy == 'Poblacion 2' ? 'selected' : '' }}>Poblacion 2</option>
                            <option value="Poblacion 3" {{ $users->assignbrgy == 'Poblacion 3' ? 'selected' : '' }}>Poblacion 3</option>
                            <option value="Poblacion 4" {{ $users->assignbrgy == 'Poblacion 4' ? 'selected' : '' }}>Poblacion 4</option>
                            <option value="Pulo" {{ $users->assignbrgy == 'Pulo' ? 'selected' : '' }}>Pulo</option>
                            <option value="Tambo Balagbag" {{ $users->assignbrgy == 'Tambo Balagbag' ? 'selected' : '' }}>Tambo Balagbag</option>
                            <option value="Tambo Ilaya" {{ $users->assignbrgy == 'Tambo Ilaya' ? 'selected' : '' }}>Tambo Ilaya</option>
                            <option value="Tambo Malaki" {{ $users->assignbrgy == 'Tambo Malaki' ? 'selected' : '' }}>Tambo Malaki</option>
                            <option value="Tambo Munti Kulit" {{ $users->assignbrgy == 'Tambo Munti Kulit' ? 'selected' : '' }}>Tambo Munti Kulit</option>
                        </select>
                        @error('assignbrgy')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror   
                    </div>
                    
                </label>

                <button type="submit" id="saveChangesBtn" class="text-white bg-sky-700 hover:bg-sky-600 active:bg-sky-700 focus:outline-none focus:ring focus:ring-sky-300 p-1.5 w-full rounded">
                    Save Changes
                </button>
              </form>
        </div>
    </div>
</section>

{{-- Component --}}
<x-message />
<x-save_message />
@include('partials.footer')

