@extends('layouts.master')

@section('content')
<div class="ui segments">
  <div class="ui segment">
    <h3 class="ui teal header center aligned">
      @yield('header-left-column')
    </h3>
  </div>
  <div class="ui segment">
    @yield('right-column')
  </div>
</div>
<div class="ui segment">
  @yield('left-column')
</div>
@endsection