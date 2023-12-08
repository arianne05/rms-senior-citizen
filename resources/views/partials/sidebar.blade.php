<aside>
    <div class="container sm w-48 h-screen max-h-screen border-solid border-2 border-gray-100 flex justify-center align-center">
        <ul class="">
            <a href="/dashboard"><li class="mb-2 mt-2 rounded-lg py-1.5 px-7 bg-white group hover:bg-sky-500 hover:text-white">Dashboard</li></a>
            <a href=""><li class="mb-2 mt-2 rounded-lg py-1.5 px-7 bg-white group hover:bg-sky-500 hover:text-white">Barangay</li></a>
            <a href=""><li class="mb-2 mt-2 rounded-lg py-1.5 px-7 bg-white group hover:bg-sky-500 hover:text-white">Citizen</li></a>
            <li class="mb-2 mt-2 rounded-lg py-1.5 px-7 bg-white group hover:bg-sky-500 hover:text-white">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</aside>