<div id="login-page" class="row">
  <div class="col s12 z-depth-4 card-panel">
    <form class="login-form" action="{{ route('backend.login') }}" method="POST">
      <div class="row">
        <div class="input-field col s12 center">
          <img src="http://demo.geekslabs.com/materialize/v3.1/images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
          <p class="center login-form-text"><span class="m">M</span> <span class="o">o</span> <span class="d">d</span> <span class="s">s</span></p>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons dp48 prefix">person_outline</i>
          <input class='validate' type="text" name='username' id='username' required />
          <label for="username" class="center-align">Username</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons dp48 prefix">lock_outline</i>
          <input class='validate' type='password' name='password' id='password' required />
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light col s12">Login</a>
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