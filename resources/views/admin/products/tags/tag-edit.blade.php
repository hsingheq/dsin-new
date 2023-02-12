@extends('admin.layout.dashboard')
@section('page_name')
Edit Product Tag 
@endsection
@section('content')
@if(Session::has('succed'))
<div class="alert alert-success"><strong>{{Session::get('succed')}}</strong></div>
@endif

@if(Session::has('fail'))
<div class="alert alert-danger"><strong>{{Session::get('fail')}}</strong></div> 
@endif
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <strong>{{$error}}</strong><br>
    @endforeach
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        
        <div class="card" id="customerList">
            <div class="card-header ">
				<h5 class="card-title mb-0">@yield('page_name') </h5>	
                <div class="text-end">
					<a href="{{ route('admin.product.tag') }}" class="btn btn-secondary">All Tags</a>					  
				</div>
            </div>
            
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-5">
							<form action="{{ route('admin.product.update_tag') }}" method="post">
								@csrf
								<div class="form-group">
									<input type="hidden" name="id" value="{{ $tag->id }}" >
									<label for="">Tag Name</label>
									<input type="text" name="name" class="form-control" value="{{ $tag->name }}">								 
								</div>
								<div class="form-group">
									<label for="">Tag Slug</label>
									<input type="text" name="slug" class="form-control" value="{{ $tag->slug }}">
								</div>
								<div>
									<input type="submit" value="Update" class="btn btn-success">
								</div>
							</form>


                        </div>
                    </div>
                </div>
               
                 
                        
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->

</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->

  @endsection

 
