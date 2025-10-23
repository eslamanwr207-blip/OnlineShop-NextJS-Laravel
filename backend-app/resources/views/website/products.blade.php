@extends('website.layout.app')


@push('styles')
    <link href="{{asset('css/product.css')}}" rel="stylesheet" >

@endpush

@section('content')

    @include('website.layout.navbar')

    <div class='product' >


        @foreach($products as $product)
            <div  key={key} class="minproduct" style="padding-bottom: 30px">
                <img src="{{asset($product->image)}}" />
                <h2>{{$product->title}}</h2>
                <div>
                    <span class='new-price' >{{$product->price}}</span>
                    <span class="old-price" >{{$product->discount}}</span>
                </div>
{{--                <a><button--}}
{{--                        class="btn btn-primary add-to-cart"--}}
{{--                        data-id="{{$product->id}}"--}}
{{--                        data-title="{{$product->title}}"--}}
{{--                        data-price="{{$product->price}}"--}}
{{--                        data-category="{{$product->category_id}}"--}}
{{--                    >اضافة الى السلة</button></a>--}}

                <a href="/productdetails/{{$product->id}}" ><button >تفاصيل المنتج</button></a>

            </div>

        @endforeach




    </div>

    @push('scripts')
        <script>
            function getCart() {
                return JSON.parse(localStorage.getItem('cart')) || [];
            }

            function saveCart(cart) {
                localStorage.setItem('cart', JSON.stringify(cart));
            }

            function addToCart(product) {
                let cart = getCart();
                const existing = cart.find(item => item.id == product.id);

                if (existing) {
                    existing.quantity += 1;
                } else {
                    product.quantity = 1;
                    cart.push(product);
                }

                saveCart(cart);
                alert("✅ تم إضافة المنتج إلى السلة!");
            }

            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const product = {
                        id: this.dataset.id,
                        title: this.dataset.title,
                        price: parseFloat(this.dataset.price),
                        category_id: this.dataset.category,
                    };

                    addToCart(product);
                });
            });
        </script>
    @endpush


    @include('website.layout.footer')


@endsection
