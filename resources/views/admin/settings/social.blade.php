@extends('admin.layout.dashboard')
@section('page_name')
    Social Login
@endsection
@section('content')
    <div class="container">
        @if (Session::has('succed'))
            <div class="alert alert-success"><strong>{{ Session::get('succed') }}</strong></div>
        @endif

        @if (Session::has('fail'))
            <div class="alert alert-danger"><strong>{{ Session::get('fail') }}</strong></div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
        @endif
        <div class="card mycard">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						
							<a class="nav-link border active bb" id="facebook-setting-tab" data-bs-toggle="pill" href="#facebook-setting" role="tab" aria-controls="facebook-setting" aria-selected="true" tabindex="-1">Facebook</a>

                            <a class="nav-link border bb" id="google-setting-tab" data-bs-toggle="pill" href="#google-setting" role="tab" aria-controls="google-setting" aria-selected="false" tabindex="-1">Google</a>
						
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-9">
                        <form action="{{url('/admin/settings/social-update/')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $setting->id }}">
                            <div class="tab-content text-muted mt-4 mt-md-0">
                                <div class="tab-pane in active show" id="facebook-setting" role="tabpanel" aria-labelledby="facebook-setting-tab">
									<div class="row mb-4">
										 <div class="col-lg-8">
											<div class="form-group mb-3">
												@if(get_setting('facebook_login_enable') === 'on')
												  @php
												   get_setting('facebook_login_enable');
													$enable_facebook = "checked"
												  @endphp
												@else
												  @php
													$enable_facebook = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="facebook_enable" class="form-label text-muted">Enable Facebook Login</label>
													<input class="form-check-input code-switcher"   name="facebook_login_enable"
													 {{ $enable_facebook }} type="checkbox" value="on" id="facebook_enable">
												</div>
											</div>
											<div class="form-group mb-3">
												<label for="facebook_client_id">{{ __('App ID') }}</label>
												<small>({{ __('From developers.facebook.com') }})</small>
												<input type="text" class="form-control" id="facebook_client_id" name="facebook_client_id" placeholder="{{ __('Enter App ID') }}" 
												value="{{ get_setting("facebook_client_id") }}">
											</div>

											<div class="form-group mb-3">
												<label for="facebook_client_secret">{{ __('App Secret') }}</label>
												<small>({{ __('From developers.facebook.com') }})</small>
												<input type="text" class="form-control" id="facebook_client_secret" name="facebook_client_secret" placeholder="{{ __('Enter App Secret') }}" value="{{ get_setting("facebook_client_secret") }}">
											</div>
											<div class="form-group ">
												<label for="facebook_redirect">{{ __('Redirect URL') }}</label>
												<small>({{ __('Set this to your Valid OAuth Redirect URI in developers.facebook.com') }})</small>
												<input type="text" class="form-control" id="facebook_redirect" name="facebook_redirect_url" placeholder="{{ __('Redirect url ') }}" value="{{ get_setting("facebook_redirect_url") }}" >
											</div>
										</div>
									</div>									
                                </div>                            
								<div class="tab-pane " id="google-setting" role="tabpanel" aria-labelledby="google-setting-tab">
									<div class="row mb-4">
										<div class="col-lg-8">
											<div class="form-group mb-3">
												@if( get_setting('google_login_enable') === 'on')
												  @php
													$enable_google = "checked"
												  @endphp
												@else
												  @php
													$enable_google = ""
												  @endphp
												@endif 
												<div class="form-check form-switch form-switch-right form-switch-md">
				
													
													<label for="google_enable" class="form-label text-muted">Enable Google Login</label>
													<input class="form-check-input code-switcher" value="on" name="google_login_enable" {{$enable_google}} type="checkbox" id="google_enable">
												</div>
											</div>
											<div class="form-group mb-3">
												<label for="google_client_id">{{ __('Client ID') }}</label>
												<small>({{ __('From console.cloud.google.com') }})</small>
												<input type="text" class="form-control " id="google_client_id" name="google_client_id" placeholder="{{ __('Enter Client ID') }}" value="{{ get_setting('google_client_id') }}">
											</div>

											<div class="form-group mb-3">
												<label for="google_client_secret">{{ __('Client Secret') }}</label>
												<small>({{ __('From console.cloud.google.com') }})</small>
												<input type="text" class="form-control " id="google_client_secret" name="google_client_secret" placeholder="{{ __('Enter Client Secret') }}" value="{{ get_setting('google_client_secret') }}">
											</div>

											<div class="form-group">
												<label for="google_redirect">{{ __('Redirect URL') }}</label>
												<small>({{ __('Set this to your Redirect URL in console.cloud.google.com') }})</small>
												<input type="text" class="form-control " id="google_redirect" name="google_redirect_url" placeholder="{{ __('Enter Redirect URL') }}" value="{{ get_setting('google_redirect_url') }}">
											</div>
										</div>
									</div>
								</div>
							</div>	
                            <div class="form-group">
                                <p class="text-end"><input type="submit" value="Save" class="btn btn-secondary"></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!--  end col -->
        </div>
        <!--end row-->
    </div><!-- end card-body -->
    </div>
    </div>
@endsection