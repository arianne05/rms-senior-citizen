@include('partials.header')
              <div class="w-screen h-screen" style="background-image: linear-gradient(to top, rgb(8, 66, 161), rgba(59, 130, 246, 0)), url('img/bg1.jpg'); background-size: cover; background-position: center;">
                
                <div class="flex">
                  {{-- Text Container --}}
                  <div class="w-1/2 h-screen p-20 flex flex-col justify-center items-center">
                    <div class="flex items-center justify-center">
                      <img src="img/profile1.jpg" class="rounded-full object-cover w-20 h-20 mr-5" alt="">
                      <div class="">
                        <div class="">
                          <h1 class="text-white text-lg font-semibold font-sans pb-1">Reynalyn Avilla</h1>
                          <p class="text-neutral-200">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga quae dolor in quam quod voluptatem facilis corporis recusandae nostrum optio.</p>  
                        </div>
                      </div>
                    </div>  

                    <br>
                    <div class="">
                      <h1 class="text-white text-5xl font-bold pb-5">Lorem ipsum dolor sit amet consectur.</h1>
                      <p class="text-neutral-100 text-2xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis repudiandae beatae labore quia. Aspernatur recusandae optio aliquid officiis cupiditate eveniet.</p>
                   </div>
                   
                   <div class="flex pt-5 w-full gap-3">
                    <input type="text" class="w-full mt-2 rounded-md pr-2 pl-6 pt-2 pb-2" value="" placeholder="yourname@email.com">
                    <a href="mailto:yourname@email.com" class="text-center p-2 w-40 mt-2 rounded-md text-white bg-teal-400 hover:bg-teal-600 active:bg-teal-700 focus:outline-none focus:ring focus:ring-teal-300">
                     Send
                    </a>
                   </div>
                  </div>

                  {{-- Login Container --}}
                  <div class="w-1/2 h-screen p-20 flex flex-col justify-center items-center">
                    <div class="w-full border-2 border-white-100 rounded-lg p-5 bg-white/50 backdrop-opacity-100">
                      <div class="p-10">
                        <img src="img/indang.png" class="block mx-auto w-40 h-40" alt="">
                        <h1 class="text-3xl text-slate font-bold mb-1 mt-2 flex justify-center">
                          Login Here
                        </h1>
                        <p class="flex justify-center text-slate">Office of the Senior Citizen Affair</p>

                        <form action="/process_signin" method="post">
                          @csrf
                          <label class="block">
                              <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Email</span>
                              <input type="email" name="email" class="peer mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="you@example.com"/>
                              <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                                  Please provide a valid email address.
                              </p>
                          </label>
      
                          <label class="block">
                              <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Password</span>
                              <input type="password" name="password" placeholder="Enter Password" class="peer mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"/>
                              <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                                  Please provide a valid email address.
                              </p>
                          </label>
      
                          <button type="submit" class="text-white bg-teal-400 hover:bg-teal-600 active:bg-teal-700 focus:outline-none focus:ring focus:ring-teal-300 p-2 w-full rounded-md mb-10">
                              Sign In
                          </button>
                        </form>
                      </div>
                    </div>
                </div>

                {{-- Credits/Copyright --}}
                <div class="fixed bottom-0 left-0 right-0 flex justify-center items-center">
                  <div class="flex flex-col items-center justify-center text-center">
                    <img src="img/cvsu-logo.png" class="w-10 h-10" alt="">
                    <p class="text-slate-400">@copyright by Avilla Reynalyn and Maribel Estaris</p>
                  </div>
                </div>                
                </div>
                

              </div>
@include('partials.footer')