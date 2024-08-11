@include('partials.header')

<section class="flex">

    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        <form action="/process_edit/{{$citizens->id}}" method="POST" id="myForm" enctype="multipart/form-data">
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
                            <input type="text" name="lastname" value="{{$citizens->lastname}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm uppercase">
                            @error('lastname')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror    
                        </div>

                        {{-- Firstname --}}
                        <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Firstname <span class="font-bold text-red-600">*</span></label>
                            <input type="text" name="firstname" value="{{$citizens->firstname}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm uppercase">
                            @error('firstname')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror    
                        </div>

                        {{-- Middlename --}}
                        <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Middlename</label>
                            <input type="text" name="middlename" value="{{$citizens->middlename}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm uppercase">
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
                                <option value="" {{ $citizens->suffix == '' ? 'selected' : '' }}>Select Suffix</option>
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
                        <input type="text" name="birthplace" value="{{$citizens->birthplace}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm uppercase">
                        @error('birthplace')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror    
                    </div>

                    {{-- Contact --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Contact</label>
                        <input type="text" name="contact" id="formattedContact" placeholder="09XX-XXX-XXXX" value="{{$citizens->contact}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        @error('contact')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror  
                        
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const inputField = document.getElementById('formattedContact');
                            
                                inputField.addEventListener('input', function() {
                                    let value = this.value.replace(/\D/g, ''); // Remove non-digit characters
                                    if (value.length > 11) {
                                        value = value.substring(0, 11); // Limit to 11 characters (0939-393-3935)
                                    }
                                    if (value.length > 4 && value.length <= 7) {
                                        value = value.slice(0, 4) + '-' + value.slice(4); // Add first dash (0939-)
                                    } else if (value.length > 7) {
                                        value = value.slice(0, 4) + '-' + value.slice(4, 7) + '-' + value.slice(7); // Add second dash (0939-393-)
                                    }
                                    this.value = value;
                                });
                            });
                        </script>
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
                            <select name="religion" id="religion" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                                <option value="" {{ old('religion', $citizens->religion) == '' ? 'selected' : '' }}>Select Religion</option>
                                <option value="Christian" {{ old('religion', $citizens->religion) == 'Christian' ? 'selected' : '' }}>Christian</option>
                                <option value="INC" {{ old('religion', $citizens->religion) == 'INC' ? 'selected' : '' }}>INC</option>
                                <option value="Muslim" {{ old('religion', $citizens->religion) == 'Muslim' ? 'selected' : '' }}>Muslim</option>
                                <option value="Roman Catholic" {{ old('religion', $citizens->religion) == 'Roman Catholic' ? 'selected' : '' }}>Roman Catholic</option>
                                <option value="Other" {{ !in_array(old('religion', $citizens->religion), ['Christian', 'INC', 'Muslim', 'Roman Catholic']) ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('religion')
                                <p class="text-red-500 text-xs p-2">
                                    {{ $message }}
                                </p>
                            @enderror    
                        </div>

                        <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Other Religion</label>
                            <input type="text" name="other_religion" value="{{ in_array(old('religion', $citizens->religion), ['Christian', 'INC', 'Muslim', 'Roman Catholic']) ? '' : old('other_religion', $citizens->religion) }}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm uppercase">
                            @error('other_religion')
                                <p class="text-red-500 text-xs p-2">
                                    {{ $message }}
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
                        <input type="text" name="house_number" value="{{$citizens->house_number}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm uppercase">
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
                            {{-- <input type="text" name="barangay" value="{{$citizens->barangay}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"> --}}
                            
                            <select name="barangay" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                                <option value="" disabled {{ $citizens->barangay == '' ? 'selected' : '' }}>Select Barangay</option>
                                <option value="Agus-Os" {{ $citizens->barangay == 'Agus-Os' ? 'selected' : '' }}>Agus-Os</option>
                                <option value="Alulod" {{ $citizens->barangay == 'Alulod' ? 'selected' : '' }}>Alulod</option>
                                <option value="Banaba Cerca" {{ $citizens->barangay == 'Banaba Cerca' ? 'selected' : '' }}>Banaba Cerca</option>
                                <option value="Banaba Lejos" {{ $citizens->barangay == 'Banaba Lejos' ? 'selected' : '' }}>Banaba Lejos</option>
                                <option value="Bancod" {{ $citizens->barangay == 'Bancod' ? 'selected' : '' }}>Bancod</option>
                                <option value="Buna Cerca" {{ $citizens->barangay == 'Buna Cerca' ? 'selected' : '' }}>Buna Cerca</option>
                                <option value="Buna Lejos 1" {{ $citizens->barangay == 'Buna Lejos 1' ? 'selected' : '' }}>Buna Lejos 1</option>
                                <option value="Buna Lejos 2" {{ $citizens->barangay == 'Buna Lejos 2' ? 'selected' : '' }}>Buna Lejos 2</option>
                                <option value="Calumpang Cerca" {{ $citizens->barangay == 'Calumpang Cerca' ? 'selected' : '' }}>Calumpang Cerca</option>
                                <option value="Calumpang Lejos" {{ $citizens->barangay == 'Calumpang Lejos' ? 'selected' : '' }}>Calumpang Lejos</option>
                                <option value="Carasuchi" {{ $citizens->barangay == 'Carasuchi' ? 'selected' : '' }}>Carasuchi</option>
                                <option value="Daine 1" {{ $citizens->barangay == 'Daine 1' ? 'selected' : '' }}>Daine 1</option>
                                <option value="Daine 2" {{ $citizens->barangay == 'Daine 2' ? 'selected' : '' }}>Daine 2</option>
                                <option value="Guyam Malaki" {{ $citizens->barangay == 'Guyam Malaki' ? 'selected' : '' }}>Guyam Malaki</option>
                                <option value="Guyam Munti" {{ $citizens->barangay == 'Guyam Munti' ? 'selected' : '' }}>Guyam Munti</option>
                                <option value="Harasan" {{ $citizens->barangay == 'Harasan' ? 'selected' : '' }}>Harasan</option>
                                <option value="Kayquit 1" {{ $citizens->barangay == 'Kayquit 1' ? 'selected' : '' }}>Kayquit 1</option>
                                <option value="Kayquit 2" {{ $citizens->barangay == 'Kayquit 2' ? 'selected' : '' }}>Kayquit 2</option>
                                <option value="Kayquit 3" {{ $citizens->barangay == 'Kayquit 3' ? 'selected' : '' }}>Kayquit 3</option>
                                <option value="Kaytambog" {{ $citizens->barangay == 'Kaytambog' ? 'selected' : '' }}>Kaytambog</option>
                                <option value="Kaytapos" {{ $citizens->barangay == 'Kaytapos' ? 'selected' : '' }}>Kaytapos</option>
                                <option value="Limbon" {{ $citizens->barangay == 'Limbon' ? 'selected' : '' }}>Limbon</option>
                                <option value="Lumampong Balagbag" {{ $citizens->barangay == 'Lumampong Balagbag' ? 'selected' : '' }}>Lumampong Balagbag</option>
                                <option value="Lumampong Halayhay" {{ $citizens->barangay == 'Lumampong Halayhay' ? 'selected' : '' }}>Lumampong Halayhay</option>
                                <option value="Mahabang Kahoy Cerca" {{ $citizens->barangay == 'Mahabang Kahoy Cerca' ? 'selected' : '' }}>Mahabang Kahoy Cerca</option>
                                <option value="Mahabang Kahoy Lejos" {{ $citizens->barangay == 'Mahabang Kahoy Lejos' ? 'selected' : '' }}>Mahabang Kahoy Lejos</option>
                                <option value="Mataas Na Lupa" {{ $citizens->barangay == 'Mataas Na Lupa' ? 'selected' : '' }}>Mataas Na Lupa</option>
                                <option value="Poblacion 1" {{ $citizens->barangay == 'Poblacion 1' ? 'selected' : '' }}>Poblacion 1</option>
                                <option value="Poblacion 2" {{ $citizens->barangay == 'Poblacion 2' ? 'selected' : '' }}>Poblacion 2</option>
                                <option value="Poblacion 3" {{ $citizens->barangay == 'Poblacion 3' ? 'selected' : '' }}>Poblacion 3</option>
                                <option value="Poblacion 4" {{ $citizens->barangay == 'Poblacion 4' ? 'selected' : '' }}>Poblacion 4</option>
                                <option value="Pulo" {{ $citizens->barangay == 'Pulo' ? 'selected' : '' }}>Pulo</option>
                                <option value="Tambo Balagbag" {{ $citizens->barangay == 'Tambo Balagbag' ? 'selected' : '' }}>Tambo Balagbag</option>
                                <option value="Tambo Ilaya" {{ $citizens->barangay == 'Tambo Ilaya' ? 'selected' : '' }}>Tambo Ilaya</option>
                                <option value="Tambo Malaki" {{ $citizens->barangay == 'Tambo Malaki' ? 'selected' : '' }}>Tambo Malaki</option>
                                <option value="Tambo Munti Kulit" {{ $citizens->barangay == 'Tambo Munti Kulit' ? 'selected' : '' }}>Tambo Munti Kulit</option>
                            </select>
                            @error('barangay')
                                <p class="text-red-500 text-xs p-2">
                                    {{$message}}
                                </p>
                            @enderror    
                        </div>

                         {{-- Municipality --}}
                         <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Municipality</label>
                            <input type="text" name="municipality" value="Indang" readonly class="w-auto bg-gray-300  border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex gap-3">
                        {{-- Province --}}
                        <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Province</label>
                            <input type="text" name="province" value="Cavite" readonly class="w-auto bg-gray-300  border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>

                         {{-- Zip Code --}}
                         <div class="flex flex-col w-full">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Zip Code</label>
                            <input type="number" name="zipcode" value="4122" readonly class="w-auto bg-gray-300  border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                        </div>
                    </div>

                   
                    <br>
                    <h1 class="font-semibold text-l mb-2" id="section3">Government Identification Card</h1>
                    <hr class="mb-3">

                    {{-- GSIS --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">GSIS</label>
                        <input type="text" name="gsis" id="formattedGSIS" placeholder="XXXX-XXXX" value="{{$citizens->gsis}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm uppercase">
                        @error('gsis')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror   

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const inputField = document.getElementById('formattedGSIS');
    
                                inputField.addEventListener('input', function() {
                                    let value = this.value.replace(/\D/g, ''); // Remove non-digit characters
                                    if (value.length > 8) {
                                        value = value.substring(0, 8); // Limit to 8 characters (XXXX-XXXX)
                                    }
                                    if (value.length > 4) {
                                        value = value.slice(0, 4) + '-' + value.slice(4); // Add a dash after the first 4 characters
                                    }
                                    this.value = value;
                                });
                            });
                            </script>
                    </div>

                    {{-- Philhealth --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Philhealth</label>
                        <input type="text" name="philhealth" id="formattedPhil" placeholder="XX-XXXXXXXXX-X" value="{{$citizens->philhealth}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm uppercase">
                        @error('philhealth')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror   

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const inputField = document.getElementById('formattedPhil');
                            
                                inputField.addEventListener('input', function() {
                                    let value = this.value.replace(/\D/g, ''); // Remove non-digit characters
                                    if (value.length > 13) {
                                        value = value.substring(0, 12); // Limit to 14 characters (44-445555555-5)
                                    }
                                    if (value.length > 2 && value.length <= 12) {
                                        value = value.slice(0, 2) + '-' + value.slice(2); // Add first dash (44-)
                                    } else if (value.length > 12) {
                                        value = value.slice(0, 2) + '-' + value.slice(2, 12) + '-' + value.slice(12); // Add second dash (44-445555555-)
                                    }
                                    this.value = value;
                                });
                            });
                        </script>
                    </div>

                    {{-- Tin --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Tin</label>
                        <input type="text" name="tin" id="formattedTin" placeholder="XXX-XXX-XXX-XXXXX" value="{{$citizens->tin}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm uppercase">
                        @error('tin')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror   

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const inputField = document.getElementById('formattedTin');
                            
                                inputField.addEventListener('input', function() {
                                    let value = this.value.replace(/\D/g, ''); // Remove non-digit characters
                                    if (value.length > 14) {
                                        value = value.substring(0, 13); // Limit to 15 characters (645-333-345-00000)
                                    }
                                    if (value.length > 3 && value.length <= 6) {
                                        value = value.slice(0, 3) + '-' + value.slice(3); // Add first dash (645-)
                                    } else if (value.length > 6 && value.length <= 9) {
                                        value = value.slice(0, 3) + '-' + value.slice(3, 6) + '-' + value.slice(6); // Add second dash (645-333-)
                                    } else if (value.length > 9 && value.length <= 15) {
                                        value = value.slice(0, 3) + '-' + value.slice(3, 6) + '-' + value.slice(6, 9) + '-' + value.slice(9); // Add third dash (645-333-345-)
                                    }
                                    this.value = value;
                                });
                            });
                        </script>
                    </div>

                    {{-- SSS --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">SSS</label>
                        <input type="text" name="sss" id="formattedSSS" placeholder="XX-XXXXXX-X" value="{{$citizens->sss}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm uppercase">
                        @error('sss')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror   

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const inputField = document.getElementById('formattedSSS');
                            
                                inputField.addEventListener('input', function() {
                                    let value = this.value.replace(/\D/g, ''); // Remove non-digit characters
                                    if (value.length > 10) {
                                        value = value.substring(0, 10); // Limit to 12 characters (34-3456543-9)
                                    }
                                    if (value.length > 2 && value.length <= 4) {
                                        value = value.slice(0, 2) + '-' + value.slice(2); // Add first dash (34-)
                                    } else if (value.length > 4 && value.length <= 11) {
                                        value = value.slice(0, 2) + '-' + value.slice(2, 9) + '-' + value.slice(9); // Add second dash (34-3456543-)
                                    }
                                    this.value = value;
                                });
                            });
                        </script>
                    </div>

                    <br>
                    <h1 class="font-semibold text-l mb-2" id="section3">Beneficiaries Detail</h1>
                    <hr class="mb-3">

                    {{-- Beneficiary --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Beneficiaries</label>
                        <input type="text" name="beneficiary" value="{{$citizens->beneficiary}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm uppercase">
                        @error('beneficiary')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    {{-- Contact Beneficiary --}}
                    <div class="flex flex-col w-full">
                        <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Beneficiaries Contact</label>
                        <input type="text" name="contact_beneficiary" id="formattedBContact" placeholder="09XX-XXX-XXXX" value="{{$citizens->contact_beneficiary}}" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm uppercase">
                        @error('contact_beneficiary')
                            <p class="text-red-500 text-xs p-2">
                                {{$message}}
                            </p>
                        @enderror

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const inputField = document.getElementById('formattedBContact');
                            
                                inputField.addEventListener('input', function() {
                                    let value = this.value.replace(/\D/g, ''); // Remove non-digit characters
                                    if (value.length > 11) {
                                        value = value.substring(0, 11); // Limit to 11 characters (0939-393-3935)
                                    }
                                    if (value.length > 4 && value.length <= 7) {
                                        value = value.slice(0, 4) + '-' + value.slice(4); // Add first dash (0939-)
                                    } else if (value.length > 7) {
                                        value = value.slice(0, 4) + '-' + value.slice(4, 7) + '-' + value.slice(7); // Add second dash (0939-393-)
                                    }
                                    this.value = value;
                                });
                            });
                        </script>
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
                                <input type="radio" name="status_membership" value="PWD" class="text-sky-500 focus:ring-sky-500" {{ $citizens->status_membership == 'PWD' ? 'checked' : '' }}>
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
                        <button type="submit" id="saveChangesBtn" class="font-medium text-slate-100 bg-green-700 hover:bg-green-500 rounded-xl py-2 px-5">Update Record</button>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </form>
        

    </div>

</section>

{{-- Component --}}
<x-message />
<x-save_message />

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
