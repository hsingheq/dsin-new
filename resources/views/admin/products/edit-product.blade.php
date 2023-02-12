@extends('admin.layout.dashboard')
@section('headerinject')
@endsection
@section('page_name')
    Edit Product
@endsection


@section('content')
    <!--  Form Starts -->
    <form id="choice_form" action="{{ route('admin.update_product') }}" method="post"
        enctype="multipart/form-data" autocomplete="off" >
        @csrf
        <input type="hidden" name="id" value="{{ $product->id; }}">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Product Title</label>
                            <input type="text" class="form-control" id="product_title"  placeholder="product title"
                                name="product_title" required value="{{ $product->product_title }}">

                            <div class="invalid-feedback">Please Enter a product title.</div>
                        </div>
                        <div>
                            <label>Product Description</label>

                            <textarea id="editor" name="product_description" class="form-control">
                                {{ $product->product_description }}
                        </textarea>
                        </div>
                    </div>
                </div>
                <!-- end card -->


            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('Product Images')}}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Gallery Images')}} <small>(600x600)</small></label>


                        <div class="col-md-8">
                            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden"  value="{{ $product->photos }}" name="photos" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            <small class="text-muted">{{translate('These images are visible in product details page gallery. Use 600x600 sizes images.')}}</small>

                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Thumbnail Image')}} <small>(300x300)</small></label>
                        <div class="col-md-8">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" value="{{ $product->thumbnail_img }}" name="thumbnail_img" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            <small class="text-muted">{{translate('This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.')}}</small>
                        </div>
                    </div>
                </div>
            </div>
                <!-- end card -->

              

                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info"
                                    role="tab">
                                    General Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                                    Meta Data
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">

                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                       {{--  <div class="mb-3">
                                            <label class="form-label" for="stocks-input">Product Stocks </label>
                                            <input type="text" class="form-control" value="" name="product_stocks"
                                                id="stocks-input" placeholder="Total in Stocks">
                                            <div class="invalid-feedback">Please Enter product stocks.</div>
                                        </div> --}}
                                        <div class="mb-3">
                                            <label class="form-label" for="stocks-input"> Stocks </label>
                                            <select name="stock_status" id="" class="form-control">
                                                <option value="in stock">In Stock</option>
                                                <option value="out of stock">Out Of Stock</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-price-input">Regular Price</label>
                                            <div class="input-group has-validation mb-3">
                                                <span class="input-group-text" id="">$</span>
                                                <input type="text" class="form-control" id="unit_price"
                                                   name="unit_price"  value="{{ $product->unit_price }}" placeholder="price"
                                                    aria-label="Price" aria-describedby="product-price-addon">

                                            </div>

                                        </div>
                                       
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-price-input">Dealer Price</label>
                                            <div class="input-group has-validation mb-3">
                                                <span class="input-group-text" id="product-price-addon">$</span>
                                                <input type="text" name="product_dealer_price" class="form-control"
                                                    value="{{ $product->product_dealer_price }}" id="product-price-input" placeholder="Dealer price"
                                                    aria-label="Price" aria-describedby="product-price-addon">
                                                <div class="invalid-feedback">Please Enter a product price.</div>
                                            </div>

                                        </div>
                                    </div>
                                  {{--   <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-discount-input">Discount</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="product-discount-addon">%</span>
                                                <input type="text" name="product_discount" class="form-control"
                                                    id="product-discount-input" placeholder="Enter discount"
                                                    value="" aria-label="discount"
                                                    aria-describedby="product-discount-addon">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">SKU*</label>
                                            <div class="input-group mb-3">

                                                <input type="text" class="form-control" id=""
                                                    placeholder="Enter SKU" aria-label="" value=""
                                                    name="product_sku">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-3 col-sm-6">

                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end tab-pane -->

                            <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta-title-input">Meta title</label>
                                            <input type="text" name="product_meta_title" class="form-control"
                                                placeholder="Enter meta title" value="{{ $product->product_meta_title }}" id="meta-title-input" >
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta-keywords-input">Meta Keywords</label>
                                            <input type="text" name="product_meta_keywords"  class="form-control"
                                                value="{{ $product->product_meta_keywords }}" placeholder="Enter meta keywords"
                                                id="meta-keywords-input">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div>
                                    <label class="form-label" for="meta-description-input">Meta Description</label>
                                    <textarea class="form-control" name="product_meta_description" id="meta-description-input"
                                        placeholder="Enter meta description" rows="3">{{ $product->product_meta_description }} </textarea>
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end card body -->
                </div>



                  {{-- start card product variation --}}
                  <div class="card">
                    <div class="card-header">
                        
                        <h5 class="mb-0 h6">{{translate('Product Attributes')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-secondary alert-dismissible alert-solid alert-label-icon fade show" role="alert">
                            <i class="ri-alert-line label-icon"></i><strong>{{ translate('Choose the attributes of this product and then input values of each attribute') }}</strong>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                               <p>{{translate('Attributes')}}</p>
                            </div>
                            <div class="col-md-8">
                                <div class="col-lg-8">
                                    <select name="choice_attributes[]" id="choice_attributes" data-selected-text-format="count" data-live-search="true" class="form-control aiz-selectpicker" multiple data-placeholder="{{ translate('Choose Attributes') }}">
                                        @foreach (\App\Models\Attribute::all() as $key => $attribute)
                                        <option value="{{ $attribute->id }}" @if($product->attributes != null && in_array($attribute->id, json_decode($product->attributes, true))) selected @endif>{{ $attribute->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                               
                            </div>
                        </div>
                        <div>
                            
                            <p class="text-muted"></p>
                            <br>
                        </div>

                        <div class="customer_choice_options" id="customer_choice_options">
                            @foreach (json_decode($product->choice_options) as $key => $choice_option)
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <input type="hidden" name="choice_no[]" value="{{ $choice_option->attribute_id }}">
                                    <input type="text" class="form-control" name="choice[]" value="{{ \App\Models\Attribute::find($choice_option->attribute_id)->name }}" placeholder="{{ translate('Choice Title') }}" disabled>
                                </div>
                                <div class="col-lg-8">
                                    <select class="form-control aiz-selectpicker attribute_choice" data-live-search="true" name="choice_options_{{ $choice_option->attribute_id }}[]" multiple>
                                        @foreach (\App\Models\AttributeOptions::where('attribute_id', $choice_option->attribute_id)->get() as $row)
                                        <option value="{{ $row->value }}" @if( in_array($row->value, $choice_option->values)) selected @endif>
                                            {{ $row->value }}
                                        </option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control aiz-tag-input" name="choice_options_{{ $choice_option->attribute_id }}[]" placeholder="{{ translate('Enter choice values') }}" value="{{ implode(',', $choice_option->values) }}" data-on-change="update_sku"> --}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                            <br>
{{-- for sku combination --}}
                      
                    </div>
                </div>



                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Variation + stock')}}</h5>
                    </div>
                    <div class="card-body">
                       

                        <div class="form-group row">
	                        <label class="col-sm-3 control-label" for="start_date">{{translate('Discount Date Range')}}</label>
	                        <div class="col-sm-9">
                                @php
                                $start_date = date('d-m-Y H:i:s', $product->discount_start_date);
                                $end_date = date('d-m-Y H:i:s', $product->discount_end_date);
                              @endphp
                                <input type="text" class="form-control aiz-date-range" value="{{ $start_date.' to '.$end_date }}" name="date_range" placeholder="Select Date" data-time-picker="true" data-format="DD-MM-Y HH:mm:ss" data-separator=" to " autocomplete="off">
	                        </div>
	                    </div> 

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Discount')}} </label>
                            <div class="col-md-6">
                                <input type="number" lang="en" min="0"  value="{{ $product->discount }}" step="0.01" placeholder="{{ translate('Discount') }}" name="discount" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control " name="discount_type">
                                    <option value="amount" <?php if ($product->discount_type == 'amount') echo "selected"; ?> >{{translate('Flat')}}</option>
                                    <option value="percent" <?php if ($product->discount_type == 'percent') echo "selected"; ?> >{{translate('Percent')}}</option>
                                </select>
                            </div> 
                        </div>

                    
                        <div id="show-hide-div">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Quantity')}} <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="number" lang="en" min="0" value="0" step="1" placeholder="{{ translate('Quantity') }}" name="current_stock" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">
                                    {{translate('SKU')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="{{ translate('SKU') }}" name="sku" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="sku_combination" id="sku_combination">

                        </div>
                    </div>
                </div>

                <div id="response"></div>
                {{-- end of product variation --}}
                <!-- end card -->
                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-secondary w-sm">Update</button>
                </div>
            </div>
            <!-- end col -->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Status</label>

                            <select class="form-select" name="product_status" id="choices-publish-status-input"
                                data-choices data-choices-search-false>
                                <option value="published" selected>Published</option>

                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <div>
                            <label for="choices-publish-visibility-input"class="form-label">Visibility</label>
                            <select class="form-select" name="product_visibility" id="choices-publish-visibility-input"
                                data-choices data-choices-search-false>
                                <option value="Public">Public</option>
                                <option value="Hidden">Hidden</option>
                            </select>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish Schedule</h5>
                    </div>
                    <!-- end card body -->
                    <div class="card-body">
                        <div>
                            <label for="datepicker-publish-input" class="form-label">Select Brands</label>
                            <select name="product_brand" id="" class="form-control">
                                <option value="none">select brand</option>
                                @foreach (\App\Models\Brands::all() as $brand)
                                <option value="{{ $brand->id }}" @if($product->product_brand == $brand->id) selected @endif>{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Categories</h5>
                    </div>
                    <div class="card-body">
                        <div class="">

                            

                            <select name="product_category[]" class="form-control product_id aiz-selectpicker" data-live-search="true" data-selected-text-format="count"  multiple>
                                @foreach(\App\Models\Category::query()->get() as $category)
    
                                @if (is_null($product->category_ids) OR $product->category_ids=="")
    
                                <option value="{{$category->id}}" >{{ $category->category }}</option>
                                @else
                                <option value="{{$category->id}}"  @if(in_array($category->id,json_decode($product->category_ids,true))) selected @endif >{{ $category->category }}</option>
                                @endif
                                    
    
    
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Tags</h5>
                    </div>
                    <div class="card-body">
                        <div class="hstack gap-3 align-items-start">
                            <div class="flex-grow-1">
                                

                                    <select name="product_tags[]" class="form-control product_id aiz-selectpicker" data-live-search="true" data-selected-text-format="count"  multiple>
                                        @foreach(\App\Models\ProductTag::query()->get() as $tag)
                                        @if (is_null($product->tag_ids) OR $product->tag_ids=="")
        
                                        <option value="{{$tag->id}}" >{{ $tag->name }}</option>
                                        @else
                                        <option value="{{$tag->id}}"  @if(in_array($tag->id,json_decode($product->tag_ids,true))) selected @endif >{{ $tag->name }}</option>
                                        @endif
                                           
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Short Description</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2">Add short description for product</p>
                        <textarea class="form-control" name="product_short_description" placeholder="Must enter minimum of a 100 characters"
                            rows="3"></textarea>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </form>
    <!--  Form Ends -->
    
@endsection

@section('scripts')
    <script src="{{ asset('') }}libs/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {


            })
            .catch(error => {
                console.error(error);
            });
    </script>
   

       

      

       
        
      <script type="text/javascript">

      /*   $("[name=shipping_type]").on("change", function (){
            $(".flat_rate_shipping_div").hide();
            
            if($(this).val() == 'flat_rate'){
                $(".flat_rate_shipping_div").show();
            }
    
        }); */
    
        function add_more_customer_choice_option(i, name){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"POST",
                url:'{{ route("admin.add_more_choice_option") }}',
                data:{
                   attribute_id: i
                },
                success: function(data) {
                    var obj = JSON.parse(data);
                    $('#customer_choice_options').append('\
                    <div class="form-group row">\
                        <div class="col-md-3">\
                            <input type="hidden" name="choice_no[]" value="'+i+'">\
                            <input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="{{ translate('Choice Title') }}" readonly>\
                        </div>\
                        <div class="col-md-8">\
                            <select class="form-control aiz-selectpicker attribute_choice" data-live-search="true" name="choice_options_'+ i +'[]" multiple>\
                                '+obj+'\
                            </select>\
                        </div>\
                    </div>');
                    AIZ.plugins.bootstrapSelect('refresh');
               }
           });
    
            
        }
    $(document).ready(function(){
        update_sku();
    });
        /* $('input[name="colors_active"]').on('change', function() {
            if(!$('input[name="colors_active"]').is(':checked')) {
                $('#colors').prop('disabled', true);
                AIZ.plugins.bootstrapSelect('refresh');
            }
            else {
                $('#colors').prop('disabled', false);
                AIZ.plugins.bootstrapSelect('refresh');
            }
            update_sku();
        }); */
    
        $(document).on("change", ".attribute_choice",function() {
            update_sku();
        });
    
        /* $('#colors').on('change', function() {
            update_sku();
        }); */
    
        $('input[name="unit_price"]').on('keyup', function() {
            update_sku();
        });
    
        $('input[name="product_title"]').on('keyup', function() {
            update_sku();
        });
    
        function delete_row(em){
            $(em).closest('.form-group row').remove();
            update_sku();
        }
    
        function delete_variant(em){
            $(em).closest('.variant').remove();
        }
    
        function update_sku(){
         //  $("#response").html("sdf"+$('#choice_form').serialize());
           /*  $.ajax({ */
          // var data = ;
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
               type:"POST",
             url:'{{ url("/admin/products/sku_combination") }}',
             
               data: $('#choice_form').serialize(),
               success: function(data) {
                 console.log('Data received: ');
                console.log(data);
                    $('#sku_combination').html(data);
                    AIZ.uploader.previewGenerate();
                    AIZ.plugins.fooTable();
                    if (data.length > 1) {
                       $('#show-hide-div').hide();
                    }
                    else {
                        $('#show-hide-div').show();
                    }
               }
           }); 
        }
    
        $('#choice_attributes').on('change', function() {
            $('#customer_choice_options').html(null);
            $.each($("#choice_attributes option:selected"), function(){
                add_more_customer_choice_option($(this).val(), $(this).text());
            });
    
            update_sku();
        });
    
    </script>
    @endsection
