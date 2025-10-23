@extends('website.layout.app')


@push('styles')
    <link href="{{asset('css/productdetails.css')}}" rel="stylesheet" >
@endpush


@section('content')
    @include('website.layout.navbar')

    <div class="details">
        <h1>تفاصيل المنتج</h1>
        <div class="productdetails">
            <div class="col-6">
                <img src={{asset($product->image)}}  />
            </div>
            <div id="text" class="col-6">
                <h2>{{$product->title}}</h2>
                <div class="prices">
                    <span class="new-price">L.E {{$product->price}}</span>
                    <span class="old-price">L.E {{$product->discount}}</span>
                </div>
                <h3>{{$product->colors}}</h3>
                <h3>{{$product->sizes}}</h3>

                <div>
                    <input
                        id="quantity"
                        type="number"
                        value="1"
                        min="1"
                    />
                    <label> الكمية  :  </label>

                </div>
                <label>الوصف </label>
                <p>{{$product->description}}</p>
            </div>
        </div>
        <button onclick="addToCart({{ $product->id }}, '{{ $product->title }}', {{ $product->price }}, {{ $product->discount }}, '{{ asset($product->image) }} ' , {{$product->category_id}}, {{auth()->user()->id}}) "
                class="add-to-cart-btn">
            🛒 إضافة إلى السلة
        </button>
    </div>


    <script>
        function addToCart(id, title, price, discount, image, category_id, user_id) {
            let quantity = document.getElementById('quantity').value;
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            let existingProduct = cart.find(item => item.id === id);

            if (existingProduct) {
                existingProduct.quantity += parseInt(quantity);
            } else {
                cart.push({
                    id: id,
                    title: title,
                    price: price - (price * discount / 100),
                    quantity: parseInt(quantity),
                    image: image.startsWith('http') ? image : window.location.origin + '/' + image,  // تأكد من أن الصورة تحتوي على مسار مطلق
                    category_id: category_id,
                    user_id: user_id,
                });
            }


            localStorage.setItem('cart', JSON.stringify(cart));
            alert('تمت إضافة المنتج إلى السلة بنجاح!');

            window.location('/products')

        }
    </script>


    @include('website.layout.footer')
@endsection
