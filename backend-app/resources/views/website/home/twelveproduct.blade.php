@push('styles')
    <link href="{{asset('css/product.css')}}" rel="stylesheet" >
@endpush




<div class='pro' >
    <h1>المنتجات</h1>

    <div class='products' >

        <div  class='twelveproducts' >

            @foreach($products->slice(0,12) as $product)
                <div   key={key} class="minproduct" >
                    <img src="{{asset($product->image)}}" />
                    <h2>{{$product->title}}</h2>
                    <div>
                        <span class='new-price' >{{$product->price}}</span>
                        <span class="old-price" >{{$product->discount}}</span>
                    </div>
                    <a href="/productdetails/{{$product->id}}" ><button >تفاصيل المنتج</button></a>
                </div>
            @endforeach



        </div>
    </div>
</div>


