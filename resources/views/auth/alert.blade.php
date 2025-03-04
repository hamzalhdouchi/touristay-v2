
@if (session('success'))
<script>
Swal.fire({
    title: "{{session('success')}}",
    icon: "success",
    draggable: true
  });
</script>
@endif
@if (session('errur'))
<script>
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{session('success')}}",
      });
    </script>
@endif
