@extends('layout.master')
@section('content')
    <div class="container-head">
        <h1>Access Token expired. Refreshing token...</h1>
    </div>
    <script type="module">
        $(document).ready(function () {
            setTimeout(function () {
                window.location.href = '{{route('auth.refresh_token', ['prevUrl' => $prevUrl])}}'
            }, 2000)
        })
    </script>
@endsection
