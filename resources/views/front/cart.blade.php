<x-front-layout title="Cart">
    <!-- Start Breadcrumbs -->
    <x-slot name="breadcrumb">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Cart</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                            <li><a href="{{route('product.index')}}">Shop</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
  <livewire:cartdetails />

    <!--/ End Shopping Cart -->

    @push('scripts')
        <script>
            const csrf_token ="{{csrf_token()}}";
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('js/carts.js')}}"></script>

    @endpush
    @vite('resources/js/cart.js')


</x-front-layout>
