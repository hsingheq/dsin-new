@extends('admin.layout.dashboard')

@section('page_name')
Edit Attribute  ({{ $attribute->name }})

@endsection

@section('content')




<!-- end page title -->

<!-- start page title -->
<div class="row">
   
</div>
<!-- end page title -->
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
					   <a href="{{ route('admin.attribute') }}" class="btn btn-secondary">Back</a>					  
				</div>
            </div>
            
            <div class="card-body">
                <form action="{{ route('admin.update_attribute') }}" method="post">
						@csrf
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $attribute->id }}" >
                            <input type="text" name="name" class="form-control" value="{{ $attribute->name }}">
                        </div>

                        <div>
                        <input type="submit" value="Update" class="btn btn-success">

                        </div>
                </form>
                 
                        
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

 
