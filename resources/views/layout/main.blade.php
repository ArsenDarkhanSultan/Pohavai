<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.partials.head')
</head>
<body>
@include('layout.partials.navbar')
<div class="main" style="height: 100%; width: 100%; padding-top: 5%">

@yield('content')
</div>
@include('layout.partials.footer-scripts')
@include('layout.partials.footer')
</body>
</html>
