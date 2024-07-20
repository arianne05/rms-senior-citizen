@include('partials.header')

<section class="flex">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        {{-- Main Content --}}
        @if(auth()->user()->position == 'Admin')
            <div class="pr-16 pt-8 flex justify-end">
                <form action="/brgypdf" method="POST">
                    @csrf
                    <div class="flex gap-2">
                        <div class="">
                            <label>Date From</label>
                            <input type="date" value="{{ $datefrom ?? '' }}" name="datefrom" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm mb-2">
                        </div>
                        <div class="">
                            <label>Date To</label>
                            <input type="date" value="{{ $dateto ?? '' }}" name="dateto" class="w-auto border border-slate-300 rounded-xl py-2 pl-4 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm mb-2">
                        </div>
                        <div class="">
                            <button type="submit" class="font-medium text-slate-100 bg-gray-400 hover:bg-blue-500 rounded-xl p-3 px-12">View</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        
        <div class="flex flex-wrap w-full h-auto p-8 overflow-hidden">
            @foreach ($data_barangay as $barangay)
            <a href="/view_barangay/{{$barangay->barangay}}" class="flex items-center justify-center bg-white border-2 border-solid border-gray-200 hover:border-blue-100 hover:shadow-lg h-40 w-60 rounded-xl p-4 m-4">
                <div class="" style="background-image: url('{{asset('img/totalbrgy.png')}}'); background-size: 80px 70px; background-repeat: no-repeat; background-position: right center; background-color: rgba(255, 255, 255, 0.1);" id="text">
                    <h1 class="text-4xl font-bold">{{$barangay->barangay_count}}</h1>
                    <h1 class="font-semibold text-red-600">{{$barangay->barangay}}</h1>
                    <p class="text-sm">Click here to view details</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
        
</section>

{{-- Component --}}
<x-message />

@include('partials.footer')