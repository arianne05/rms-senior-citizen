<aside>
    <div class="sticky top-0 overflow-hidden w-48 h-screen max-h-screen border-solid border-2 border-gray-100 flex justify-center align-center pt-5">
        <ul class="">
            <li class="font-bold flex align-center text-lg justify-center rounded-lg group pb-7"><h1>RM SYSTEM</h1></li>
           
            <div class="flex flex-col justify-between">
                <div class="">
                    <a href="/dashboard">
                        <li class="flex align-center mb-2 mt-2 rounded-lg py-1.5 px-7 bg-white group hover:bg-sky-500 hover:text-white">
                            <span class="material-symbols-outlined pr-2">grid_view</span>Dashboard
                        </li>
                    </a>        
                    <a href="/barangay">
                        <li class="flex align-center mb-2 mt-2 rounded-lg py-1.5 px-7 bg-white group hover:bg-sky-500 hover:text-white">
                            <span class="material-symbols-outlined pr-2">holiday_village</span>Barangay
                        </li>
                    </a>
                    <a href="/citizen">
                        <li class="flex align-center mb-2 mt-2 rounded-lg py-1.5 px-7 bg-white group hover:bg-sky-500 hover:text-white">
                            <span class="material-symbols-outlined pr-2">group</span>Citizen
                        </li>
                    </a>
                </div>
                
                <hr>

                <div class="">
                    <a href="">
                        <li class="flex align-center mb-2 mt-2 rounded-lg py-1.5 px-7 bg-white group hover:bg-sky-500 hover:text-white">
                            <span class="material-symbols-outlined pr-2">person</span>Account
                        </li>
                    </a>
        
                    <li class="flex align-center mb-2 mt-2 rounded-lg py-1.5 px-7 bg-white group hover:bg-sky-500 hover:text-white">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="flex align-center"><span class="material-symbols-outlined pr-2">logout</span>Logout</button>
                        </form>
                    </li>
                </div>

            </div>
           



        </ul>
    </div>
</aside>