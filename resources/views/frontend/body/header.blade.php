@php
$setting = App\Models\SiteSetting::find(1);
        @endphp
<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>

                            <li><a href="{{ route('mycart') }}">My Cart</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>100% Secure delivery without contacting the courier</li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>

            <li>
                <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
               
            </li>

             <li>Support Center : <strong class="text-brand">{{ $setting->support_phone }}</strong></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="/"><img src="{{ asset($setting->logo)   }}" alt="logo" /></a>
                </div>
<div class="header-right">
    <div class="search-style-2">
        <form action="{{ route('product.search') }}" method="post">
            @csrf

            <select class="select-active">
                <option selected > All Categories</option>
                
            </select>
            <input name="search" id="search" placeholder="Search for items..." />
            <div id="searchProducts"></div>
        </form>
    </div>
    <div class="header-action-right">
        <div class="header-action-2">
            

            <div class="header-action-icon-2">
                <a href="{{ route('compare') }}">
                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-compare.svg')}}" />
                </a>
                <a href="{{ route('compare') }}"><span class="lable ml-0">Compare</span></a>
            </div>
            <div class="header-action-icon-2">
                <a>
                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                    <span class="pro-count blue" id="wishQty">0 </span>
                </a>
                <a href="{{ route('wishlist') }}"><span class="lable">Wishlist</span></a>
            </div>



            <div class="header-action-icon-2">
                <a class="mini-cart-icon" href="shop-cart.html">
                    <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                    <span class="pro-count blue" id="cartQty">0</span>
                </a>
                <a href="{{ route('mycart') }}"><span class="lable">Cart</span></a>
                <div class="cart-dropdown-wrap cart-dropdown-hm2">

                   <div id="miniCart">




                   </div>

                   
                    <div class="shopping-cart-footer">
                        <div class="shopping-cart-total">
                            <h4>Total Ksh<span id="cartSubTotal"></span></h4>
                        </div>
                        <div class="shopping-cart-button">
                            <a href="{{ route('mycart') }}" class="outline">View cart</a>
                            
                        </div>
                                    </div>
                                </div>
                            </div>



                            
                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                </a>
                              
                                @auth
                                    
                                 <a href="{{ route('dashboard') }}"><span class="lable ml-0">Account</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                        </li>
                                    </ul>
                                </div>

                                @else
                                <a href="{{ route('login') }}"><span clsass="lable ml-0">Login</span></a>

                                <span class="lable" style="margin-left: 2px; margin-right: 2px;" > | </span>
                              
                              
                               <a href="{{ route('register') }}"><span class="lable ml-0">Register</span></a>
                                @endauth



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    @php
    $categories = App\Models\Category::orderBy('category_name','ASC')->get();
        @endphp


    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="/"><img src="{{ asset($setting->logo)   }}" alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span>   All Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @foreach($categories as $item)
                                    @if($loop->index < 5)
                                <li>
                                    <a href="{{ url('product/category/'.$item->id.'/'.$item->category_slug) }}"> <img src="{{ asset( $item->category_image ) }}" alt="" /> {{ $item->category_name }} </a>
                                </li>
                                @endif
                               @endforeach
                                   
                                </ul>
                                <ul class="end">
                                    @foreach($categories as $item)
                                    @if($loop->index > 4)
                                   <li>
                                       <a href="shop-grid-right.html"> <img src="{{ asset( $item->category_image ) }}" alt="" /> {{ $item->category_name }} </a>
                                       <a href="{{ url('product/category/'.$item->id.'/'.$item->category_slug) }}"> <img src="{{ asset( $item->category_image ) }}" alt="" /> {{ $item->category_name }} </a>
                                   </li>
                                     @endif
                                  @endforeach
                       
                                </ul>
                            </div>
                           
                           
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>

                                <li>
                                    <a class="active" href="{{ url('/') }}">Home  </a>

                                </li>
                                <li>
                                    <a href="{{ route('shop.page') }}">Shop</a>
                                </li>
                                
                               
                                @php
                                $categories = App\Models\Category::orderBy('category_name','ASC')->limit(6)->get();
                                    @endphp
                            
                                   @foreach($categories as $category)   
                                <li>
                                    <a href="{{ url('product/category/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }} <i class="fi-rs-angle-down"></i></a>

                                    @php 
                                    $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                        @endphp
                                    <ul class="sub-menu">

                                        @foreach($subcategories as $subcategory)   
                                        <li><a href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a></li>
                @endforeach
                                       
                                    </ul>
                                </li>
                                @endforeach
                                
            <li>
                <a href="{{ route('home.blog') }}">Blog</a>
            </li>
        </ul>
    </nav>
</div>
</div>


<div class="hotline d-none d-lg-flex">
<img src="{{ asset('frontend/assets/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
<p>{{ $setting->support_phone }}<span>24/7 Support Center</span></p>
</div>
<div class="header-action-icon-2 d-block d-lg-none">
<div class="burger-icon burger-icon-white">
    <span class="burger-icon-top"></span>
    <span class="burger-icon-mid"></span>
    <span class="burger-icon-bottom"></span>
</div>
</div>
<div class="header-action-right d-block d-lg-none">
<div class="header-action-2">
    <div class="header-action-icon-2">
        <a href="{{ route('wishlist') }}">
            <img alt="G-Mart" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
            <span class="pro-count white" id="MwishQty">0</span>
        </a>
    </div>
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" href="{{ route('mycart') }}">
            <img alt="G-Mart" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
            <span class="pro-count white">0</span>
        </a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <div id="MminiCart">




            </div>

            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>Total Ksh<span id="McartSubTotal">0</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="{{ route('mycart') }}">View cart</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--mobile header -->


<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="/"><img src="{{ asset($setting->logo)   }}" alt="G-Mart" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="/">Home</a>

                        </li>
                       
                        <li class="menu-item-has-children">
                            <a href="{{ route('shop.page') }}">Shop</a>

                        </li>

                        <li class="menu-item-has-children">
                            <a href="{{ route('shop.page') }}">All Categories</a>
                            <ul class="dropdown">
                                @foreach($categories as $category) 

                                <li class="menu-item-has-children">
                                    <a href="{{ url('product/category/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }} </a>

                                    
                                    <ul class="dropdown">
                                        @php 
                                    $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                        @endphp
                                         @foreach($subcategories as $subcategory)   
                                         <li><a href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a></li>
                 @endforeach
                                    </ul>
                                </li>
                                
                                @endforeach
                            </ul>
                        </li>

                        
                        <li class="menu-item-has-children">
                            <a href="{{ route('home.blog') }}">Blog</a>

                        </li>
                        
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
              
                @auth
                <nav class="mb-3">
                    <ul class="mobile-menu">
                <li class="menu-item-has-children">
                   <a href="#" class="text-dark"><h6>User Account </h6></a>
                    <ul class="dropdown">
                        <li class="text-dark">
                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                        </li>
                        <li class="text-dark">
                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                        </li>
                        <li class="text-dark">
                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                        </li>
                        <li class="text-dark">
                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                        </li>
                        <li class="text-dark">
                            <a href="{{ route('dashboard') }}"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                        </li>
                        <li class="text-dark">
                            <a href="{{ route('user.logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                        </li>
                    </ul>
                </li>

                    </ul>
                </nav>
                @else
                <div class="single-mobile-header-info">
                    <a href="{{ route('login') }}"><i class="fi-rs-user"></i>Login / Register</a>
                </div>
                @endauth
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>{{ $setting->support_phone }}</a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="{{ $setting->facebook }}"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>
                <a href="{{ $setting->twitter }}"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg') }}" alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-pinterest-white.svg') }}" alt="" /></a>
                <a href="{{ $setting->youtube }}"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg') }}" alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2024 ©G-Mart Market Place. All rights reserved. Powered by <a href="https://techrandevelopers.com/">TechRan Developers</a></div>
        </div>
    </div>
</div>

<style>
    #searchProducts{
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }
</style>

<script>
    function search_result_show(){
        $("#searchProducts").slideDown();
    }
    function search_result_hide(){
        $("#searchProducts").slideUp();
    }
</script>