@include('partials.header')

<h1>HI</h1>

<form action="/logout" method="POST">
@csrf
    <button>Logout</button>
</form>

@include('partials.footer')