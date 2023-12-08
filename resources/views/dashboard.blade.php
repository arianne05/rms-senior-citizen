@include('partials.header')

<section class="flex">
    @include('partials.sidebar')
    <h1>HI {{$alert}}</h1>
</section>






<script>
    const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "{{$title}} {{$name}}"
});

</script>


@include('partials.footer')