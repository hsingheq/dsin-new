@extends('admin.layout.dashboard')

@section('page_name')
Product Imports/Exports 
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

    <div class="col-xl-12 col-lg-12 col-md-12">
    
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body pt4">
                <!-- Nested Row within Card Body -->
                <div class="row ">
                    <div class="col-lg-12 mt-5">
                        <form class="admin-form tab-form" action="{{route('admin.product_import')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                       <div class="row">
                                <div class="col-lg-3">
                                    
                                   
                                </div>
                                <div class="col-sm-6">
                                    <div class="row justify-content-center">
                                   
                                                                       
                                        <div class="form-group position-relative ">
                                            <label for="file">Uplaod Your Excel File</label>
                                            <input type="file" class="form-control" name="file" id="file">
                                     
                                        </div>
                                        <div class="form-group d-flex mt-3 justify-content-center">
                                            <button type="submit" class="btn btn-secondary ">Submit</button>
                                        </div>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                        <div class="text-end ">
                                        <a class="btn btn-info btn-sm " href="{{route('admin.product_export')}}" >Export Excel</a>
                                    </div>
                                </div>
                            </div>

                           
                            
                            </form></div>
                            </div>
                           
                        
                           
                    </div>
                </div>
            </div>
        </div>

  @endsection

