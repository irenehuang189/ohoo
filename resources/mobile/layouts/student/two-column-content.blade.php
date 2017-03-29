@extends('layouts.master')

@section('content')
<div class="ui segments">
  <div class="ui segment">
    <h3 class="ui teal header center aligned">
      <i class="book icon"></i>@yield('header-left-column')
    </h3>
  </div>
  <div class="ui segment">
    @yield('right-column')
  </div>
</div>
@yield('left-column')

@endsection