@extends('website.layout.app')

@push('styles')
    <link href="{{ asset('css/category.css') }}" rel="stylesheet">



@endpush

@section('content')
    @include('website.layout.navbar')

    <div>
        <div class='categories' >

            @foreach($categories as $category)

                <a href="category/{{$category->id}}" class="mincategory" style="text-decoration: none" >
                    <img class="category_image" src="{{asset($category->image)}}" />
                    <h2 class="category_title" >{{$category->title}}</h2>

                </a>

            @endforeach







        </div>
    </div>


    @include('website.layout.footer')
@endsection


