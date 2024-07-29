@if(session()->has('notify.message'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if(session()->has('notify.message'))
            @if(session('notify.type') == 'success')
            toastr.success("{{ session('notify.message') }}");
            @elseif(session('notify.type') == 'info')
            toastr.info("{{ session('notify.message') }}");
            @elseif(session('notify.type') == 'warning')
            toastr.warning("{{ session('notify.message') }}");
            @elseif(session('notify.type') == 'error')
            toastr.error("{{ session('notify.message') }}");
            @endif
            @endif
        });
    </script>
@endif
