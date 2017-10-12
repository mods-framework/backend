<div id="password-page" class="row centered">
  <div class="col s12 z-depth-4 card-panel">
    <div class="row">
      <div class="col s12 center">
        <p class="center">{{ trans('backend::passwords.reset_title') }}</p>
      </div>
    </div>
    @if (session('status'))    
    <div class="row">
      <div class="col s12">        
        <div class="card green">
            <div class="card-content white-text">
              <p>{{ session('status') }}</p>
            </div>
        </div>        
      </div>
    </div>
    @endif

    <form class="password-form validate" action="{{ route('backend.password.email') }}" method="POST">
      {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons dp48 prefix">person_outline</i>
          <input class='validate required email{{ $errors->has('email') ? ' invalid' : '' }}' type="text" name='email' id='email' autocomplete="off"  value="{{ old('email') }}" autofocus />
          @if ($errors->has('email')) 
            <label id="email-error" class="invalid" for="email">{{ $errors->first('email') }}</label>
          @endif
          <label for="email">{{ trans('backend::auth.label.email') }}</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light col s12">{{ trans('backend::passwords.reset_link_button') }}</button>
        </div>
      </div>
    </form>
  </div>
</div>