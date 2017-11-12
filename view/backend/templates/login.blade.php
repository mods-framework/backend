@if (session('status'))    
<div class="row justify-content-center">
  <div class="col-auto">        
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
  </div>
</div>
@endif

<div id="login-page" class="row justify-content-center">
  <div class="col-auto card">
    <form class="login-form validate card-body" action="{{ route('backend.login') }}" method="POST">
      {{ csrf_field() }}
      <div class="row">
        <div class="col text-center">
          <p class="brand-logo"><span class="m">M</span> <span class="o">o</span> <span class="d">d</span> <span class="s">s</span></p>
        </div>
      </div>
      <div class="form-group">
        <label for="username">{{ trans('backend::auth.label.username') }}</label>
        <input class='form-control validate{{ $errors->has('username') ? ' is-invalid' : '' }}' type="text" name='username' id='username' autocomplete="off"  value="{{ old('username') }}" required autofocus />
        @if ($errors->has('username')) 
          <div class="invalid-feedback">{{ $errors->first('username') }}</div>
        @endif
      </div>
      <div class="form-group">
        <label for="password">{{ trans('backend::auth.label.password') }}</label>
        <input class='form-control validate{{ $errors->has('password') ? ' is-invalid' : '' }}' type='password' name='password' id='password' required />
        @if ($errors->has('password'))
          <div class="invalid-feedback">{{ $errors->first('password') }}</div>
        @endif
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">{{ trans('backend::auth.button.login') }}</button>
      </div>
      <div class="form-group">
        <p><a href="{{ route('backend.password.request') }}">{{ trans('backend::auth.button.forgot_password') }}</a></p>         
      </div>
    </form>
  </div>
</div>