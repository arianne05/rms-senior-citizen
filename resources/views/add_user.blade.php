@include('partials.header')
<section class="flex">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        {{-- Main Section --}}
        <div class="container flex flex-col w-full h-auto p-10">
            <form action="/register" method="post">
                @csrf
                <label class="block mb-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Full Name</span>
                    <input type="text" name="name" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"/>
                    @error('name')
                        <p class="text-red-500 text-xs p-2">
                            {{$message}}
                        </p>
                    @enderror    
                </label>

                <label class="block mb-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Email</span>
                    <input type="email" name="email" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="you@example.com"/>
                    @error('email')
                        <p class="text-red-500 text-xs p-2">
                            {{$message}}
                        </p>
                    @enderror    
                </label>

                <label class="block mb-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Password</span>
                    <input type="password" name="password" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"/>
                    @error('password')
                        <p class="text-red-500 text-xs p-2">
                            {{$message}}
                        </p>
                    @enderror    
                </label>

                <label class="flex w-full block mb-5 gap-x-2">
                    <div class="w-1/2">
                        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Position</span>
                        <select name="position" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option value="" disabled {{ old('position') == '' ? 'selected' : '' }}>Choose Role</option>
                            <option value="OSCA Staff">OSCA Staff</option>
                            <option value="Admin">Admin</option>
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
                            <option value="" disabled {{ old('status') == '' ? 'selected' : '' }}>Choose Status</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
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
                            <option value="" disabled {{ old('assignbrgy') == '' ? 'selected' : '' }}>Select Barangay</option>
                            <option value="Agus-Os" {{ old('assignbrgy') == 'Agus-Os' ? 'selected' : '' }}>Agus-Os</option>
                            <option value="Alulod" {{ old('assignbrgy') == 'Alulod' ? 'selected' : '' }}>Alulod</option>
                            <option value="Banaba Cerca" {{ old('assignbrgy') == 'Banaba Cerca' ? 'selected' : '' }}>Banaba Cerca</option>
                            <option value="Banaba Lejos" {{ old('assignbrgy') == 'Banaba Lejos' ? 'selected' : '' }}>Banaba Lejos</option>
                            <option value="Bancod" {{ old('assignbrgy') == 'Bancod' ? 'selected' : '' }}>Bancod</option>
                            <option value="Buna Cerca" {{ old('assignbrgy') == 'Buna Cerca' ? 'selected' : '' }}>Buna Cerca</option>
                            <option value="Buna Lejos 1" {{ old('assignbrgy') == 'Buna Lejos 1' ? 'selected' : '' }}>Buna Lejos 1</option>
                            <option value="Buna Lejos 2" {{ old('assignbrgy') == 'Buna Lejos 2' ? 'selected' : '' }}>Buna Lejos 2</option>
                            <option value="Calumpang Cerca" {{ old('assignbrgy') == 'Calumpang Cerca' ? 'selected' : '' }}>Calumpang Cerca</option>
                            <option value="Calumpang Lejos" {{ old('assignbrgy') == 'Calumpang Lejos' ? 'selected' : '' }}>Calumpang Lejos</option>
                            <option value="Carasuchi" {{ old('assignbrgy') == 'Carasuchi' ? 'selected' : '' }}>Carasuchi</option>
                            <option value="Daine 1" {{ old('assignbrgy') == 'Daine 1' ? 'selected' : '' }}>Daine 1</option>
                            <option value="Daine 2" {{ old('assignbrgy') == 'Daine 2' ? 'selected' : '' }}>Daine 2</option>
                            <option value="Guyam Malaki" {{ old('assignbrgy') == 'Guyam Malaki' ? 'selected' : '' }}>Guyam Malaki</option>
                            <option value="Guyam Munti" {{ old('assignbrgy') == 'Guyam Munti' ? 'selected' : '' }}>Guyam Munti</option>
                            <option value="Harasan" {{ old('assignbrgy') == 'Harasan' ? 'selected' : '' }}>Harasan</option>
                            <option value="Kayquit 1" {{ old('assignbrgy') == 'Kayquit 1' ? 'selected' : '' }}>Kayquit 1</option>
                            <option value="Kayquit 2" {{ old('assignbrgy') == 'Kayquit 2' ? 'selected' : '' }}>Kayquit 2</option>
                            <option value="Kayquit 3" {{ old('assignbrgy') == 'Kayquit 3' ? 'selected' : '' }}>Kayquit 3</option>
                            <option value="Καυταμβog" {{ old('assignbrgy') == 'Καυταμβog' ? 'selected' : '' }}>Καυταμβog</option>
                            <option value="Καυταροs" {{ old('assignbrgy') == 'Καυταροs' ? 'selected' : '' }}>Καυταροs</option>
                            <option value="Limbon" {{ old('assignbrgy') == 'Limbon' ? 'selected' : '' }}>Limbon</option>
                            <option value="Lumampong Balagbag" {{ old('assignbrgy') == 'Lumampong Balagbag' ? 'selected' : '' }}>Lumampong Balagbag</option>
                            <option value="Lumampong Halayhay" {{ old('assignbrgy') == 'Lumampong Halayhay' ? 'selected' : '' }}>Lumampong Halayhay</option>
                            <option value="Mahabang Kahoy Cerca" {{ old('assignbrgy') == 'Mahabang Kahoy Cerca' ? 'selected' : '' }}>Mahabang Kahoy Cerca</option>
                            <option value="Mahabang Kahoy Lejos" {{ old('assignbrgy') == 'Mahabang Kahoy Lejos' ? 'selected' : '' }}>Mahabang Kahoy Lejos</option>
                            <option value="Mataas Na Lupa" {{ old('assignbrgy') == 'Mataas Na Lupa' ? 'selected' : '' }}>Mataas Na Lupa</option>
                            <option value="Poblacion 1" {{ old('assignbrgy') == 'Poblacion 1' ? 'selected' : '' }}>Poblacion 1</option>
                            <option value="Poblacion 2" {{ old('assignbrgy') == 'Poblacion 2' ? 'selected' : '' }}>Poblacion 2</option>
                            <option value="Poblacion 3" {{ old('assignbrgy') == 'Poblacion 3' ? 'selected' : '' }}>Poblacion 3</option>
                            <option value="Poblacion 4" {{ old('assignbrgy') == 'Poblacion 4' ? 'selected' : '' }}>Poblacion 4</option>
                            <option value="Pulo" {{ old('assignbrgy') == 'Pulo' ? 'selected' : '' }}>Pulo</option>
                            <option value="Tambo Balagbag" {{ old('assignbrgy') == 'Tambo Balagbag' ? 'selected' : '' }}>Tambo Balagbag</option>
                            <option value="Tambo Ilaya" {{ old('assignbrgy') == 'Tambo Ilaya' ? 'selected' : '' }}>Tambo Ilaya</option>
                            <option value="Tambo Malaki" {{ old('assignbrgy') == 'Tambo Malaki' ? 'selected' : '' }}>Tambo Malaki</option>
                            <option value="Tambo Munti Kulit" {{ old('assignbrgy') == 'Tambo Munti Kulit' ? 'selected' : '' }}>Tambo Munti Kulit</option>
                        </select>
                        @error('assignbrgy')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror   
                    </div>
                    
                </label>

                <button type="submit" class="text-white bg-sky-700 hover:bg-sky-600 active:bg-sky-700 focus:outline-none focus:ring focus:ring-sky-300 p-1.5 w-full rounded">
                    Add User
                </button>
              </form>
        </div>
    </div>
</section>

{{-- Component --}}
<x-message />
@include('partials.footer')

