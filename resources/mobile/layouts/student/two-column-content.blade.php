@extends('layouts.master')

@section('content')
<div class="ui grid" id="context"> 
  <div class="one wide column"></div>
  <div class="ten wide column">
    <!-- Filter -->
    <div class="right ui rail">
      <div class="ui sticky">
        @yield('right-column')
      </div>
    </div>
    <!-- /Filter -->
   
    <!-- Context -->
    <div class="ui segment">
      <h2 class="ui header">@yield('header-left-column')</h2>
      @yield('left-column')
    </div>
    <!-- /Context -->
  </div>
</div>
@endsection