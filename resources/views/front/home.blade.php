<x-front-layout title="Home">
    <div id="notify-container" style="
            position: relative;
            z-index: 100;
            opacity: 1;
            transition: opacity 2s ease-in-out; /* يحدث التحول خلال ثانيتين */
        }">
        <x-notify::notify/>
    </div>
<!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            @foreach($products as $product)
                            <div class="single-slider"
                                 style="background-image: url('{{$product->imageurl}}');">
                                <div class="content">
                                    <h2><span>No restocking fee ($35 savings)</span>
                                        {{ $product->name}}
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
                                        labore dolore magna aliqua.</p>
                                    <h3><span>Now Only</span> {{Currency::format($product->price)}}</h3>
                                    <div class="button">
                                        <a href="{{route('product.show',$product->id)}}" class="btn">{{__('Shop Now')}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- End Single Slider -->
                            <!-- Start Single Slider -->

                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                 style="background-image: url('{{asset('assets/images/hero/slider-bnr.jpg')}}');">
                                <div class="content">
                                    <h2>
                                        <span>New line required</span>
                                        iPhone 12 Pro Max
                                    </h2>
                                </div>
                            </div>
                            <!-- End Small Banner -->
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>{{__('Weekly Sale')}}!</h2>
                                    <p>{{__('Saving up to 50% off all online store items this week')}}.</p>
                                    <div class="button">
                                        <a class="btn" href="product-grids.html">{{__('Shop Now')}}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Featured Categories Area -->
    <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{__('Featured Categories')}}</h2>
                        <p>{{__("There are many variations of passages of Lorem Ipsum available, but the majority have")}}
                            {{__('suffered alteration in some form')}}.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($featured as $item)
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category" style="padding: 65px;margin-top: 25px;">
                        <h3 class="heading">{{$item->name}}</h3>
                        <ul>
                            <li><a href="product-grids.html">{{$item->category->name}}</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img src="{{$item->imageurl}}" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Features Area -->

    <!-- Start Trending Product Area -->
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{__('Trending Product')}}</h2>
                        <p>{{__("There are many variations of passages of Lorem Ipsum available, but the majority have")}}
                            {{__('suffered alteration in some form')}}.</p>
                    </div>
                </div>
            </div>
          <livewire:productlist />
        </div>
    </section>
    <!-- End Trending Product Area -->

    <!-- Start Banner Area -->
    <section class="banner section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner" style="background-image:url('{{asset('assets/images/hero/banner-1-bg.jpg')}}')">
                        <div class="content">
                            <h2>Smart Watch 2.0</h2>
                            <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">  {{__('View Details')}}</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner custom-responsive-margin"
                         style="background-image:url('{{asset('assets/images/hero/banner-2-bg.jpg')}}')">
                        <div class="content">
                            <h2>Smart Headphone</h2>
                            <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                incididunt ut labore.</p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">{{__('Shop Now')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Special Offer -->

    <!-- Start Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>{{__('Free Shipping')}}</h5>
                        <span>{{__('On order over $99')}}</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>{{__('24/7 Support')}}.</h5>
                        <span>{{__('Live Chat Or Call')}}.</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>{{__('Online Payment')}}.</h5>
                        <span>{{__('Secure Payment Services')}}.</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>{{__('Easy Return')}}.</h5>
                        <span>{{__('Hassle Free Shopping')}}.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->
    @push('scripts')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                //========= Hero Slider
                tns({
                    container: '.hero-slider',
                    slideBy: 'page',
                    autoplay: true,
                    autoplayButtonOutput: false,
                    mouseDrag: true,
                    gutter: 0,
                    items: 1,
                    nav: false,
                    controls: true,
                    controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
                });

                //======== Brand Slider
                tns({
                    container: '.brands-logo-carousel',
                    autoplay: true,
                    autoplayButtonOutput: false,
                    mouseDrag: true,
                    gutter: 15,
                    nav: false,
                    controls: false,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        540: {
                            items: 3,
                        },
                        768: {
                            items: 5,
                        },
                        992: {
                            items: 6,
                        }
                    }
                });
            });

        </script>
    @endpush

</x-front-layout>
