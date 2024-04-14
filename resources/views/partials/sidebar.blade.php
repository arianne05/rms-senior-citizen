<aside style="background-color:#DAE5FF" class="h-screen max-h-screen relative px-3.5">
    <div class="sticky top-0 w-56 border-solid border-2 border-gray-100 flex justify-center align-center h-full">
        <ul class="">
            <li class="font-bold flex align-center text-lg justify-center rounded-lg group pb-7 pt-5">
                <img src="img/indang.png" class="w-20 h-20" alt="">
            </li>
           
            <div class="flex flex-col justify-between h-max border-2">
                <div class="">
                    <a href="/dashboard">
                        <li class="flex align-center mb-2 mt-2 rounded-lg py-2.5 px-7 bg-[#DAE5FF] group hover:bg-[#5C7CC7] hover:text-white">
                            <span class="material-symbols-outlined pr-2">grid_view</span>Dashboard
                        </li>
                    </a>        
                    <a href="/barangay">
                        <li class="flex align-center mb-2 mt-2 rounded-lg py-2.5 px-7 bg-[#DAE5FF] group hover:bg-[#5C7CC7] hover:text-white">
                            <span class="material-symbols-outlined pr-2">holiday_village</span>Barangay
                        </li>
                    </a>
                </div>
                
                <hr>

                <div class="h-full" name='getspace'>
                    <div class="">
                        <a href="/citizen">
                            <li class="flex align-center mb-2 mt-2 rounded-lg py-2.5 px-7 bg-[#DAE5FF] group hover:bg-[#5C7CC7] hover:text-white">
                                <span class="material-symbols-outlined pr-2">group</span>Citizen Report
                            </li>
                        </a>
    
                        <a href="/account">
                            <li class="flex align-center mb-2 mt-2 rounded-lg py-2.5 px-7 bg-[#DAE5FF] group hover:bg-[#5C7CC7] hover:text-white">
                                <span class="material-symbols-outlined pr-2">person</span>Manage Account
                            </li>
                        </a>
                    </div>

                    <br><br><br><br><br><br><br><br><br><br><br> <!--Temporary-->
                    <div class="p-4">
                        <img src="img/bg1.jpg" class="w-full h-30 rounded" alt="">
                        <li class="flex align-center mb-2 mt-2 rounded-lg py-2.5 px-7 bg-[#DAE5FF] group hover:bg-[#5C7CC7] hover:text-white">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="flex align-center"><span class="material-symbols-outlined pr-2">logout</span>Logout</button>
                            </form>
                        </li>
                    </div>
                </div>
            </div>
        </ul>
    </div>
</aside>