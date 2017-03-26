@extends('layouts.master')

@section('content')
<div class="ui grid" id="context"> 
  <div class="three wide column"></div>
  <div class="nine wide column">
    <!-- Filter -->
    <div class="right ui rail container">
      <div class="ui sticky">
        @yield('right-column')
      </div>
    </div>
    <!-- /Filter -->
   
    <!-- Context -->
    <div class="ui segment">
      @yield('left-column')
    </div>
    <!-- /Context -->
  </div>
</div>
@endsection