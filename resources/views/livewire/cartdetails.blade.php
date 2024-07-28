<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="cart-list-head">
            <!-- Cart List Title -->
            <div class="cart-list-title">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-12"></div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <p>Product Name</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Quantity</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Subtotal</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Discount</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <p>Remove</p>
                    </div>
                </div>
            </div>
            <!-- End Cart List Title -->

            <!-- Cart Single List -->
            @foreach($cart as $item)
                <div class="cart-single-list" id="item-{{$item->id}}">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="{{ route('product.show', $item->product->slug) }}">
                                <img src="{{ $item->product->image_url }}" alt="Product Image">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name">
                                <a href="{{ route('product.show', $item->product->slug) }}">
                                    {{ $item->product->name }}
                                </a>
                            </h5>
                            <p class="product-des">
                                <span><em>Type:</em> Mirrorless</span>
                                <span><em>Color:</em> Black</span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="quantity-controls d-flex justify-center md:justify-end">
                                <div class="quantity-wrapper w-100 d-flex align-items-center">
                                    <button class="decrement-btn bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 rounded-l cursor-pointer" wire:click.prevent="decrementQty({{ $item->id }})">
                                        <span class="m-auto text-2xl font-thin">−</span>
                                    </button>
                                    <span class="quantity-display p-2">{{ $item->quantity }}</span>
                                    <button class="increment-btn bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 rounded-r cursor-pointer" wire:click="incrementQty({{ $item->id }})">
                                        <span class="m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{ Currency::format($item->quantity * $item->product->price) }}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>$0</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a href="javascript:void(0)" wire:click="delete_item('{{ $item->id }}')" class="remove"
                               title="Remove this item"><i class="lni lni-close"></i></a>


                        </div>
                    </div>
                </div>
            @endforeach
            <!-- End Cart Single List -->

            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" method="POST">
                                            <input name="coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn" type="submit">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal <span>{{ Currency::format($total) }}</span></li>
                                        <li>Shipping <span>Free</span></li>
                                        <li class="last">You Pay <span>{{ Currency::format($total) }}</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="checkout.html" class="btn">Checkout</a>
                                        <a href="product-grids.html" class="btn btn-alt">Continue Shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Total Amount -->
                </div>
            </div>
        </div>
    </div>
</div>
