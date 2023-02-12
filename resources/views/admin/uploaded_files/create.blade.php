@extends('admin.layout.dashboard')
@section('headerinject')
@endsection
@section('page_name')
    Upload File
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Uploads')}}</h5>
		<div class="text-end">
			<a href="{{ route('uploaded-files.index') }}" class="btn btn-link text-reset">
				<i class="las la-angle-left"></i>
				<span>{{translate('Back to uploaded files')}}</span>
			</a>
		</div>
    </div>
    <div class="card-body">
    	<div id="aiz-upload-files" class="h-420px" style="min-height: 65vh">
    		
    	</div>
    </div>
</div>
@endsection

@section('scripts')
	
@endsection