@extends('website.layout.app')
<meta name="csrf-token" content="{{ csrf_token() }}">

@push('styles')
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">

    <style>
        #form{
            margin-bottom: 5px;
        }
    </style>
@endpush

@section('content')
    @include('website.layout.navbar')

    <div class="products">
        <div id="cartBody" class="products"></div>

        <p id="emptyCartMessage" style="text-align: center; font-size: 18px; display: none;">
            🛍️ سلتك فارغة! أضف منتجات لعرضها هنا.
        </p>
    </div>

    <script>
        function renderCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartBody = document.getElementById("cartBody");
            let emptyMessage = document.getElementById("emptyCartMessage");

            cartBody.innerHTML = "";

            if (cart.length === 0) {
                emptyMessage.style.display = "block";
                return;
            } else {
                emptyMessage.style.display = "none";
            }

            cart.forEach((item, index) => {
                let row = `
                    <div class="product">
                        <img src="${item.image}" alt="صورة المنتج">
                        <h2 class="product-title">${item.title}</h2>

                        <div class="price-cart">
                            <span class="price">${item.price}</span>
                            <span class="quantity">الكمية: ${item.quantity}</span>
                            <span class="total">الإجمالي: ${(parseFloat(item.price) * item.quantity).toFixed(2)}</span>
                        </div>

                        <div class="hr"></div>

                        <button id="cart_button" class="btn btn-danger" onclick="removeFromCart(${index})">🗑️ حذف</button>

                        <button id="cart_button" class="btn btn-primary" onclick='sendOrder(${JSON.stringify(item)}, ${index})'>
                            إتمام الشراء
                        </button>
                    </div>
                `;
                cartBody.insertAdjacentHTML('beforeend', row);
            });
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
        }

        function sendOrder(item, index) {
            let parsedQuantity = parseInt(item.quantity) || 1;
            let parsedPrice = parseFloat(item.price) || 0;
            let total = (parsedPrice * parsedQuantity).toFixed(2);

            let data = {
                id: item.id,
                title: item.title.trim(),
                price: parsedPrice,
                quantity: parsedQuantity,
                total: total,
                category_id: item.category_id || null,
                user_id: item.user_id || null
            };

            console.log("📢 Data being sent:", data);

            fetch("{{ route('products.order') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').getAttribute("content")
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(responseData => {
                    console.log("✅ Response Data:", responseData);
                    if (responseData.error) {
                        console.error("🚨 Error:", responseData.error);
                    } else {
                        alert("🎉 تم إرسال الطلب بنجاح!");
                        removeFromCart(index); // حذف بناءً على index الصحيح
                    }
                })
                .catch(error => {
                    console.error("⚠️ خطأ في إرسال الطلب:", error);
                });
        }

        document.addEventListener("DOMContentLoaded", renderCart);
    </script>

    @include('website.layout.footer')
@endsection
