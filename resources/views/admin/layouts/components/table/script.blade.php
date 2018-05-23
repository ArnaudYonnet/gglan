<script>
    $(function () {
        $('#{{ $title }}').DataTable({
            {{ $slot }}
        })
      })
</script>

