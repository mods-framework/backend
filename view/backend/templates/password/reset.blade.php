@if (session('status'))    
<div class="row justify-content-center">
  <div class="col-auto">        
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
  </div>
</div>
@endif

<div id="password-page" class="row justify-content-center">
  <div class="col-auto">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{ trans('backend::passwords.reset_title') }}</h4>
      </div>
      <form class="password-form validate card-body" style="width: 500px;" action="{{ route('backend.password.request') }}" method="POST">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
              <label for="email">{{ trans('backend::auth.label.email') }}</label>
              <input class='form-control validate required email{{ $errors->has('email') ? ' is-invalid' : '' }}' type="text" name='email' id='email' autocomplete="off"  value="{{ $email or old('email') }}" autofocus />
              @if ($errors->has('email')) 
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
              @endif
        </div>

        <div class="form-group">
            <label for="password">{{ trans('backend::auth.label.password') }}</label>
            <input class='form-control validate required {{ $errors->has('password') ? ' is-invalid' : '' }}' type='password' name='password' id='password' />
            @if ($errors->has('password')) 
              <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="password_confirmation">{{ trans('backend::auth.label.password_confirmation') }}</label>
            <input class='form-control validate required password_confirm {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}' type='password' name='password_confirmation' id='password_confirmation' data-rule-equalTo="#password"/>
            @if ($errors->has('password_confirmation')) 
              <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
            @endif
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">{{ trans('backend::passwords.reset_passwprd_button') }}</button>
        </div>
      </form>
    </div>  
  </div>
</div>