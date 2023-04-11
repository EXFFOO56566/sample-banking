

@if($errors->any())
    <script>
        $(document).ready(function () {
            @foreach($errors->all() as $error)
            toastr.error('{{ $error }}')
            @endforeach
        });
    </script>
@endif

@if(session()->has('success'))
    <script>
        $(document).ready(function () {
            toastr.success('{{ session('success') }}');
        });
    </script>
@endif
