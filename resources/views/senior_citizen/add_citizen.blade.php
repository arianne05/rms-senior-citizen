@include('partials.header')

<section class="flex">

    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        <div class="m-7">
            <h1 class="font-bold text-xl pl-4">Senior Citizen Registration</h1>
            <h1 class="pl-4">Provide all information of the senior citizen with <span class="text-red-500 font-bold">*</span></h1>

            <div class="flex">
                <div class="flex flex-col flex-auto w-96 p-4">
                    <h1>Basic Detail</h1>

                    <div class="flex gap-3">
                         {{-- Lastname --}}
                         <div class="flex flex-col w-full">
                            <label for="firstname" class="mb-2 mt-2 text-sm font-semibold">Lastname <span class="font-bold text-red-600">*</span></label>
                            <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                        {{-- Firstname --}}
                        <div class="flex flex-col w-full">
                            <label for="firstname" class="mb-2 mt-2 text-sm font-semibold">Firstname <span class="font-bold text-red-600">*</span></label>
                            <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                        {{-- Middlename --}}
                        <div class="flex flex-col w-full">
                            <label for="firstname" class="mb-2 mt-2 text-sm font-semibold">Middlename</label>
                            <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex gap-3">
                        {{-- Suffix --}}
                        <div class="flex flex-col w-full">
                            <label for="birthdate" class="mb-2 mt-2 text-sm font-semibold">Suffix</label>
                            <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                       {{-- Suffix --}}
                        <div class="flex flex-col w-full">
                            <label for="birthdate" class="mb-2 mt-2 text-sm font-semibold">Civil Status</label>
                            <select class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                                <option value="" disabled selected>Select Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                            </select>
                        </div>
                    </div>

                    {{-- Birthplace --}}
                    <div class="flex flex-col w-full">
                        <label for="firstname" class="mb-2 mt-2 text-sm font-semibold">Birthplace</label>
                        <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    <div class="flex gap-3">
                        {{-- Bdate --}}
                        <div class="flex flex-col w-full">
                            <label for="birthdate" class="mb-2 mt-2 text-sm font-semibold">Birthdate</label>
                            <input type="date" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                        {{-- Religion --}}
                        <div class="flex flex-col w-full">
                            <label for="religion" class="mb-2 mt-2 text-sm font-semibold">Religion</label>
                            <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                        {{-- Sex --}}
                        <div class="flex flex-col align-center w-full">
                            <label for="birthdate" class="mb-2 mt-2 text-sm font-semibold">Sex</label>
                            <div class="flex items-center space-x-4 py-2">
                                <input type="radio" id="male" name="sex" value="Male" class="text-sky-500 focus:ring-sky-500">
                                <label for="male">Male</label>

                                <input type="radio" id="female" name="sex" value="Female" class="text-pink-500 focus:ring-pink-500">
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>

                    <br><hr><br>

                    <h1>Complete Address</h1>

                    {{-- Unit/House Number --}}
                    <div class="flex flex-col w-full">
                        <label for="religion" class="mb-2 mt-2 text-sm font-semibold">Unit/House Number</label>
                        <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    <div class="flex gap-3">
                        {{-- Barangay --}}
                        <div class="flex flex-col w-full">
                            <label for="barangay" class="mb-2 mt-2 text-sm font-semibold">Barangay</label>
                            <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                         {{-- Municipality --}}
                         <div class="flex flex-col w-full">
                            <label for="municipality" class="mb-2 mt-2 text-sm font-semibold">Municipality</label>
                            <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex gap-3">
                        {{-- Province --}}
                        <div class="flex flex-col w-full">
                            <label for="province" class="mb-2 mt-2 text-sm font-semibold">Province</label>
                            <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                         {{-- Zip Code --}}
                         <div class="flex flex-col w-full">
                            <label for="zipcode" class="mb-2 mt-2 text-sm font-semibold">Zip Code</label>
                            <input type="number" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>
                    </div>

                    <br><hr><br>

                    <h1>Government Identification Card</h1>

                    {{-- GSIS --}}
                    <div class="flex flex-col w-full">
                        <label for="gsis" class="mb-2 mt-2 text-sm font-semibold">GSIS</label>
                        <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    {{-- Philhealth --}}
                    <div class="flex flex-col w-full">
                        <label for="philhealth" class="mb-2 mt-2 text-sm font-semibold">Philhealth</label>
                        <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    {{-- Tin --}}
                    <div class="flex flex-col w-full">
                        <label for="tin" class="mb-2 mt-2 text-sm font-semibold">Tin</label>
                        <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    {{-- SSS --}}
                    <div class="flex flex-col w-full">
                        <label for="sss" class="mb-2 mt-2 text-sm font-semibold">SSS</label>
                        <input type="text" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    
                    <div class="flex gap-3">
                        {{-- SSS --}}
                        <div class="flex flex-auto flex-col w-full">
                            <label for="status" class="mb-2 mt-2 text-sm font-semibold">Membership Status</label>
                            <div class="flex justify-evenly items-center space-x-2">
                                <input type="checkbox" id="checkbox1" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="checkbox1">Person w/ Disability (PWD)</label>
                            
                                <input type="checkbox" id="checkbox2" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="checkbox2">Pension</label>
                            
                                <input type="checkbox" id="checkbox2" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="checkbox2">Non-Pension</label>
                            </div>
                        </div>
                    </div>

                    <button class="font-medium text-slate-100 bg-sky-500 hover:bg-sky-700 rounded-xl py-2 mt-8">Add Record</button>

                </div>

                <div class="flex flex-auto justify-center p-4 bg-green-100">
                    <ul class="">
                        <li>Basic Detail</li>
                        <li>Complete Address</li>
                        <li>Government Identification Card</li>
                    </ul>
                </div>
                
            </div>

        </div>
    </div>

</section>

@include('partials.footer')
