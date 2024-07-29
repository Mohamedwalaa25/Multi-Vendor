<div>
    <div class="row">
        <div id="notify-container" style="
            position: relative;
            z-index: 10;
            opacity: 1;
            transition: opacity 2s ease-in-out; /* يحدث التحول خلال ثانيتين */
        }">
            <x-notify::notify/>
        </div>
        @foreach($products as $product)
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <img src="{{asset($product->image_url)}}" alt="#">
                        @if($product->sale_percent)
                            <span class="sale-tag">-{{$product->sale_percent}}%</span>
                        @endif
                        <div class="button">
                            <i class="btn" wire:click="addToCart({{$product->id}})" class="lni lni-cart"> Add to Cart</i>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">{{$product->category->name}}</span>
                        <h4 class="title">
                            <a href="{{route('product.show',$product->slug)}}">{{$product->name}}</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><span>4.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span> {{Currency::format($product->price)}}</span>
                            @if($product->compare_price)
                                <span class="discount-price">{{Currency::format($product->compare_price)}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
        @endforeach
    </div>

</div>
