@include('partials.header')

<section class="flex">

    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        <form action="/process_edit/{{$citizens->id}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        
       
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
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Lastname <span class="font-bold text-red-600">*</span></label>
                            <input type="text" name="lastname" value="{{$citizens->lastname}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                            @error('lastname')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror    
                        </div>

                        {{-- Firstname --}}
                        <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Firstname <span class="font-bold text-red-600">*</span></label>
                            <input type="text" name="firstname" value="{{$citizens->firstname}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                            @error('firstname')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror    
                        </div>

                        {{-- Middlename --}}
                        <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Middlename</label>
                            <input type="text" name="middlename" value="{{$citizens->middlename}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                            @error('middlename')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror    
                        </div>
                    </div>

                    <div class="flex gap-3">
                        {{-- Suffix --}}
                        <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Suffix</label>
                            <select name="suffix" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                                <option value="" disabled {{ $citizens->suffix == '' ? 'selected' : '' }}>Select Suffix</option>
                                <option value="Jr." {{ $citizens->suffix == 'Jr.' ? 'selected' : '' }}>Jr.</option>
                                <option value="Sr." {{ $citizens->suffix == 'Sr.' ? 'selected' : '' }}>Sr.</option>
                                <option value="I" {{ $citizens->suffix == 'I' ? 'selected' : '' }}>I</option>
                                <option value="II" {{ $citizens->suffix == 'II' ? 'selected' : '' }}>II</option>
                                <option value="III" {{ $citizens->suffix == 'III' ? 'selected' : '' }}>III</option>
                                <option value="IV" {{ $citizens->suffix == 'IV' ? 'selected' : '' }}>IV</option>
                                <option value="M.D" {{ $citizens->suffix == 'M.D' ? 'selected' : '' }}>M.D</option>
                            </select>
                            @error('suffix')
                                <p class="text-red-500 text-xs p-2">
                                    {{ $message }}
                                </p>
                            @enderror    
                        </div>
                        

                       {{-- Civil Status --}}
                        <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Civil Status</label>
                            <select name="civil_status" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                                <option value="" disabled {{ $citizens->civil_status == '' ? 'selected' : '' }}>Select Status</option>
                                <option value="Single" {{ $citizens->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ $citizens->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Separated" {{ $citizens->civil_status == 'Separated' ? 'selected' : '' }}>Separated</option>
                                <option value="Widowed" {{ $citizens->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                            </select>
                            @error('civil_status')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror    
                        </div>
                    </div>

                    {{-- Birthplace --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Birthplace</label>
                        <input type="text" name="birthplace" value="{{$citizens->birthplace}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        @error('birthplace')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror    
                    </div>

                    {{-- Contact --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Contact</label>
                        <input type="number" name="contact" value="{{$citizens->contact}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        @error('contact')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror    
                    </div>

                    <div class="flex gap-3">
                        {{-- Bdate --}}
                        <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Birthdate</label>
                            <input type="date" name="birthdate" value="{{$citizens->birthdate}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                            @error('birthdate')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror    
                        </div>

                        {{-- Religion --}}
                        <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Religion</label>
                            <input type="text" name="religion" value="{{$citizens->religion}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                            @error('religion')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror    
                        </div>

                        {{-- Sex --}}
                        <div class="flex flex-col align-center w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Sex</label>
                            <div class="flex items-center space-x-4 py-2">
                                <input type="radio" id="male" name="sex" value="Male" class="text-sky-500 focus:ring-sky-500" {{ $citizens->sex == 'Male' ? 'checked' : '' }}>
                                <label for="male">Male</label>
                            
                                <input type="radio" id="female" name="sex" value="Female" class="text-pink-500 focus:ring-pink-500" {{ $citizens->sex == 'Female' ? 'checked' : '' }}>
                                <label for="female">Female</label>
                            </div>
                            @error('sex')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror    
                        </div>
                    </div>

                    <br>
                    <h1 class="font-semibold text-l mb-2" id="section2">Complete Address</h1>
                    <hr class="mb-3">

                    {{-- Unit/House Number --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Unit/House Number</label>
                        <input type="text" name="house_number" value="{{$citizens->house_number}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        @error('house_number')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror    
                    </div>

                    <div class="flex gap-3">
                        {{-- Barangay --}}
                        <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Barangay</label>
                            <input type="text" name="barangay" value="{{$citizens->barangay}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                            @error('barangay')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror    
                        </div>

                         {{-- Municipality --}}
                         <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Municipality</label>
                            <input type="text" name="municipality" value="{{$citizens->municipality}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                            @error('municipality')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror   
                        </div>
                    </div>

                    <div class="flex gap-3">
                        {{-- Province --}}
                        <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Province</label>
                            <input type="text" name="province" value="{{$citizens->province}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                            @error('province')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror   
                        </div>

                         {{-- Zip Code --}}
                         <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Zip Code</label>
                            <input type="number" name="zipcode" value="{{$citizens->zipcode}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                            @error('zipcode')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror   
                        </div>
                    </div>

                   
                    <br>
                    <h1 class="font-semibold text-l mb-2" id="section3">Government Identification Card</h1>
                    <hr class="mb-3">

                    {{-- GSIS --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">GSIS</label>
                        <input type="text" name="gsis" value="{{$citizens->gsis}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        @error('gsis')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror   
                    </div>

                    {{-- Philhealth --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Philhealth</label>
                        <input type="text" name="philhealth" value="{{$citizens->philhealth}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        @error('philhealth')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror   
                    </div>

                    {{-- Tin --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Tin</label>
                        <input type="text" name="tin" value="{{$citizens->tin}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        @error('tin')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror   
                    </div>

                    {{-- SSS --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">SSS</label>
                        <input type="text" name="sss" value="{{$citizens->sss}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        @error('sss')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror   
                    </div>

                    <br>
                    <h1 class="font-semibold text-l mb-2" id="section3">Beneficiaries Detail</h1>
                    <hr class="mb-3">

                    {{-- Beneficiary --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Beneficiaries</label>
                        <input type="text" name="beneficiary" value="{{$citizens->beneficiary}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        @error('beneficiary')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    {{-- Contact Beneficiary --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Beneficiaries Contact</label>
                        <input type="number" name="contact_beneficiary" value="{{$citizens->contact_beneficiary}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        @error('contact_beneficiary')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror
                    </div>


                </div>
            </div>
            
            {{-- Left Section --}}
            <div class="flex flex-auto overflow-hidden sticky top 0 justify-center">
                <div class="fixed top 0 p-8 border-solid border-2 border-gray-100 rounded-lg overflow-hidden">
                    <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Upload Image</label>
                    <div class="flex items-center space-x-6 mt-2">
                        @php $default_img="https://api.dicebear.com/7.x/initials/svg?seed=Upload Image" @endphp
                        <div class="shrink-0">
                            <img class="h-16 w-16 object-cover rounded-full" src="{{ $citizens->senior_img ? asset("storage/citizen_profile/thumbnail/".$citizens->senior_img): $default_img }}" alt="avatar" />
                        </div>
                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" name="senior_img" value="{{$citizens->senior_img}}" class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100
                            "/>
                            @error('senior_img')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror
                        </label>
                    </div>
                    <br>

                    {{-- Status --}}
                    <div class="flex flex-col align-center ml-2 w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Membership Status</label>
                        <div class="flex flex-col">
                            <div class="flex items-center space-x-2">
                                <input type="radio" name="status_membership" value="Person w/ Disability" class="text-sky-500 focus:ring-sky-500" {{ $citizens->status_membership == 'Person w/ Disability' ? 'checked' : '' }}>
                                <label>Person w/ Disability (PWD)</label>
                            </div>
                        
                            <div class="flex items-center space-x-2">
                                <input type="radio" name="status_membership" value="Pension" class="text-pink-500 focus:ring-pink-500" {{ $citizens->status_membership == 'Pension' ? 'checked' : '' }}>
                                <label>Pension</label>
                            </div>
                        
                            <div class="flex items-center space-x-2">
                                <input type="radio" name="status_membership" value="Non-Pension" class="text-pink-500 focus:ring-pink-500" {{ $citizens->status_membership == 'Non-Pension' ? 'checked' : '' }}>
                                <label>Non-Pension</label>
                            </div>
                        </div>
                        
                        @error('status_membership')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                      
                    <br>
                    <label class="ml-2 mb-2 mt-2 text-sm font-regular text-gray-500">Navigation Pane</label>
                    <ul class="ml-2 mt-2">
                        <a href="#section1"><li class="hover:text-green-700">Personal Information</li></a>
                        <a href="#section2"><li class="hover:text-green-700">Complete Address</li></a>
                        <a href="#section3"><li class="hover:text-green-700">Government Identification Card</li></a>
                    </ul>

                    <br>
                    <div class="flex flex-auto justify-center gap-4 w-full p-4">
                        <a href="/dashboard" class="font-medium text-red-700 bg-red-200 hover:bg-red-700 hover:text-white rounded-xl py-2 px-9">Cancel</a>
                        <button type="submit" class="font-medium text-slate-100 bg-green-700 hover:bg-green-500 rounded-xl py-2 px-5">Update Record</button>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </form>
        

    </div>

</section>

{{-- Component --}}
<x-message />

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
