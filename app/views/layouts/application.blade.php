@include('layouts.partials.head')
@include('layouts.partials.nav')

<div id="wrap">
    @include('layouts.partials.header')

    @yield('content')
</div>

@include('layouts.partials.footer')
@include('layouts.partials.scripts')

</body>
</html>
