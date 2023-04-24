@extends('template.auth')

@section('content')


<div id="imatgeBody">
    <div class="container">
      <div class="login-box">
        <div class="lb-header">
          <a href="#" class="active empleado-link">Treballador</a>
          <a href="#" class="administrador-link">Administrador</a>
        </div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <form class="empleado-form"  method="POST" >
          @csrf
          <p class="title-empresa"> IdentWork <br><img src="https://logodix.com/logo/2134548.png" width="60" height="60" alt="Logo"></p>
          
          <p class="info-google">Inicieu sessió amb Google:</p>
          <div class="u-form-group">
            <div class="button-box">
              <button class="btn-google"> <img src="https://www.google.com/favicon.ico" alt="google"><a href="{{route('login-google')}}"> Google </a></button>
            </div>
          </div>
        </form>

        <form class="administrador-form" action="{{ route('login') }}" method="POST"> 
          @csrf
            <div class="u-form-group">
                <input type="email" name="email" placeholder="Email" value="{{ old('email_login') }}">
            </div>
          <div class="u-form-group">
            <input type="password" name="password" placeholder="Contrasenya" />
          </div>
          
          <div class="u-form-group">
            <div class="button-box">
              <button class="btn">Iniciar sessió</button>
            </div>
            <br>
            <br>
            <p class="or">o</p>
            <p class="create-account">Us fa falta un compte d'administrador? <a href="{{ route('register')}}">Creen un ara</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>


  
    <!--<div class="login-box">

        <form class="email-login" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="u-form-group">
                <input type="email" name="email" placeholder="Email" value="{{ old('email_login') }}">
            </div>
            <div class="u-form-group">
                <input type="password" name="password" placeholder="Contraseña"/>
            </div>
            <div class="u-form-group">
                <button type="submit">Iniciar</button>
            </div>
            <div class="u-form-group">
                <a href="#" class="forgot-password hide">Forgot password?</a>
            </div>
        </form>
        <form class="email-signup hide" action="{{ route('register')}}" method="POST">
            @csrf
            <div class="u-form-group">
                <input type="text" name="name" placeholder="Nombre" value="{{ old('name_register') }}">
            </div>
            <div class="u-form-group">
                <input type="email" name="email" placeholder="Email" value="{{ old('email_register') }}" />
            </div>
            <div class="u-form-group">
                <input type="password" name="password" placeholder="Contraseña"/>
            </div>
            <div class="u-form-group">
                <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña"/>
            </div>
            <div class="u-form-group">
                <button type="submit">Registrar</button>
            </div>
        </form>-->
    </div>
@endsection

@push('styles')
    
@endpush

@push('scripts')
    
@endpush