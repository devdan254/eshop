@php
  $seo = App\Models\Seo::find(1);
@endphp
@extends('frontend.master_dashboard')
@section('main')
@section('title')
{{ $seo->meta_title }}
@endsection
@include('frontend.home.home_slider')
@include('frontend.home.home_features_category')
@include('frontend.home.home_banner') 
@include('frontend.home.home_new_product')
@include('frontend.home.home_features_product')
        <!--End hero slider-->
        
        <!--End category slider-->
        
        <!--End banners-->




        <!--Products Tabs-->




        <!--End Best Sales-->






 <!-- Electronics Category -->
<!-- Electronics Category -->
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>{{ $skip_category_0->category_name }} Category</h3>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach($skip_product_0 as $product)
                    <div class="col-lg-1-5 col-md-4 col-6 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                                        <img class="default-img" src="{{ asset($product->product_thambnail) }}" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" id="{{ $product->id }}" onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="productView(this.id)"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = ($amount / $product->selling_price) * 100;
                            @endphp
                            <div class="product-badges product-badges-position product-badges-mrg">
                                @if($product->discount_price == NULL)
                                <span class="new">New</span>
                                @else
                                <span class="hot">{{ round($discount) }}%</span>
                                @endif
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="#">{{ $product['category']['category_name'] }}</a>
                                </div>
                                <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ Str::limit($product->product_name, 22) }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted">(4.0)</span>
                                </div>
                                <div>
                                    @if($product->vendor_id == NULL)
                                    <span class="font-small text-muted">By <a href="#">Owner</a></span>
                                    @else
                                    <span class="font-small text-muted">By <a href="#">{{ $product['vendor']['name'] }}</a></span>
                                    @endif
                                </div>
                                <div class="product-card-bottom">
                                    @if($product->discount_price == NULL)
                                    <div class="product-price">
                                        <span><small><small>Ksh</small></small> {{ number_format($product->selling_price) }}
                                        </span>
                                    </div>
                                    @else

                                    <div class="product-price">
                                        <span><small><small>Ksh</small></small> {{ number_format($product->discount_price) }}
                                        </span>
                                           <span class="old-price"><small>ksh</small> {{ number_format($product->selling_price) }}
                                           </span>
                                    </div>
                                    @endif
                    <div class="add-cart">
                        <a class="add" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><i class="fi-rs-shopping-cart mr-5"></i></a>
                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Electronics Category -->


 <!-- End Electronics Category -->

<!-- Computer Category -->
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>{{ $skip_category_1->category_name }} Category</h3>
        </div>
        
        <!-- Product Grid -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach($skip_product_1 as $product)
                    <div class="col-lg-1-5 col-md-4 col-6 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            
                            <!-- Product Image -->
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                                        <img class="default-img" src="{{ asset($product->product_thambnail) }}" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" id="{{ $product->id }}" onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="productView(this.id)"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="{{ $product->discount_price ? 'hot' : 'new' }}">
                                        {{ $product->discount_price ? round(($product->selling_price - $product->discount_price) / $product->selling_price * 100) . '%' : 'New' }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Product Content -->
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="#">{{ $product['category']['category_name'] }}</a>
                                </div>
                                <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ Str::limit($product->product_name, 22) }}</a></h2>
                                
                                <!-- Product Rating -->
                                @php
                                    $reviewcount = App\Models\Review::where('product_id', $product->id)->where('status', 1)->latest()->get();
                                    $average = App\Models\Review::where('product_id', $product->id)->where('status', 1)->avg('rating');
                                @endphp
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        @if($average > 0)
                                            <div class="product-rating" style="width: {{ ($average / 5) * 100 }}%"></div>
                                        @endif
                                    </div>
                                    <span class="font-small ml-5 text-muted">({{ count($reviewcount) }})</span>
                                </div>
                                
                                <!-- Vendor Info -->
                                <div>
                                    <span class="font-small text-muted">By <a href="#">{{ $product->vendor_id ? $product['vendor']['name'] : 'Owner' }}</a></span>
                                </div>
                                
                                <!-- Product Pricing -->
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span><small><small>Ksh</small></small> {{ number_format($product->discount_price) ?? number_format($product->selling_price) }}</span>
                                        @if($product->discount_price)
                                            <span class="old-price"><small><small>Ksh</small></small>{{ number_format($product->selling_price) }}</span>
                                        @endif
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><i class="fi-rs-shopping-cart mr-5"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Product Grid -->
    </div>
</section>
<!-- End Computer Category -->















        <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
                        <div class="product-list-small animated animated">
                            @foreach($hot_deals as $item)                   
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><img src="{{ asset( $item->product_thambnail ) }}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"> {{ $item->product_name }} </a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                     @if($item->discount_price == NULL)
                                             <div class="product-price">
                                                <span>Ksh {{  number_format($item->selling_price) }}</span>
                        
                                            </div>
                        
                                            @else
                                            <div class="product-price">
                                                <span>Ksh {{  number_format($item->discount_price) }}</span>
                                                <span class="old-price">Ksh {{  number_format($item->selling_price) }}</span>
                                            </div>
                                            @endif
                                </div>
                            </article>
                            @endforeach
                            
                            
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="section-title style-1 mb-30 animated animated">  Special Offer </h4>
                        <div class="product-list-small animated animated">
                            
      @foreach($special_offer as $item)                   
      <article class="row align-items-center hover-up">
          <figure class="col-md-4 mb-0">
              <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><img src="{{ asset( $item->product_thambnail ) }}" alt="" /></a>
          </figure>
          <div class="col-md-8 mb-0">
              <h6>
                  <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"> {{ $item->product_name }} </a>
              </h6>
              <div class="product-rate-cover">
                  <div class="product-rate d-inline-block">
                      <div class="product-rating" style="width: 90%"></div>
                  </div>
                  <span class="font-small ml-5 text-muted"> (4.0)</span>
              </div>
               @if($item->discount_price == NULL)
                       <div class="product-price">
                          <span>Ksh {{  number_format($item->selling_price) }}</span>
  
                      </div>
  
                      @else
                      <div class="product-price">
                          <span>Ksh {{  number_format($item->discount_price) }}</span>
                          <span class="old-price">Ksh {{  number_format($item->selling_price) }}</span>
                      </div>
                      @endif
          </div>
      </article>
      @endforeach
                            
                            
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                        <div class="product-list-small animated animated">
                            @foreach($new as $item)                   
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><img src="{{ asset( $item->product_thambnail ) }}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"> {{ $item->product_name }} </a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                     @if($item->discount_price == NULL)
                                             <div class="product-price">
                                                <span>Ksh {{  number_format($item->selling_price) }}</span>
                        
                                            </div>
                        
                                            @else
                                            <div class="product-price">
                                                <span>Ksh {{ number_format($item->discount_price) }}</span>
                                                <span class="old-price">Ksh {{  number_format($item->selling_price) }}</span>
                                            </div>
                                            @endif
                                </div>
                            </article>
                            @endforeach
                            
                            
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
                        <div class="product-list-small animated animated">
                            @foreach($special_deals as $item)                   
    <article class="row align-items-center hover-up">
        <figure class="col-md-4 mb-0">
            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><img src="{{ asset( $item->product_thambnail ) }}" alt="" /></a>
        </figure>
        <div class="col-md-8 mb-0">
            <h6>
                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"> {{ $item->product_name }} </a>
            </h6>
            <div class="product-rate-cover">
                <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: 90%"></div>
                </div>
                <span class="font-small ml-5 text-muted"> (4.0)</span>
            </div>
             @if($item->discount_price == NULL)
                     <div class="product-price">
                        <span>Ksh {{  number_format($item->selling_price) }}</span>

                    </div>

                    @else
                    <div class="product-price">
                        <span>Ksh {{  number_format($item->discount_price) }}</span>
                        <span class="old-price">Ksh {{  number_format($item->selling_price) }}</span>
                    </div>
                    @endif
        </div>
    </article>
    @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End 4 columns-->









  <!--Vendor List -->


@include('frontend.home.home_vendor')

 <!--End Vendor List -->

@endsection
