@if (Request::user()->role == 'admin')
    @include('layouts.admin.sidebar')
@endif
@if (Request::user()->role == 'owner')
    @include('layouts.owner.sidebar')
@endif
