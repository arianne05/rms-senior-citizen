<aside style="background-color:#f3b0c6" class="relative px-3.5">
    <div class="sticky top-0 overflow-hidden w-56 h-screen max-h-screen flex justify-center align-center h-full">
        <ul class="">
            <li class="font-bold flex align-center text-lg justify-center rounded-lg group pb-7 pt-5">
                <img src="{{asset('img/osca-logo.png')}}" class="w-20 h-20" alt="">
            </li>
           
            <div class="flex flex-col justify-between h-max">
                <div class="">
                    <a href="/dashboard">
                        <li class="flex align-center mb-2 mt-2 rounded-lg py-2.5 px-7 bg-[#f3b0c6] group hover:bg-[#82083C] hover:text-white">
                            <span class="material-symbols-outlined pr-2">grid_view</span>Dashboard
                        </li>
                    </a>     
                    @php
                    if(auth()->user()->position == 'Admin'){
                        $linkbrgy = '/barangay';
                     } else{
                        $user = auth()->user();
                        $assignbrgy = $user->assignbrgy;
                        $linkbrgy = '/view_barangay/'.$assignbrgy;
                     }
                    @endphp   
                    <a href="{{$linkbrgy}}">
                        <li class="flex align-center mb-2 mt-2 rounded-lg py-2.5 px-7 bg-[#f3b0c6] group hover:bg-[#82083C] hover:text-white">
                            <span class="material-symbols-outlined pr-2">holiday_village</span>Barangay
                        </li>
                    </a>
                </div>
                
                <hr>

                <div class="h-full" name='getspace'>
                    <div class="">
                        
                        @if(auth()->user()->position == 'Admin')
                        <a href="/citizen">
                            <li class="flex align-center mb-2 mt-2 rounded-lg py-2.5 px-7 bg-[#f3b0c6] group hover:bg-[#82083C] hover:text-white">
                                <span class="material-symbols-outlined pr-2">group</span>Citizen Report
                            </li>
                        </a>
                        @endif
    
                        <a href="/account">
                            <li class="flex align-center mb-2 mt-2 rounded-lg py-2.5 px-7 bg-[#f3b0c6] group hover:bg-[#82083C] hover:text-white">
                                <span class="material-symbols-outlined pr-2">person</span>Manage Account
                            </li>
                        </a>
                    </div>

                    <br><br><br><br><br><br><br><br><br><br><br> <!--Temporary-->
                    <div class="p-4">
                        <img src="{{asset('img/bg2.jpg')}}" class="w-full h-30 rounded" alt="">
                        <li class="flex align-center mb-2 mt-2 rounded-lg py-2.5 px-7 bg-[#f3b0c6] group hover:bg-[#82083C] hover:text-white">
                            <form action="/logout" id="logoutform" method="POST">
                                @csrf
                                <button type="submit" id="logoutbtn" class="flex align-center"><span class="material-symbols-outlined pr-2">logout</span>Logout</button>
                            </form>
                        </li>
                    </div>
                </div>
            </div>
        </ul>
    </div>
</aside>
<x-logout_msg />