@push('styles')
    <link href="{{ asset('css/category.css') }}" rel="stylesheet">
@endpush


<div class='cat' >
    <h1 >الاقسام</h1>

    <div class="FiveCategories" >
        @foreach($categories->slice(0,5) as $category)

            <a href="category/{{$category->id}}" class="mincategory" style="text-decoration: none" >
                <img class="category_image" src="{{asset($category->image)}}" />
                <h2 class="category_title" >{{$category->title}}</h2>

            </a>

        @endforeach
    </div>
</div>
