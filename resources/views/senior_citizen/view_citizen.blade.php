@include('partials.header')

<section class="flex">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        {{-- Main Section --}}
        <div class="container w-full h-auto p-10">
            <div class="container flex justify-evenly border-2 border-solid border-gray-100 rounded-lg">
                <div class="bg-green-100 p-10 flex flex-col justify-center text-center align-center w-1/3">
                    @php $default_img="https://api.dicebear.com/7.x/initials/svg?seed=Upload Image" @endphp
                    <div class="shrink-0 flex justify-center">
                        <img class="h-52 w-52 object-cover rounded-full" src="{{ $citizens->senior_img ? asset("storage/citizen_profile/".$citizens->senior_img): $default_img }}" alt="avatar" />
                    </div>
                    <h1 class="text-xl font-semibold">{{$citizens->firstname.' '.$citizens->lastname}}</h1>
                    <p class="text-sm font-regular">Senior ID: {{$citizens->id}}</p>

                    <div class="flex justify-center mt-10 gap-x-2">
                        <a href="/edit_citizen/{{$citizens->id}}" class="font-medium text-slate-100 bg-green-700 hover:bg-green-500 rounded-xl py-2 px-5">Update</a>
                        @if(auth()->user()->position == 'Admin')
                            <a href="/delete_citizen/{{$citizens->id}}" id="delete_confirmation" class="font-medium text-red-700 bg-red-200 hover:bg-red-700 hover:text-white rounded-xl py-2 px-9">Delete</a>
                        @endif
                    </div>
                </div>

                <div class="w-3/4 p-10">
                    <h1 class="font-semibold text-l mb-2" id="section3">Personal Detail</h1>
                    <hr class="mb-3">

                    <div class="flex w-full justify-evenly">
                        <div class="w-1/2">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Firstname</label>
                            <p class="mb-2">{{$citizens->firstname}}</p>

                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Lastname</label>
                            <p class="mb-2">{{$citizens->lastname}}</p>

                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Middlename</label>
                            <p class="mb-2">{{$citizens->middlename}}</p>

                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Suffix</label>
                            <p class="mb-2">{{$citizens->suffix}}</p>
                        </div>
                        <div class="w-1/2">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Birthdate</label>
                            <p class="mb-2">{{$citizens->birthdate}}</p>

                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Civil Status</label>
                            <p class="mb-2">{{$citizens->civil_status}}</p>

                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Religion</label>
                            <p class="mb-2">{{$citizens->religion}}</p>

                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Sex</label>
                            <p class="mb-2">{{$citizens->sex}}</p>
                        </div>
                        <div class="w-1/2">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Age</label>
                            <p class="mb-2">{{\Carbon\Carbon::parse($citizens->birthdate)->age}}</p>

                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Classification</label>
                            <p class="mb-2">
                                @php
                                    $age = \Carbon\Carbon::parse($citizens->birthdate)->age;
                                    if ($age >= 100) {
                                        echo 'Centenarian';
                                    } elseif ($age >= 90) {
                                        echo 'Nonagenarian';
                                    } elseif ($age >= 80) {
                                        echo 'Octogenarian';
                                    } else {
                                        echo 'NA';
                                    }
                                @endphp
                            </p>

                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Contact Number</label>
                            <p class="mb-2">{{$citizens->contact}}</p>
                        </div>
                    </div>
                    
                    <br>
                    <h1 class="font-semibold text-l mb-2" id="section3">Complete Address</h1>
                    <hr class="mb-3">

                    <div class="flex justify-evenly w-full mb-2">
                        <div class="w-1/2 text-start">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">House Number</label>
                            <p>{{$citizens->house_number}}</p>
                        </div>
                        <div class="w-1/2">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Barangay</label>
                            <p>{{$citizens->barangay}}</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Municipality</label>
                            <p>{{$citizens->municipality}}</p>
                        </div>
                        
                        <div class="w-1/2">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Province</label>
                            <p>{{$citizens->province}}</p>
                        </div>

                        <div class="w-1/2">
                            <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Zipcode</label>
                            <p>{{$citizens->zipcode}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <h1 class="font-semibold text-l mb-2" id="section3">Documentation Detail</h1>
            <div class="container flex border-2 border-solid border-gray-100 rounded-lg mt-6 p-10">
                <div class="w-1/2">
                    <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Government Service Insurance System (GSIS)</label>
                    <p class="mb-2">{{$citizens->gsis}}</p>

                    <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Philippine Health ID (Philhealth)</label>
                    <p class="mb-2">{{$citizens->philhealth}}</p>

                    <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Taxpayer Identification Number (TIN) </label>
                    <p class="mb-2">{{$citizens->tin}}</p>

                    <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Social Security System (SSS) </label>
                    <p class="mb-2">{{$citizens->sss}}</p>
                </div>
                
                <div class="w-1/2">
                    <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Beneficiary</label>
                    <p class="mb-2">{{$citizens->beneficiary}}</p>

                    <label class="mb-2 mt-2 text-sm font-regular text-gray-500">Contact Beneficiary</label>
                    <p class="mb-2">{{$citizens->contact_beneficiary}}</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Components --}}
<x-delete_message />

@include('partials.footer')