@extends('admin.layout.dashboard')
@section('page_name')
    System Settings
@endsection
@section('headerinject')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.17.6/tagify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.32.0/codemirror.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.css"
        integrity="sha512-6sALqOPMrNSc+1p5xOhPwGIzs6kIlST+9oGWlI4Wwcbj1saaX9J3uzO3Vub016dmHV7hM+bMi/rfXLiF5DNIZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/monokai.min.css">
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
                    <div class="col-lg-3">
                        <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link border  active bb" id="v-pills-basic-info-tab" data-bs-toggle="pill" href="#v-pills-basic-info" role="tab" aria-controls="v-pills-basic-info" aria-selected="true">Site Information</a>

                            <a class="nav-link  border  bb" id="v-pills-seo-tab" data-bs-toggle="pill" href="#v-pills-seo"
                                role="tab" aria-controls="v-pills-seo" aria-selected="false" tabindex="-1">SEO Settings</a>

                            <a class="nav-link  border  bb" id="v-pills-custom_css-tab" data-bs-toggle="pill"
                                href="#v-pills-custom_css" role="tab" aria-controls="v-pills-custom_css"
                                aria-selected="false" tabindex="-1">Custom css/js</a>

                            <a class="nav-link  border  bb" id="v-pills-scripts-tab" data-bs-toggle="pill"
                                href="#v-pills-scripts" role="tab" aria-controls="v-pills-scripts" aria-selected="false"
                                tabindex="-1">Advanced Scripts</a>

                            <a class="nav-link  border  " id="v-pills-footer-tab" data-bs-toggle="pill"
                                href="#v-pills-footer" role="tab" aria-controls="v-pills-footer" aria-selected="false"
                                tabindex="-1">Footer & Contact Information</a>

                            <a class="nav-link  border  " id="v-pills-socialicons-tab" data-bs-toggle="pill"
                                href="#v-pills-socialicons" role="tab" aria-controls="v-pills-socialicons"
                                aria-selected="false" tabindex="-1">Social Icons</a>

                        </div>
                    </div>
					<!-- end col -->
                    <div class="col-lg-9">
                        <form action="{{url('/admin/settings/system-update/')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $setting->id }}">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                <div class="tab-pane in active show" id="v-pills-basic-info" role="tabpanel" aria-labelledby="v-pills-basic-info-tab">
									<div class="mb-4">
										<!-- Logo Settings Starts-->
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group mb-3">
													
													<div class="form-group row">
														<label class="col-md-12 col-form-label" for="signinSrEmail">{{translate('Site Logo*')}}</label>
														<div class="col-md-12">
															<div class="input-group" data-toggle="aizuploader" data-type="image">
																<div class="input-group-prepend">
																	<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
																</div>
																<div class="form-control file-amount">{{ translate('Choose File') }}</div>
																<input type="hidden" name="site_logo" value="{{ get_setting('site_logo') }}" class="selected-files">
															</div>
															<div class="file-preview box sm">
															</div>
														</div>
													</div>
												
													


													<label class="" for="favicon">{{translate('Favicon*')}}</label>
														<div class="faviconuploader">
															<div class="input-group" data-toggle="aizuploader" data-type="image">
																<div class="input-group-prepend">
																	<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
																</div>
																<div class="form-control file-amount">{{ translate('Choose File') }}</div>
																<input type="hidden" name="favicon" value="{{ get_setting('favicon') }}" class="selected-files">
															</div>
															<div class="file-preview box sm">
															</div>
														</div>



														<label class="mt-3" for="admin">{{translate('Admin Logo*')}} </label>
														<div class="adminuploader">
															<div class="input-group" data-toggle="aizuploader" data-type="image">
																<div class="input-group-prepend">
																	<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
																</div>
																<div class="form-control file-amount">{{ translate('Choose File') }}</div>
															
																	<input type="hidden" name="admin_logo" value="{{ get_setting('admin_logo') }}" class="selected-files">
																
															</div>
															<div class="file-preview box sm">
															</div>
														</div>
												</div>
											</div>
										</div>
										<!-- Logo Settings Ends -->
										<div class="row">
											<div class="col-lg-12 mt-2 mb-2">
												<h4>Currency Settings</h4>
											</div>
											
											<div class="col-lg-6 mb-3">
												<div class="form-group">
													<label for="currency_direction">Currency (RM) *</label>
													<input type="text" name="currency_direction" id="" class="form-control" value="{{ get_setting('currency_direction') }}">
												</div>
											</div>
											<div class="col-lg-6 mb-3">
												<div class="form-group">
													<label for="is_decimal">Decimal*</label>
													<select name="is_decimal" id="is_decimal"
														class="form-control">
														<option value="1" selected="">On</option>
														<option value="0">Off</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6 mb-3">
												<div class="form-group">
													<label for="decimal_separator">Decimal Separator *</label>
													<select name="decimal_separator" id="decimal_separator"
														class="form-control">
														<option value=",">Comma (,)</option>
														<option value="." selected="">Dot (.)</option>
													</select>
												</div>
											</div>

											<div class="col-lg-6 mb-3">
												<div class="form-group">
													<label for="thousand_separator">Thousand Separator *</label>
													<select name="thousand_separator" id="thousand_separator"
														class="form-control">
														<option value="," selected="">Comma (,)</option>
														<option value=".">Dot (.)</option>
													</select>
												</div>
											</div>
										</div>
									</div>
                                </div>

                                <div class="tab-pane " id="v-pills-seo" role="tabpanel" aria-labelledby="v-pills-seo-tab">
                                    <div class="d-flex mb-4">
                                        <div class="row">
											<div class="col-lg-8">
												<div class="form-group mb-3">
													<label for="home_page_title">Site Title *</label>
													<input type="text" name="title" class="form-control" id="title" placeholder="Enter Home Page Title" value="{{ get_setting('title') }}">
												</div>
											</div>
											<div class="col-lg-8">
												<div class="form-group">
													<label for="">Site Meta Keywords *</label>
													<input type="text" name="meta_keywords" placeholder="Enter Site Keywords" value="{{ get_setting('meta_keywords') }}" class="form-control">
												</div>
												<div class="form-group mt-3">
													<label for="meta_description">Site Meta Description *</label>
													<textarea name="meta_description" id="meta_description" class="form-control" rows="5" placeholder="Enter Site Meta Description">{{ get_setting('meta_description') }}</textarea>
												</div>
											</div>
										</div>
                                    </div>
                                </div>

                                <div class="tab-pane " id="v-pills-custom_css" role="tabpanel" aria-labelledby="v-pills-custom_css-tab">
                                    <div class="row mb-4">
										<div class="col-lg-12">
											<div class="form-group mb-3">
												<label>Custom CSS</label>
												<textarea id="editor" name="custom_css" class="form-control">{{ get_setting('custom_css') }}</textarea>
											</div>
											<div class="form-group">
												<label for="scripts">Custom JS</label>
												<textarea name="custom_js" class="form-control" id="scripts">{{ get_setting('custom_js') }}</textarea>
											</div>
										</div>
									</div>
                                </div>



                                <div class="tab-pane " id="v-pills-scripts" role="tabpanel" aria-labelledby="v-pills-scripts-tab">
                                    <div class="row mb-4">
										<div class="col-lg-12">
											<div class="form-group">
												<label>Google Analytics *</label>
												<textarea name="google_analytics" class="form-control" id="" placeholder="Google Analytics">{{ get_setting('google_analytics') }}</textarea>
											</div>
											<div class="form-group mt-3">
												<label>Google Adsense Code *</label>
												<textarea name="google_adsense" class="form-control" id="" placeholder="Google Adsense Code">{{ get_setting('google_adsense') }}</textarea>
											</div>
										</div>
									</div>
                                </div>

                                <div class="tab-pane " id="v-pills-footer" role="tabpanel" aria-labelledby="v-pills-footer-tab">
                                    <div class="row mb-4">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="footer_address">Store Address *</label>
												<input type="text" name="footer_address" class="form-control" id="footer_address" placeholder="Store Address" value="{{ get_setting('footer_address') }}">
											</div>
											<div class="form-group mt-3">
												<label for="footer_phone">Store Phone Number *</label>
												<input type="text" name="footer_phone" class="form-control" id="footer_phone" placeholder="Store Phone Number" value="{{ get_setting('footer_phone') }}">
											</div>
											<div class="form-group mt-3">
												<label for="footer_email">Store Email *</label>
												<input type="email" name="footer_email" class="form-control" id="footer_email" placeholder="Store Email" value="{{ get_setting('footer_email') }}">
											</div>
											<div class="form-group mt-3">
												<label for="copy_right">Copyright *</label>
												<textarea name="copy_right" id="copy_right" class="form-control" rows="3" placeholder="Copyright">{{ get_setting('copy_right') }}</textarea>
											</div>

											<div class="form-group mt-3">
												<label for="footer_about">About *</label>
												<textarea name="footer_about" id="footer_about" class="form-control" rows="3" placeholder="About">{{ get_setting('footer_about') }}</textarea>
											</div>
										</div>
									</div>
                                </div>


                                <div class="tab-pane " id="v-pills-socialicons" role="tabpanel" aria-labelledby="v-pills-socialicons-tab">
                                    <div class="row mb-4">
										<div class="col-lg-12">
											
											
											<div class="form-group mb-3">
												<label>Facebook</label>
												<input type="text" class="form-control" name="facebook_url"
												 placeholder="Social Link" value="{{ get_setting('facebook_url') }}">
											</div>
											<div class="form-group mb-3">
												<label>Twitter</label>
												<input type="text" class="form-control" name="twitter_url" placeholder="Social Link" value="{{ get_setting('twitter_url') }}">
											</div>
											<div class="form-group mb-3">
												<label>Instagram</label>
												<input type="text" class="form-control" name="instagram_url" placeholder="Social Link" value="{{ get_setting('instagram_url') }}">
											</div>
											<div class="form-group mb-3">
												<label>Linkedin</label>
												<input type="text" class="form-control" name="linkedin_url" placeholder="Social Link" value="{{ get_setting('linkedin_url') }}">
											</div>
											<div class="form-group mb-3">
												<label>Youtube</label>
												<input type="text" class="form-control" name="youtube_url" placeholder="Social Link" value="{{ get_setting('youtube_url') }}">
											</div>
										</div>

									</div>
                                </div>
                                <div class="form-group ">
                                    <p class="text-end">
                                        <input type="submit" value="Save" class="btn btn-secondary">
                                    </p>
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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.17.6/tagify.min.js"></script>
    <script>
        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('input[name=meta_keywords]');
        // initialize Tagify on the above input node reference
        new Tagify(input)
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.js"
        integrity="sha512-w8mdbtlkBpU0p/dbFb4Oa1Hfd5k2mvOX82w0FnArHOPB28Ixai1Uj68X/3aK+/+35zNbTzBf9OfuSG+XTwnwCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/javascript/javascript.min.js"
        integrity="sha512-DJ/Flq7rxJDDhgkO49H/rmidX44jmxWot/ku3c+XXEF9XFal78KIpu7w6jEaQhK4jli1U3/yOH+Rp3cIIEYFPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const textarea = document.getElementById("editor");
        const textarea1 = document.getElementById("scripts");

        let editor = CodeMirror.fromTextArea(textarea, {
            tabSize: 1,
            theme: 'monokai',
			lineNumbers: true,
        });
        let scripts = CodeMirror.fromTextArea(textarea1, {
            tabSize: 1,
            theme: 'monokai',
			mode: "javascript",
			lineNumbers: true,
        });
		$(document).ready(function() {
			$('.image-upload').on('change', function() {
				const file = this.files[0];
				var blah = $(this).siblings('.image-preview').find('img');
				if(file) {
					let reader = new FileReader();
					reader.onload = function(event){
						//console.log(event.target.result);
						blah.attr("src", event.target.result);
					}
					reader.readAsDataURL(file);
				}
			});
		});
    </script>
@endsection