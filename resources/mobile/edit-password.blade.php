@extends('layouts.master')

@section('title', 'Ubah Password')

@section('user-name')
  NAMA DI SINI
@endsection

@section('user-tid')
  81927
@endsection

@section('content')
<div class="ui one column grid item">
  <div class="column">
    <!-- Form -->
    <div class="ui center aligned">
      <div class="left aligned column">
        <form class="ui large form">
          <div class="ui segment">
            <h3 class="ui center aligned teal header">
              <i class="key icon"></i>Ubah Password
            </h3>
            <div class="ui divider"></div>
            <div class="field">
              <label>Password Saat Ini</label>
              <input class="popup" type="password" placeholder="Password Lama" data-content="Silahkan masukan password Anda saat ini.">
            </div>
            <div class="field">
              <label>Password Baru</label>
              <input class="popup" type="password" placeholder="Password Baru" data-content="Silahkan masukan password baru yang diinginkan.">
            </div>
            <div class="field">
              <label>Konfirmasi Password Baru</label>
              <input class="popup" type="password" name="confirm-password" placeholder="Konfirmasi Password Baru" data-content="Silahkan ulangi password baru Anda.">
            </div>

            <div class="ui fluid large teal submit button">Ubah</div>
          </div>

          <div class="ui error message"></div>

        </form>
      </div>
    </div>
    <!-- /Form -->
  </div>
</div>

@endsection