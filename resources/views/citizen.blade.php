@include('partials.header')

<section class="flex">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        {{-- Main Section --}}
        <div class="container w-full h-auto p-10">
            @if(auth()->user()->position == 'Admin')
                <div class="flex justify-end">
                    <div class="flex flex-col">
                        <label>Save As</label>
                        <div class="mt-4 flex gap-x-3">    
                            <div class="">
                                <form action="/downloadpdf" method="POST">
                                    @csrf
                                    <button type="submit" class="font-medium text-slate-100 bg-red-700 hover:bg-red-500 rounded-xl p-3 px-12">PDF</button>
                                </form>
                            </div>

                            <div class="">
                                <form action="/exportExcel" method="POST">
                                    @csrf
                                    <button type="submit" class="font-medium text-slate-100 bg-green-700 hover:bg-green-500 rounded-xl p-3 px-12">Excel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Card Report --}}
            <div class="flex justify-between gap-x-2 mb-8 mt-8">
                <form action="/viewpdf/{{'total'}}" method="POST" target="__blank" class="flex-grow p-0 m-0">
                    @csrf
                    {{-- HIDDEN VALUE --}}
                    <input type="hidden" name="sex" value="{{ $sex ?? null }}">
                    <input type="hidden" name="civil" value="{{ $civil ?? null }}">
                    <input type="hidden" name="membership" value="{{ $membership ?? null }}">
                    <input type="hidden" name="dateto" value="{{ $dateto ?? null }}">
                    <input type="hidden" name="datefrom" value="{{ $datefrom ?? null }}">

                    <button type="submit" class="bg-white hover:bg-sky-500 border-2 border-solid border-gray-200 hover:border-blue-100 hover:shadow-lg h-40 w-full rounded-xl p-4 flex flex-col justify-end">
                        <h1 class="text-4xl font-bold group-hover:text-white">{{$totalCount}}</h1>
                        <h1 class="font-semibold group-hover:text-white">Total</h1>
                        <p class="text-sm group-hover:text-blue-100">Click here to view details</p>
                    </button>
                </form>
                <form action="/viewpdf/{{'male'}}" method="POST" target="__blank" class="flex-grow p-0 m-0">
                    @csrf
                    {{-- HIDDEN VALUE --}}
                    <input type="hidden" name="sex" value="{{ $sex ?? null }}">
                    <input type="hidden" name="civil" value="{{ $civil ?? null }}">
                    <input type="hidden" name="membership" value="{{ $membership ?? null }}">
                    <input type="hidden" name="dateto" value="{{ $dateto ?? null }}">
                    <input type="hidden" name="datefrom" value="{{ $datefrom ?? null }}">

                    <button type="submit" class="bg-white hover:bg-sky-500 border-2 border-solid border-gray-200 hover:border-blue-100 hover:shadow-lg h-40 w-full rounded-xl p-4 flex flex-col justify-end">
                        <h1 class="text-4xl font-bold group-hover:text-white">{{$totalMaleCount}}</h1>
                        <h1 class="font-semibold group-hover:text-white">Male</h1>
                        <p class="text-sm group-hover:text-blue-100">Click here to view details</p>
                    </button>
                </form>
                <form action="/viewpdf/{{'female'}}" method="POST" target="__blank" class="flex-grow p-0 m-0">
                    @csrf
                    {{-- HIDDEN VALUE --}}
                    <input type="hidden" name="sex" value="{{ $sex ?? null }}">
                    <input type="hidden" name="civil" value="{{ $civil ?? null }}">
                    <input type="hidden" name="membership" value="{{ $membership ?? null }}">
                    <input type="hidden" name="dateto" value="{{ $dateto ?? null }}">
                    <input type="hidden" name="datefrom" value="{{ $datefrom ?? null }}">
                    
                    <button type="submit" class="bg-white hover:bg-sky-500 border-2 border-solid border-gray-200 hover:border-blue-100 hover:shadow-lg h-40 w-full rounded-xl p-4 flex flex-col justify-end">
                        <h1 class="text-4xl font-bold group-hover:text-white">{{$totalFemaleCount}}</h1>
                        <h1 class="font-semibold group-hover:text-white">Female</h1>
                        <p class="text-sm group-hover:text-blue-100">Click here to view details</p>
                    </button>
                </form>
            </div>
            

            {{-- Chart --}}
            <div class="flex gap-x-2 mb-8">
                <div href="#" class="container bg-white border-2 border-solid border-gray-200 hover:border-blue-100 hover:shadow-lg h-auto w-3/4 rounded-xl p-4 flex justify-center">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>                      
                </div>

                <div class="container bg-white border-2 border-solid border-gray-200 hover:border-blue-100 hover:shadow-lg h-auto w-1/3 rounded-xl p-6">
                    <form action="/filter_process" method="post" class="flex flex-col">
                        @csrf
                        <h1 class="text-2xl font-bold group-hover:text-white">Filter</h1>
                        <label>Sex</label>  
                        <select name="sex" id="" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm mb-2">
                            <option value="" {{ isset($sex) ? 'selected' : '' }}>Choose Sex</option>
                            <option value="Male" {{ isset($sex) && $sex == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ isset($sex) && $sex == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                        
                        <label>Civil Status</label>
                        <select name="civil_status" id="" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm mb-2">
                            <option value="" {{ isset($civil) ? 'selected' : '' }}>Choose Civil Status</option>
                            <option value="Single" {{ isset($civil) && $civil == 'Single' ? 'selected' : '' }}>Single</option>
                            <option value="Married" {{ isset($civil) && $civil == 'Married' ? 'selected' : '' }}>Married</option>
                            <option value="Separated" {{ isset($civil) && $civil == 'Separated' ? 'selected' : '' }}>Separated</option>
                            <option value="Widowed" {{ isset($civil) && $civil == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                        </select>

                        <label>Membership Status</label>
                        <select name="status_membership" id="" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm mb-2">
                            <option value="" {{ isset($membership) ? 'selected' : '' }}>Choose Membership</option>
                            <option value="PWD" {{ isset($membership) && $membership == 'PWD' ? 'selected' : '' }}>PWD</option>
                            <option value="Pension" {{ isset($membership) && $membership == 'Pension' ? 'selected' : '' }}>Pension</option>
                            <option value="Non-Pension" {{ isset($membership) && $membership == 'Non-Pension' ? 'selected' : '' }}>Non-Pension</option>
                        </select>

                        <label>Date From</label>
                        <input type="date" value="{{ $datefrom ?? '' }}" name="datefrom" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm mb-2">

                        <label>Date To</label>
                        <input type="date" value="{{ $dateto ?? '' }}" name="dateto" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm mb-2">

                        <button class="font-medium text-center text-slate-100 bg-blue-700 hover:bg-blue-500 rounded-xl p-3" type="submit">Filter</button>
                        
                    </form>
                </div>
            </div>
            
            <div class="flex justify-between align-center mb-8">
                <div class="">
                    <h1 class="font-bold text-xl">Registered Senior Citizen</h1>
                    <p>List of all registered record of senior citizen</p>
                </div>
            </div>
            

            <table id="dashboardTbl" class="display">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Sex</th>
                        <th>Birthdate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seniors as $senior)  
                    <tr>
                        <td>{{$senior->lastname}}</td>
                        <td>{{$senior->firstname}}</td>
                        <td>{{$senior->middlename}}</td>
                        <td>{{$senior->sex}}</td>
                        <td>{{$senior->birthdate}}</td>
                        <td class="flex gap-x-3">
                            <a href="/edit_citizen/{{$senior->id}}">Edit</a>
                            @if(auth()->user()->position == 'Admin')
                                <a href="/delete_citizen/{{$senior->id}}">Delete</a>
                            @endif
                            <a href="/view_citizen/{{$senior->id}}">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>

<script>
    const data = {
        labels: ['Male', 'Female'],
        datasets: [{
            label: 'Senior Citizen',
            data: [{{$totalMaleCount}}, {{$totalFemaleCount}}],
            backgroundColor: [
                'rgb(54, 162, 235)',
                'rgb(255, 99, 132)',
            ],
            hoverOffset: 4
        }]
    };

    const options = {
        responsive: true, // Allow the chart to be responsive
        maintainAspectRatio: false, // Override the aspect ratio to allow manual size control
        // Add other options as needed
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: options,
    };

    // Initialize the chart with the correct config
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, config);
</script>

{{-- Component --}}
<x-message />

@include('partials.footer')