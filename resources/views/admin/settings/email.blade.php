@extends('admin.layout.dashboard')
@section('page_name')
    Email
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
				<form action="{{url('/admin/settings/email-update/')}}" method="post">
					@csrf
					<input type="hidden" value="{{$setting->id}}" name="id">
					<div class="row">
						<div class="col-lg-6 mb-3">
							<div class="form-group ">
								<label for="email_host">SMTP Host</label>
								<input type="text" class="form-control" id="email_host" name="email_host" placeholder="Enter SMTP Host" value="{{$setting->email_host}}" required>
							</div>
						</div>
						<div class="col-lg-6 mb-3">
							<div class="form-group">
								<label for="email_port">SMTP Port</label>
								<input type="text" class="form-control " id="email_port" name="email_port" placeholder="Enter SMTP Port" value="{{$setting->email_port}}">
							</div>
						</div>
						<div class="col-lg-6 mb-3">
							<div class="form-group mb-3 ">
								<label for="email_encryption">SMTP Encryption</label>
								<input type="text" class="form-control " id="email_encryption" name="email_encryption" placeholder="Enter SMTP Encryption" value="{{$setting->email_encryption}}">
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-lg-6 mb-3">
							<div class="form-group">
								<label for="email_user">SMTP Username</label>
								<input type="text" class="form-control " id="email_user" name="email_user" placeholder="Enter SMTP Username" value="{{$setting->email_user}}" >
							</div>
						</div>
						<div class="col-lg-6 mb-3">
							<div class="form-group">
								<label for="email_pass">SMTP Password</label>
								<input type="text" class="form-control " id="email_pass" name="email_pass" placeholder="Enter SMTP Password" value="{{$setting->email_pass}}">
							</div>						
						</div>	
					</div>	
					<div class="row">
						<div class="col-lg-6 mb-3">
							<div class="form-group">
								<label for="email_from">Email From</label>
								<input type="text" class="form-control " id="email_from" name="email_from" placeholder="Enter Email From" value="{{$setting->email_from}}" >
							</div>
						</div>
						<div class="col-lg-6 mb-3">
							<div class="form-group">
								<label for="email_from_name">Email From Name</label>
								<input type="text" class="form-control " id="email_from_name" name="email_from_name" placeholder="Enter Email From Name" value="{{$setting->email_from_name}}" >
							</div>
						</div>
					</div>
					<div class="form-group mt-3">
						<p class="text-end"><input type="submit" value="Save" class="btn btn-secondary"></p>
					</div>
                </form>
            </div><!--  end col -->
        </div>
        <!--end row-->
</div>
@endsection
