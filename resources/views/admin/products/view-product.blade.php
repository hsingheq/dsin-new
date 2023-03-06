@extends('admin.layout.dashboard')
@section('headerinject')
@endsection
@section('page_name')
View Product  
@endsection
  

@section('content')
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


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @php 
                   // print_r($product);
                    $images = array();
                    $thumbnail = $product->thumbnail_img;
                    if($thumbnail) {
                        $images[] =  $thumbnail;
                    }
                    $photos = $product->photos;
                    if($photos) {
                        $photos = explode(",",$photos);
                        foreach($photos as $photo) {
                            $images[] =  $photo;
                        }
                    }
                    @endphp
                    <div class="row gx-lg-5">
                        <div class="col-xl-4 col-md-8 mx-auto">
                            <div class="product-img-slider sticky-side-div">
                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                                    <div class="swiper-wrapper" id="swiper-wrapper-e1520a65a51f2112" aria-live="polite" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                                        @foreach($images as $slide)
                                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 4" style="width: 352px; margin-right: 24px;">

                                            <img src="{{ get_uploaded_image_url($slide) }}" alt="" class="img-fluid d-block">
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-e1520a65a51f2112" aria-disabled="false"></div>
                                    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-e1520a65a51f2112" aria-disabled="true"></div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                                <!-- end swiper thumbnail slide -->
                                <div class="swiper product-nav-slider mt-2 swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-watch-progress swiper-backface-hidden swiper-thumbs">
                                    <div class="swiper-wrapper" id="swiper-wrapper-c554718e8cff8e0d" aria-live="polite" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">


                                    @foreach($images as $slide)
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active" role="group" aria-label="1 / 4" style="width: 84.5px; margin-right: 10px;">
                                            <div class="nav-slide-item ">
                                                <img src="{{ get_uploaded_image_url($slide) }}" alt="" class="img-fluid d-block">
                                            </div>
                                        </div>
                                       @endforeach 
                                       



                                       {{--  <div class="swiper-slide swiper-slide-visible swiper-slide-next" role="group" aria-label="2 / 4" style="width: 84.5px; margin-right: 10px;">


                                            <div class="nav-slide-item">
                                                <img src="{{asset('images/uploads/products/'.$product->product_image)}}" alt="" class="img-fluid d-block">
                                            </div>
                                        </div>


                                        <div class="swiper-slide swiper-slide-visible" role="group" aria-label="3 / 4" style="width: 84.5px; margin-right: 10px;">
                                            <div class="nav-slide-item">
                                                <img src="{{asset('images/uploads/products/'.$product->product_image)}}" alt="" class="img-fluid d-block">
                                            </div>
                                        </div>



                                        <div class="swiper-slide swiper-slide-visible" role="group" aria-label="4 / 4" style="width: 84.5px; margin-right: 10px;">
                                            <div class="nav-slide-item">
                                                <img src="{{asset('images/uploads/products/'.$product->product_image)}}" alt="" class="img-fluid d-block">
                                            </div>
                                        </div>
 --}}


                                    </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                                <!-- end swiper nav slide -->
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-8">
                            <div class="mt-xl-0 mt-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h4>{{$product->product_title}}</h4>
                                        <div class="hstack gap-3 flex-wrap">
                                           
                                            <div><a href="#" class="text-primary d-block">
                                                @if($product->product_status=="published")
                                                <span class="badge badge-soft-success text-uppercase">{{$product->product_status}}</span>
                                                @else
                                                <span class="badge badge-soft-warning text-uppercase">{{$product->product_status}}</span>
                                                    @endif
                                               </a></div>

                                            <div class="vr"></div>
                                            @if($product->product_visibility=="Public")
                                                <span class="badge badge-soft-success text-uppercase">{{$product->product_visibility}}</span>
                                                @else
                                                <span class="badge badge-soft-warning text-uppercase">{{$product->product_visibility}}</span>
                                                    @endif
                                            <div class="vr"></div>
                                          
                                               
                                            
                                            <div class="text-muted">Published : <span class="text-body fw-medium">{{\Carbon\Carbon::parse($product->created_at)->format('d M y')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div>
                                            <a href="{{ url('admin/products/edit-product/'.$product->id )}}" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                                    <div class="text-muted fs-16">
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                    </div>
                                    <div class="text-muted">( 5.50k Customer Review )</div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="ri-money-dollar-circle-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1"> Price :</p>
                                                    <h5 class="mb-0">{{$product->unit_price." ".get_setting('currency_direction')}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="ri-file-copy-2-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Dealer Price:</p>
                                                    <h5 class="mb-0">{{$product->product_dealer_price}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="ri-stack-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1"> Stocks Status:</p>
                                                    <h5 class="mb-0">@if($product->stock_status=="in stock")
                                                        <span class="badge badge-soft-success text-uppercase">{{$product->stock_status}}</span>
                                                        @else
                                                        <span class="badge badge-soft-danger text-uppercase">{{$product->stock_status}}</span>
                                                            @endif</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="ri-inbox-archive-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Total Stocks:</p>
                                                    <h5 class="mb-0">
                                                        @php
                                                            $qty = 0;
                                                            foreach( $product_variations as $key=>$stock){
                                                                $qty += $stock->qty; 
                                                            }   
                                                            @endphp
                                                     {{  $qty }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class=" mt-4">
                                            <h5 class="fs-15">Variations:</h5>
                                            <div class="d-flex flex-wrap gap-2">
                                                @if($product_variations)
                                                    @foreach ($product_variations as $variation )
                                                        <span class="badge rounded-pill text-bg-success">{{ $variation->variant }}</span>                                              
                                                    @endforeach   
                                                @else
                                                    {{ "N/A"}}
                                                @endif    
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->

                                 {{--    <div class="col-xl-6">
                                        <div class=" mt-4">
                                            <h5 class="fs-15">Colors :</h5>
                                            <div class="d-flex flex-wrap gap-2">
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Out of Stock">
                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-primary" disabled="">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="03 Items Available">
                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-secondary">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="03 Items Available">
                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-success">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="02 Items Available">
                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-info">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="01 Items Available">
                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-warning">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="04 Items Available">
                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-danger">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="03 Items Available">
                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-light">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="04 Items Available">
                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-dark">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="mt-4 text-muted">
                                    <h5 class="fs-15">Description :</h5>
                                    {!!$product->product_description!!}
                                </div>

                                


                                <div class="product-content mt-5">
                                    <h5 class="fs-15 mb-3">Product Description :</h5>
                                    <nav>
                                        <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci" role="tab" aria-controls="nav-speci" aria-selected="true">Specification</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false" tabindex="-1">Details</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                        <div class="tab-pane fade active show" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" style="width: 200px;">Category</th>
                                                            <td>
                                                            @php
                                                                $categories = $product->product_category;
                                                                $categories = json_decode($categories);
                                                                $cats= array();
                                                            @endphp
                                                                @if($categories) 
                                                                    @foreach($categories as $category) 
                                                                        @php
                                                                            $c = get_product_category_by_id($category);
                                                                            $cats[] = $c->category;
                                                                        @endphp
                                                                    @endforeach
                                                                    @php
                                                                        echo join(", ", $cats);
                                                                    @endphp
                                                                @else
                                                                    {{ "N/A" }}    
                                                                @endif    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Brand</th>
                                                            <td>
                                                                @php
                                                                    $brand = get_product_brand_by_id($product->product_brand);
                                                                @endphp
                                                                @if($brand)    
                                                                    {{ $brand->brand }}
                                                                @else 
                                                                    {{ "N/A" }}    
                                                                @endif
                                                            </td>
                                                        </tr>
                                                       <!-- <tr>
                                                            <th scope="row">Color</th>
                                                            <td>Blue</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Material</th>
                                                            <td>Cotton</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Weight</th>
                                                            <td>140 Gram</td>
                                                        </tr>-->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                                            <div>
                                                <h5 class="mb-3">{{$product->product_title}}</h5>
                                                <p>{!!$product->product_short_description!!}</p>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-content -->

                               
                                <!-- end card body -->
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>



@endsection

@section('scripts')
<script src="{{asset('')}}libs/ckeditor/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
           
            
        } )
        .catch( error => {
            console.error( error );
        } );

        
</script>
<script src="{{asset('')}}js/custom.js"></script>

<script>
$(document).on('change','#gallery_file',function(){

        
for(let i=0;i<this.files.length;++i){
    let filereader = new FileReader();
   
    filereader.onload = function(){
     
        let xxx =`<div class="single-g-item d-inline-block m-2">
                    <span 
                     class="remove-gallery-img">
                        <i class="ri-delete-bin-2-line reader_file_remove"></i>
                    </span>
                    <a class="popup-link" href="${this.result}">
                        <img class="admin-gallery-img" src="${this.result}"
                            alt="No Image Found">
                    </a>
            </div>
        
    `;
    $(".gallery_image_view").append(xxx);
    };
    filereader.readAsDataURL(this.files[i]);
}


})
</script>

<noscript>
    $("#files").on("change", "input", function(event){
    $('#files').append('<input type="file" name="product_gallery[]" accept="image/*" class="form-control " multiple=""  placeholder="choose image" aria-label="File browser example"  id="gallery_file">');
    
});
</noscript>

<script>
var productNavSlider=new Swiper(".product-nav-slider",{loop:!1,spaceBetween:10,slidesPerView:4,freeMode:!0,watchSlidesProgress:!0}),productThubnailSlider=new Swiper(".product-thumbnail-slider",{loop:!1,spaceBetween:24,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},thumbs:{swiper:productNavSlider}});
</script>

@endsection