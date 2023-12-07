@include('partials.header')
            <div class="min-h-screen flex items-center justify-center">
                <div class="container rounded-md h-auto p-8 max-w-md h-40 border-solid border-2 border-gray-100 flex flex-col">
                  <h1 class="text-3xl font-bold mb-5 flex justify-center">
                    Add New Account
                  </h1>

                  <form action="/register" method="post">
                    @csrf
                    <label class="block mb-5">
                        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Name</span>
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

                    <button type="submit" class="text-white bg-sky-700 hover:bg-sky-600 active:bg-sky-700 focus:outline-none focus:ring focus:ring-sky-300 p-1.5 w-full rounded">
                        Add User
                    </button>
                  </form>

                </div>
              </div>

@include('partials.footer')