@include('partials.header')

<section class="flex">

    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        <div class="flex m-7 gap-2">
            <div class="flex">
                <div class="flex flex-col flex-auto w-full p-4">
                    <h1 class="font-bold text-xl" id="section1">Senior Citizen Registration</h1>
                    <h1 class="mb-4">Provide all information of the senior citizen with <span class="text-red-500 font-bold">*</span></h1>
                    
                    <br>
                    <h1 class="font-semibold text-l mb-2">Personal Information</h1>
                    <hr class="mb-3">

                    <div class="flex gap-3">
                         {{-- Lastname --}}
                         <div class="flex flex-col w-full">
                            <label for="lastname" class="mb-2 mt-2 text-sm font-regular text-gray-500">Lastname <span class="font-bold text-red-600">*</span></label>
                            <input type="text" name="lastname" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                        {{-- Firstname --}}
                        <div class="flex flex-col w-full">
                            <label for="firstname" class="mb-2 mt-2 text-sm font-regular text-gray-500">Firstname <span class="font-bold text-red-600">*</span></label>
                            <input type="text" name="firstname" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                        {{-- Middlename --}}
                        <div class="flex flex-col w-full">
                            <label for="middlename" class="mb-2 mt-2 text-sm font-regular text-gray-500">Middlename</label>
                            <input type="text" name="middlename" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex gap-3">
                        {{-- Suffix --}}
                        <div class="flex flex-col w-full">
                            <label for="suffix" class="mb-2 mt-2 text-sm font-regular text-gray-500">Suffix</label>
                            <select name="suffix" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                                <option value="" disabled selected>Select Suffix</option>
                                <option value="Jr.">Jr.</option>
                                <option value="Sr.">Sr.</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="IV">M.D</option>
                            </select>
                        </div>

                       {{-- Civil Status --}}
                        <div class="flex flex-col w-full">
                            <label for="civil_status" class="mb-2 mt-2 text-sm font-regular text-gray-500">Civil Status</label>
                            <select name="civil_status" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                                <option value="" disabled selected>Select Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>
                    </div>

                    {{-- Birthplace --}}
                    <div class="flex flex-col w-full">
                        <label for="birthplace" class="mb-2 mt-2 text-sm font-regular text-gray-500">Birthplace</label>
                        <input type="text" name="birthplace" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    {{-- Contact --}}
                    <div class="flex flex-col w-full">
                        <label for="contact" class="mb-2 mt-2 text-sm font-regular text-gray-500">Contact</label>
                        <input type="number" name="contact" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    <div class="flex gap-3">
                        {{-- Bdate --}}
                        <div class="flex flex-col w-full">
                            <label for="birthdate" class="mb-2 mt-2 text-sm font-regular text-gray-500">Birthdate</label>
                            <input type="date" name="birthdate" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                        {{-- Religion --}}
                        <div class="flex flex-col w-full">
                            <label for="religion" class="mb-2 mt-2 text-sm font-regular text-gray-500">Religion</label>
                            <input type="text" name="religion" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                        {{-- Sex --}}
                        <div class="flex flex-col align-center w-full">
                            <label for="sex" class="mb-2 mt-2 text-sm font-regular text-gray-500">Sex</label>
                            <div class="flex items-center space-x-4 py-2">
                                <input type="radio" id="male" name="sex" value="Male" class="text-sky-500 focus:ring-sky-500">
                                <label for="male">Male</label>

                                <input type="radio" id="female" name="sex" value="Female" class="text-pink-500 focus:ring-pink-500">
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>

                    <br>
                    <h1 class="font-semibold text-l mb-2" id="section2">Complete Address</h1>
                    <hr class="mb-3">

                    {{-- Unit/House Number --}}
                    <div class="flex flex-col w-full">
                        <label for="house_number" class="mb-2 mt-2 text-sm font-regular text-gray-500">Unit/House Number</label>
                        <input type="text" name="house_number" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    <div class="flex gap-3">
                        {{-- Barangay --}}
                        <div class="flex flex-col w-full">
                            <label for="barangay" class="mb-2 mt-2 text-sm font-regular text-gray-500">Barangay</label>
                            <input type="text" name="barangay" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                         {{-- Municipality --}}
                         <div class="flex flex-col w-full">
                            <label for="municipality" class="mb-2 mt-2 text-sm font-regular text-gray-500">Municipality</label>
                            <input type="text" name="municipality" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex gap-3">
                        {{-- Province --}}
                        <div class="flex flex-col w-full">
                            <label for="province" class="mb-2 mt-2 text-sm font-regular text-gray-500">Province</label>
                            <input type="text" name="province" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                         {{-- Zip Code --}}
                         <div class="flex flex-col w-full">
                            <label for="zipcode" class="mb-2 mt-2 text-sm font-regular text-gray-500">Zip Code</label>
                            <input type="number" name="zipcode" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>
                    </div>

                   
                    <br>
                    <h1 class="font-semibold text-l mb-2" id="section3">Government Identification Card</h1>
                    <hr class="mb-3">

                    {{-- GSIS --}}
                    <div class="flex flex-col w-full">
                        <label for="gsis" class="mb-2 mt-2 text-sm font-regular text-gray-500">GSIS</label>
                        <input type="text" name="gsis" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    {{-- Philhealth --}}
                    <div class="flex flex-col w-full">
                        <label for="philhealth" class="mb-2 mt-2 text-sm font-regular text-gray-500">Philhealth</label>
                        <input type="text" name="philhealth" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    {{-- Tin --}}
                    <div class="flex flex-col w-full">
                        <label for="tin" class="mb-2 mt-2 text-sm font-regular text-gray-500">Tin</label>
                        <input type="text" name="tin" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    {{-- SSS --}}
                    <div class="flex flex-col w-full">
                        <label for="sss" class="mb-2 mt-2 text-sm font-regular text-gray-500">SSS</label>
                        <input type="text" name="sss" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    <br>
                    <h1 class="font-semibold text-l mb-2" id="section3">Beneficiaries Detail</h1>
                    <hr class="mb-3">

                    {{-- Beneficiary --}}
                    <div class="flex flex-col w-full">
                        <label for="beneficiary" class="mb-2 mt-2 text-sm font-regular text-gray-500">Beneficiaries</label>
                        <input type="text" name="beneficiary" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>

                    {{-- Contact Beneficiary --}}
                    <div class="flex flex-col w-full">
                        <label for="contact_beneficiary" class="mb-2 mt-2 text-sm font-regular text-gray-500">Beneficiaries Contact</label>
                        <input type="number" name="contact_beneficiary" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </div>


                </div>
            </div>
            
            {{-- Left Section --}}
            <div class="flex flex-auto overflow-hidden sticky top 0 justify-center">
                <div class="fixed top 0 p-8 border-solid border-2 border-gray-100 rounded-lg overflow-hidden">
                    <form class="flex items-center space-x-6">
                        <div class="shrink-0">
                            <img class="h-16 w-16 object-cover rounded-full" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80" alt="Current profile photo" />
                        </div>
                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100
                            "/>
                        </label>
                    </form>
                    <br>

                    {{-- Status --}}
                    <div class="flex flex-col align-center ml-2 w-full">
                        <label for="sex" class="mb-2 mt-2 text-sm font-regular text-gray-500">Membership Status</label>
                        <div class="flex flex-col">
                            <div class="flex items-center space-x-2">
                                <input type="radio" name="status_membership" value="Person w/ Disability" class="text-sky-500 focus:ring-sky-500">
                                <label for="status_membership">Person w/ Disability (PWD)</label>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <input type="radio" name="status_membership" value="Pension" class="text-pink-500 focus:ring-pink-500">
                                <label for="status_membership">Pension</label>
                            </div>

                            <div class="flex items-center space-x-2">
                                <input type="radio" name="status_membership" value="Non-Pension" class="text-pink-500 focus:ring-pink-500">
                                <label for="status_membership">Non-Pension</label>
                            </div>
                        </div>
                    </div>
                      
                    <br>
                    <label for="sex" class="ml-2 mb-2 mt-2 text-sm font-regular text-gray-500">Navigation Pane</label>
                    <ul class="ml-2 mt-2">
                        <a href="#section1"><li class="hover:text-green-700">Personal Information</li></a>
                        <a href="#section2"><li class="hover:text-green-700">Complete Address</li></a>
                        <a href="#section3"><li class="hover:text-green-700">Government Identification Card</li></a>
                    </ul>

                    <br>
                    <div class="flex flex-auto justify-center gap-4 w-full p-4">
                        <button class="font-medium text-red-700 bg-red-200 hover:bg-red-700 hover:text-white rounded-xl py-2 px-9">Cancel</button>
                        <button class="font-medium text-slate-100 bg-green-700 hover:bg-green-500 rounded-xl py-2 px-5">Add Record</button>
                    </div>
                    
                </div>
            </div>
            

        </div>

        

    </div>

</section>

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

@include('partials.footer')
