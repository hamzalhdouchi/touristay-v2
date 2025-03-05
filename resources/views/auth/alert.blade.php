
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        text: "{{session('error')}}",
      });
    </script>
@endif
