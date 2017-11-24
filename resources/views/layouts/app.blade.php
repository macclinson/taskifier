<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      @include('layouts.header')
      @if($successFlash = session('successMessage'))
      <transition name="slide-fade" appear>
          <div class="alert alert-success flash-message" v-show="shown" role="alert"><i class="material-icons">check</i> {{$successFlash}}</div>
      </transition>
      @endif
      @if($infoFlash = session('infoMessage'))
      <transition name="slide-fade" appear>
          <div class="alert alert-warning flash-message" v-show="shown" role="alert"><i class="material-icons">info</i> {{$infoFlash}}</div>
      </transition>
      @endif
      @if($warningFlash = session('warningMessage'))
      <transition name="slide-fade" appear>
          <div class="alert alert-danger flash-message" v-show="shown" role="alert"><i class="material-icons">info</i> {{$warningFlash}}</div>
      </transition>
      @endif
        @yield('content')

      @include('layouts.footer')
      <div class="loader-modal" v-if="loader">
        <img src="{{URL::asset('/images/spinner.gif')}}" alt="" />
      </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Scripts -->
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        //Call to action bounce animation
        $('.bounce-animated-btn').on('click', function(){
          $(this).removeClass('bounce').addClass('bounce-faster active');
          setTimeout(function(){
            $('.bounce-animated-btn').removeClass('bounce-faster active').addClass('bounce');
          }, 1000);
        });
      });
    </script>

</body>
</html>
