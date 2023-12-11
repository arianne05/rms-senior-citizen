@include('partials.header')

<section class="flex">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex flex-col w-screen">
        {{-- Navbar --}}
        @include('partials.navbar')

        {{-- Main Content --}}
        <div class="flex flex-wrap w-full h-auto p-8 overflow-hidden">

            @foreach ($data_barangay as $barangay)
            <a href="/view_barangay/{{$barangay->barangay}}" class="group container bg-white hover:bg-sky-500 border-2 border-solid border-gray-200 hover:border-blue-100 hover:shadow-lg h-40 w-60 rounded-xl p-4 m-4 flex flex-col justify-end">
                <div class="">
                    <h1 class="text-4xl font-bold group-hover:text-white">{{$barangay->barangay_count}}</h1>
                    <h1 class="font-semibold group-hover:text-white">{{$barangay->barangay}}</h1>
                    <p class="text-sm group-hover:text-blue-100">Click here to view details</p>
                </div>
            </a>
            @endforeach

            
                <p></p>
            
            
        </div>
    </div>
        
</section>


@include('partials.footer')