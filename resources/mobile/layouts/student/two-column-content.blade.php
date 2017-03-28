@extends('layouts.master')

@section('content')
<div class="ui segments">
  <div class="ui teal inverted segment">
    <h2 class="ui header center aligned">
      <i class="book icon"></i>@yield('header-left-column')
    </h2>
  </div>
  <div class="ui segment">
    @yield('right-column')
  </div>
</div>
  <!-- <div class="ui teal segment"> -->
    @yield('left-column')
  <!-- </div> -->
  

<div class="ui "></div>


@endsection