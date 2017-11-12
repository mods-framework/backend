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
      <form class="password-form validate card-body" style="width: 500px;" action="{{ route('backend.password.email') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="email">{{ trans('backend::auth.label.email') }}</label>
          <input class='form-control validate required email{{ $errors->has('email') ? ' is-invalid' : '' }}' type="text" name='email' id='email' autocomplete="off"  value="{{ old('email') }}" autofocus />
          @if ($errors->has('email')) 
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
          @endif
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">{{ trans('backend::passwords.reset_link_button') }}</button>
        </div>
      </form>
    </div> 
  </div>
</div>