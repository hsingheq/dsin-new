@extends('admin.layout.dashboard')
@section('page_name')
    Payment Methods
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
						
							<a class="nav-link border active bb" id="paypal-setting-tab" data-bs-toggle="pill" href="#paypal-setting" role="tab" aria-controls="paypal-setting" aria-selected="true" tabindex="-1">PayPal</a>

                            <a class="nav-link border bb" id="Ipay88-setting-tab" data-bs-toggle="pill" href="#Ipay88-setting" role="tab" aria-controls="Ipay88-setting" aria-selected="false" tabindex="-1">Ipay88</a>

                            <a class="nav-link border bb" id="Billplz-setting-tab" data-bs-toggle="pill" href="#Billplz-setting" role="tab" aria-controls="Billplz-setting" aria-selected="false" tabindex="-1">Billplz</a>

                            <a class="nav-link border bb" id="stripe-setting-tab" data-bs-toggle="pill" href="#stripe-setting" role="tab" aria-controls="stripe-setting" aria-selected="false" tabindex="-1">Stripe</a>

                            <a class="nav-link border bb" id="wallet-setting-tab" data-bs-toggle="pill" href="#wallet-setting" role="tab" aria-controls="wallet-setting" aria-selected="false" tabindex="-1">Wallet</a>
						
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-9">
                        <form action="{{route('admin.payment_method_update')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $setting->id }}">
                            <div class="tab-content text-muted mt-4 mt-md-0">
                                <div class="tab-pane in active show" id="paypal-setting" role="tabpanel" aria-labelledby="paypal-setting-tab">
									<div class="row mb-4">
										 <div class="col-lg-8">
											<div class="form-group mb-3">

												@if(get_setting('paypal_status') == 'enable')
												  @php
												   get_setting('paypal_status');
													$enable_paypal = "checked"
												  @endphp
												@else
												  @php
													$enable_paypal = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="paypal_status" class="form-label text-muted">Enable Paypal</label>
													<input class="form-check-input code-switcher"   name="paypal_status"
													 {{ $enable_paypal }} type="checkbox" value="enable">
												</div>
											</div>

                                            <div class="form-group mb-3">
												<label for="paypal_email">{{ __('Email Address') }}</label>
												<small>({{ __('Use paypal Email Address') }})</small>
												<input type="text" class="form-control" id="paypal_email" name="paypal_email" placeholder="{{ __('Enter Paypal Email ID') }}" 
												value="{{ get_setting("paypal_email") }}">
											</div>
											

											<div class="form-group mb-3">
												<label for="paypal_client_id">{{ __('Client ID') }}</label>
												<small>({{ __('From paypal.com') }})</small>
												<input type="text" class="form-control" id="paypal_client_id" name="paypal_client_id" placeholder="{{ __('Enter Client ID') }}" value="{{ get_setting("paypal_client_id") }}">
											</div>

                                            <div class="form-group mb-3">
												<label for="facebook_client_secret">{{ __('App Secret Key') }}</label>
												<small>({{ __('From paypal.com') }})</small>
												<input type="text" class="form-control" id="paypal_secret_key" name="paypal_secret_key" placeholder="{{ __('Enter App Secret Key') }}" value="{{ get_setting("paypal_secret_key") }}">
											</div>


											<div class="form-group ">
												<label for="redirect">{{ __('Redirect URL') }}</label>
												<small>({{ __('Set this to your Valid OAuth Redirect URI ') }})</small>
												<input type="text" class="form-control" id="redirect" name="paypal_callback_url" placeholder="{{ __('Redirect url ') }}" value="{{ get_setting("paypal_callback_url") }}" >
											</div>

                                            <div class="form-group mb-3">
												@if(get_setting('paypal_mode') == 'live')
												  @php
												   get_setting('paypal_mode');
													$enable_paypal_mode = "checked"
												  @endphp
												@else
												  @php
													$enable_paypal_mode = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="facebook_enable" class="form-label text-muted">Live/Sandbox
                                                        <small>(ON for Live OFF for sandbox)</small>
                                                    </label>
                                                   
													<input class="form-check-input code-switcher"   name="paypal_mode"
													 {{ $enable_paypal_mode }} type="checkbox" value="live">
                                                     
												</div>
											</div>

										</div>
									</div>									
                                </div>  
                                
                                
								<div class="tab-pane " id="Ipay88-setting" role="tabpanel" aria-labelledby="Ipay88-setting-tab">
									<div class="row mb-4">
										<div class="col-lg-8">
											<div class="form-group mb-3">
												@if(get_setting('ipay88_status') == 'enable')
												  @php
												   get_setting('ipay88_status');
													$enable_ipay88 = "checked"
												  @endphp
												@else
												  @php
													$enable_ipay88 = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="ipay88_status" class="form-label text-muted">Enable ipay88</label>
													<input class="form-check-input code-switcher"   name="ipay88_status"
													 {{ $enable_ipay88 }} type="checkbox" value="enable">
												</div>
											</div>


											<div class="form-group mb-3">
												<label for="ipay88_client_id">{{ __('Client ID') }}</label>
												<small>({{ __('From ipay88.com') }})</small>
												<input type="text" class="form-control" id="ipay88_client_id" name="ipay88_client_id" placeholder="{{ __('Enter Client ID') }}" value="{{ get_setting("ipay88_client_id") }}">
											</div>

                                            <div class="form-group mb-3">
												<label for="facebook_client_secret">{{ __('App Secret Key') }}</label>
												<small>({{ __('From paypal.com') }})</small>
												<input type="text" class="form-control" id="ipay88_secret_key" name="ipay88_secret_key" placeholder="{{ __('Enter App Secret Key') }}" value="{{ get_setting("ipay88_secret_key") }}">
											</div>


											<div class="form-group ">
												<label for="ipay88_callback_url">{{ __('Redirect URL') }}</label>
												<small>({{ __('Set this to your Valid OAuth Redirect URI ') }})</small>
												<input type="text" class="form-control" id="ipay88_callback_url" name="ipay88_callback_url" placeholder="{{ __('Redirect url ') }}" value="{{ get_setting("ipay88_callback_url") }}" >
											</div>

                                            <div class="form-group mb-3">
												@if(get_setting('ipay88_mode') == 'live')
												  @php
												   get_setting('ipay88_mode');
													$enable_ipay88_mode = "checked"
												  @endphp
												@else
												  @php
													$enable_ipay88_mode = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="facebook_enable" class="form-label text-muted">Live/Sandbox
                                                        <small>(ON for Live OFF for sandbox)</small>
                                                    </label>
                                                   
													<input class="form-check-input code-switcher"   name="ipay88_mode"
													 {{ $enable_ipay88_mode }} type="checkbox" value="live">
                                                     
												</div>
											</div>

										</div>
									</div>
								</div>

                                <div class="tab-pane " id="Billplz-setting" role="tabpanel" aria-labelledby="Billplz-setting-tab">
									<div class="row mb-4">
										<div class="col-lg-8">
											<div class="form-group mb-3">
												@if(get_setting('billplz_status') == 'enable')
												  @php
												   get_setting('billplz_status');
													$enable_billplz = "checked"
												  @endphp
												@else
												  @php
													$enable_billplz = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="billplz_status" class="form-label text-muted">Enable billplz</label>
													<input class="form-check-input code-switcher"   name="billplz_status"
													 {{ $enable_billplz }} type="checkbox" value="enable">
												</div>
											</div>


											<div class="form-group mb-3">
												<label for="billplz_client_id">{{ __('Client ID') }}</label>
												<small>({{ __('From billplz.com') }})</small>
												<input type="text" class="form-control" id="billplz_client_id" name="billplz_client_id" placeholder="{{ __('Enter Client ID') }}" value="{{ get_setting("billplz_client_id") }}">
											</div>

                                            <div class="form-group mb-3">
												<label for="facebook_client_secret">{{ __('App Secret Key') }}</label>
												<small>({{ __('From paypal.com') }})</small>
												<input type="text" class="form-control" id="billplz_secret_key" name="billplz_secret_key" placeholder="{{ __('Enter App Secret Key') }}" value="{{ get_setting("billplz_secret_key") }}">
											</div>


											<div class="form-group ">
												<label for="billplz_callback_url">{{ __('Redirect URL') }}</label>
												<small>({{ __('Set this to your Valid OAuth Redirect URI ') }})</small>
												<input type="text" class="form-control" id="billplz_callback_url" name="billplz_callback_url" placeholder="{{ __('Redirect url ') }}" value="{{ get_setting("billplz_callback_url") }}" >
											</div>

                                            <div class="form-group mb-3">
												@if(get_setting('billplz_mode') == 'live')
												  @php
												   get_setting('billplz_mode');
													$enable_billplz = "checked"
												  @endphp
												@else
												  @php
													$enable_billplz = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="facebook_enable" class="form-label text-muted">Live/Sandbox
                                                        <small>(ON for Live OFF for sandbox)</small>
                                                    </label>
                                                   
													<input class="form-check-input code-switcher"   name="billplz_mode"
													 {{ $enable_billplz }} type="checkbox" value="live">
                                                     
												</div>
											</div>

										</div>
									</div>
								</div>

                                <div class="tab-pane " id="Billplz-setting" role="tabpanel" aria-labelledby="Billplz-setting-tab">
									<div class="row mb-4">
										<div class="col-lg-8">
											<div class="form-group mb-3">
												@if(get_setting('billplz_status') == 'enable')
												  @php
												   get_setting('billplz_status');
													$enable_billplz = "checked"
												  @endphp
												@else
												  @php
													$enable_billplz = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="billplz_status" class="form-label text-muted">Enable billplz</label>
													<input class="form-check-input code-switcher"   name="billplz_status"
													 {{ $enable_billplz }} type="checkbox" value="enable">
												</div>
											</div>


											<div class="form-group mb-3">
												<label for="billplz_client_id">{{ __('Client ID') }}</label>
												<small>({{ __('From billplz.com') }})</small>
												<input type="text" class="form-control" id="billplz_client_id" name="billplz_client_id" placeholder="{{ __('Enter Client ID') }}" value="{{ get_setting("billplz_client_id") }}">
											</div>

                                            <div class="form-group mb-3">
												<label for="facebook_client_secret">{{ __('App Secret Key') }}</label>
												<small>({{ __('From paypal.com') }})</small>
												<input type="text" class="form-control" id="billplz_secret_key" name="billplz_secret_key" placeholder="{{ __('Enter App Secret Key') }}" value="{{ get_setting("billplz_secret_key") }}">
											</div>


											<div class="form-group ">
												<label for="billplz_callback_url">{{ __('Redirect URL') }}</label>
												<small>({{ __('Set this to your Valid OAuth Redirect URI ') }})</small>
												<input type="text" class="form-control" id="billplz_callback_url" name="billplz_callback_url" placeholder="{{ __('Redirect url ') }}" value="{{ get_setting("billplz_callback_url") }}" >
											</div>

                                            <div class="form-group mb-3">
												@if(get_setting('billplz_mode') == 'live')
												  @php
												   get_setting('billplz_mode');
													$enable_billplz = "checked"
												  @endphp
												@else
												  @php
													$enable_billplz = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="facebook_enable" class="form-label text-muted">Live/Sandbox
                                                        <small>(ON for Live OFF for sandbox)</small>
                                                    </label>
                                                   
													<input class="form-check-input code-switcher"   name="billplz_mode"
													 {{ $enable_billplz }} type="checkbox" value="live">
                                                     
												</div>
											</div>

										</div>
									</div>
								</div> <div class="tab-pane " id="Billplz-setting" role="tabpanel" aria-labelledby="Billplz-setting-tab">
									<div class="row mb-4">
										<div class="col-lg-8">
											<div class="form-group mb-3">
												@if(get_setting('billplz_status') == 'enable')
												  @php
												   get_setting('billplz_status');
													$enable_billplz = "checked"
												  @endphp
												@else
												  @php
													$enable_billplz = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="billplz_status" class="form-label text-muted">Enable billplz</label>
													<input class="form-check-input code-switcher"   name="billplz_status"
													 {{ $enable_billplz }} type="checkbox" value="enable">
												</div>
											</div>


											<div class="form-group mb-3">
												<label for="billplz_client_id">{{ __('Client ID') }}</label>
												<small>({{ __('From billplz.com') }})</small>
												<input type="text" class="form-control" id="billplz_client_id" name="billplz_client_id" placeholder="{{ __('Enter Client ID') }}" value="{{ get_setting("billplz_client_id") }}">
											</div>

                                            <div class="form-group mb-3">
												<label for="facebook_client_secret">{{ __('App Secret Key') }}</label>
												<small>({{ __('From paypal.com') }})</small>
												<input type="text" class="form-control" id="billplz_secret_key" name="billplz_secret_key" placeholder="{{ __('Enter App Secret Key') }}" value="{{ get_setting("billplz_secret_key") }}">
											</div>


											<div class="form-group ">
												<label for="billplz_callback_url">{{ __('Redirect URL') }}</label>
												<small>({{ __('Set this to your Valid OAuth Redirect URI ') }})</small>
												<input type="text" class="form-control" id="billplz_callback_url" name="billplz_callback_url" placeholder="{{ __('Redirect url ') }}" value="{{ get_setting("billplz_callback_url") }}" >
											</div>

                                            <div class="form-group mb-3">
												@if(get_setting('billplz_mode') == 'live')
												  @php
												   get_setting('billplz_mode');
													$enable_billplz = "checked"
												  @endphp
												@else
												  @php
													$enable_billplz = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="facebook_enable" class="form-label text-muted">Live/Sandbox
                                                        <small>(ON for Live OFF for sandbox)</small>
                                                    </label>
                                                   
													<input class="form-check-input code-switcher"   name="billplz_mode"
													 {{ $enable_billplz }} type="checkbox" value="live">
                                                     
												</div>
											</div>

										</div>
									</div>
								</div> <div class="tab-pane " id="Billplz-setting" role="tabpanel" aria-labelledby="Billplz-setting-tab">
									<div class="row mb-4">
										<div class="col-lg-8">
											<div class="form-group mb-3">
												@if(get_setting('billplz_status') == 'enable')
												  @php
												   get_setting('billplz_status');
													$enable_billplz = "checked"
												  @endphp
												@else
												  @php
													$enable_billplz = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="billplz_status" class="form-label text-muted">Enable billplz</label>
													<input class="form-check-input code-switcher"   name="billplz_status"
													 {{ $enable_billplz }} type="checkbox" value="enable">
												</div>
											</div>


											<div class="form-group mb-3">
												<label for="billplz_client_id">{{ __('Client ID') }}</label>
												<small>({{ __('From billplz.com') }})</small>
												<input type="text" class="form-control" id="billplz_client_id" name="billplz_client_id" placeholder="{{ __('Enter Client ID') }}" value="{{ get_setting("billplz_client_id") }}">
											</div>

                                            <div class="form-group mb-3">
												<label for="facebook_client_secret">{{ __('App Secret Key') }}</label>
												<small>({{ __('From paypal.com') }})</small>
												<input type="text" class="form-control" id="billplz_secret_key" name="billplz_secret_key" placeholder="{{ __('Enter App Secret Key') }}" value="{{ get_setting("billplz_secret_key") }}">
											</div>


											<div class="form-group ">
												<label for="billplz_callback_url">{{ __('Redirect URL') }}</label>
												<small>({{ __('Set this to your Valid OAuth Redirect URI ') }})</small>
												<input type="text" class="form-control" id="billplz_callback_url" name="billplz_callback_url" placeholder="{{ __('Redirect url ') }}" value="{{ get_setting("billplz_callback_url") }}" >
											</div>

                                            <div class="form-group mb-3">
												@if(get_setting('billplz_mode') == 'live')
												  @php
												   get_setting('billplz_mode');
													$enable_billplz = "checked"
												  @endphp
												@else
												  @php
													$enable_billplz = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="facebook_enable" class="form-label text-muted">Live/Sandbox
                                                        <small>(ON for Live OFF for sandbox)</small>
                                                    </label>
                                                   
													<input class="form-check-input code-switcher"   name="billplz_mode"
													 {{ $enable_billplz }} type="checkbox" value="live">
                                                     
												</div>
											</div>

										</div>
									</div>
								</div> 
                                <div class="tab-pane " id="stripe-setting" role="tabpanel" aria-labelledby="stripe-setting-tab">
									<div class="row mb-4">
										<div class="col-lg-8">
											<div class="form-group mb-3">
												@if(get_setting('stripe_status') == 'enable')
												  @php
												   get_setting('stripe_status');
													$enable_stripe = "checked"
												  @endphp
												@else
												  @php
													$enable_stripe = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="stripe_status" class="form-label text-muted">Enable stripe</label>
													<input class="form-check-input code-switcher"   name="stripe_status"
													 {{ $enable_stripe }} type="checkbox" value="enable">
												</div>
											</div>


											<div class="form-group mb-3">
												<label for="stripe_client_id">{{ __('Client ID') }}</label>
												<small>({{ __('From stripe.com') }})</small>
												<input type="text" class="form-control" id="stripe_client_id" name="stripe_client_id" placeholder="{{ __('Enter Client ID') }}" value="{{ get_setting("stripe_client_id") }}">
											</div>

                                            <div class="form-group mb-3">
												<label for="stripe_client_secret">{{ __('App Secret Key') }}</label>
												<small>({{ __('From stripe.com') }})</small>
												<input type="text" class="form-control" id="stripe_secret_key" name="stripe_secret_key" placeholder="{{ __('Enter App Secret Key') }}" value="{{ get_setting("stripe_secret_key") }}">
											</div>


											<div class="form-group ">
												<label for="stripe_callback_url">{{ __('Redirect URL') }}</label>
												<small>({{ __('Set this to your Valid OAuth Redirect URI ') }})</small>
												<input type="text" class="form-control" id="stripe_callback_url" name="stripe_callback_url" placeholder="{{ __('Redirect url ') }}" value="{{ get_setting("stripe_callback_url") }}" >
											</div>

                                            <div class="form-group mb-3">
												@if(get_setting('stripe_mode') == 'live')
												  @php
												   get_setting('stripe_mode');
													$enable_stripe = "checked"
												  @endphp
												@else
												  @php
													$enable_stripe = ""
												  @endphp
												@endif 
												
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="stripe_enable" class="form-label text-muted">Live/Sandbox
                                                        <small>(ON for Live OFF for sandbox)</small>
                                                    </label>
                                                   
													<input class="form-check-input code-switcher"   name="stripe_mode"
													 {{ $enable_stripe }} type="checkbox" value="live">
                                                     
												</div>
											</div>

										</div>
									</div>
								</div>


                                <div class="tab-pane " id="wallet-setting" role="tabpanel" aria-labelledby="wallet-setting-tab">
									<div class="row mb-4">
										<div class="col-lg-8">
											<div class="form-group mb-3">
												@if(get_setting('wallet_mode') == 'enable')
												  @php
												   get_setting('wallet_mode');
													$enable_wallet = "checked"
												  @endphp
												@else
												  @php
													$enable_wallet = ""
												  @endphp
												@endif 
												{{-- <input type="checkbox" name="facebook_login_enable" value="ok" id=""> --}}
												<div class="form-check form-switch form-switch-right form-switch-md">
													<label for="stripe_status" class="form-label text-muted">Enable wallet</label>
													<input class="form-check-input code-switcher"   name="wallet_mode"
													 {{ $enable_wallet }} type="checkbox" value="enable">
												</div>
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