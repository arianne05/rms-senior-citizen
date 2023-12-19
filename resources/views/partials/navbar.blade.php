<nav class="sticky top-0 flex justify-between p-5 align-center bg-white border-2 border-white border-b-gray-100">
    <h1 class="text-xl font-bold flex justify-start align-center py-2 w-96">{{$title}}</h1>

    <div class="flex justify-end w-full space-x-4">
        
        <form action="/search" method="post" class="flex gap-x-3 align-center">
            @csrf
            <label class="relative block">
                <span class="sr-only">Search</span>
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <span class="material-symbols-outlined text-slate-400">search</span>
                </span>
                <input name="searchvalue" value="{{ $searchValue ?? '' }}" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search for anything..." type="text" name="search"/>
            </label>
            <button type="submit" class="flex align-center font-medium text-slate-100 bg-sky-500 hover:bg-sky-700 rounded-lg py-2 px-8">Search</button>
        </form>
        
        <ul class="flex space-x-4">
            <li>
                <a href="/add_citizen">
                <button class="flex align-center font-medium text-slate-100 bg-sky-500 hover:bg-sky-700 rounded-lg py-2 px-8 mr-5">
                    <span class="material-symbols-outlined">add</span>Add New
                </button>
                </a>
            </li>
        </ul>
    </div>
    
</nav>