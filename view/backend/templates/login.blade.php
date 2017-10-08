<div id="login-page" class="row centered">
  <div class="col s12 z-depth-4 card-panel">
    <form class="login-form validate" action="{{ route('backend.login') }}" method="POST">
      {{ csrf_field() }}
      <div class="row">
        <div class="col s12 center">
          <p class="center brand-logo"><span class="m">M</span> <span class="o">o</span> <span class="d">d</span> <span class="s">s</span></p>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons dp48 prefix">person_outline</i>
          <input class='validate{{ $errors->has('username') ? ' invalid' : '' }}' type="text" name='username' id='username' autocomplete="off"  value="{{ old('username') }}" required autofocus />
          @if ($errors->has('username')) 
            <label id="username-error" class="invalid" for="username">{{ $errors->first('username') }}</label>
          @endif
          <label for="username">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons dp48 prefix">lock_outline</i>
          <input class='validate{{ $errors->has('password') ? ' invalid' : '' }}' type='password' name='password' id='password' required />
          @if ($errors->has('password')) 
            <label id="password-error" class="invalid" for="password">{{ $errors->first('password') }}</label>
          @endif
          <label for="password"  @if ($errors->has('password')) data-error="{{ $errors->first('password') }}"@endif>Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light col s12">Login</button>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
            <p class="medium-small"><a href="{{ route('backend.password.request') }}">Forgot password ?</a></p>
        </div>          
      </div>
    </form>
  </div>
</div>