@extends('website.layout.app')

@push('styles')
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
    <link href="{{asset('css/category.css')}}" rel="stylesheet" >
@endpush

@section('content')
    @include('website.layout.navbar')

    <div>
        <div id="mainCarousel" class="carousel slide slider" data-bs-ride="carousel">
            <div class="carousel-inner">
                {{-- الشريحة الأولى --}}
                <div class="carousel-item active" data-bs-interval="1000">
                    <img src="{{ asset('8.jpg') }}" class="d-block w-100" alt="slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>ماذا تنتظر</h3>
                        <p>% هناك خصومات تصل الى 50</p>
                    </div>
                </div>

                {{-- الشريحة الثانية --}}
                <div class="carousel-item" data-bs-interval="500">
                    <img src="{{ asset('11.jpg') }}" class="d-block w-100" alt="slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>ماذا تنتظر</h3>
                        <p>% هناك خصومات تصل الى 50</p>
                    </div>
                </div>

                {{-- الشريحة الثالثة --}}
                <div class="carousel-item">
                    <img src="{{ asset('9.webp') }}" class="d-block w-100" alt="slide 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>ماذا تنتظر</h3>
                        <p>% هناك خصومات تصل الى 50</p>
                    </div>
                </div>
            </div>

            {{-- أزرار التحكم --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">السابق</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">التالي</span>
            </button>
        </div>

    </div>

    @include('website.home.five_category')


    @include('website.home.twelveproduct')
    @include('website.layout.footer')
@endsection
