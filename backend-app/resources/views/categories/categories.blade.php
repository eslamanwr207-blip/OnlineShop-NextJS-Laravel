@extends('dashboard.layouts.main_sidebar')
@push('styles')
    <link href="{{asset('css/category')}}" rel="stylesheet"  >


    <style>
        .cat h1{
            text-align: end;
            margin: 30px;
            font-size: 40px;
            color: black;
        }



        .categories{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;




        }

        .FiveCategories{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 0px;
        }

        .mincategory{
            margin: 20px;
        }
        .mincategory img{
            border: 20px solid #0d6efd;
            width: 200px;
            height: 200px;
            border-radius: 100%;
            object-fit: cover;
        }

        .mincategory h2{
            font-size: 20px;
            text-align: center;
            text-decoration: none;
            color: black;
        }



        @media screen and (min-width:436px) and (max-width:635px){



            .cat h1{
                margin: 20px;
                font-size: 33px;
            }



            .categories{
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 20px;


            }

            .FiveCategories{
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 20px;
                margin-top: 0px;
            }

            .mincategory{
                margin: 10px;
                text-align: center;
            }


            .mincategory img{
                border: 20px solid #0d6efd;
                width: 170px;
                height: 170px;
                border-radius: 100%;
                object-fit: cover;
            }

            .mincategory h2{
                margin-top: 5px;
                font-size: 18px;
                text-align: center;
                text-decoration: none;
                color: black;
            }
        }


        @media screen and (min-width:366px) and (max-width:436px){
            .cat h1{
                margin: 10px;
                font-size: 27px;
            }

            .categories{
                gap: 10px;


            }

            .FiveCategories{
                gap: 10px;
                margin-top: 0px;
            }

            .mincategory{
                margin: 5px;
            }


            .mincategory img{
                width: 160px;
                height: 160px;
            }

            .mincategory h2{
                margin-top: 5px;
                font-size: 18px;
            }
        }


        @media screen and (min-width:300px) and (max-width:366px){
            .cat h1{
                margin: 10px;
                font-size: 27px;
            }

            .categories{
                gap: 10px;


            }

            .FiveCategories{
                gap: 10px;
                margin-top: 0px;
            }

            .mincategory{
                margin: 5px;
            }


            .mincategory img{
                width: 130px;
                height: 130px;
            }

            .mincategory h2{
                margin-top: 5px;
                font-size: 17px;
            }
        }


        #cart_button{
            width: 100%;
            margin: 4px 0;
        }

        .hr{
            background: #989898;
            height: 1px;
            margin: 5px 0;
        }


        @media screen and (min-width:0px) and (max-width:600px){
            #cart_button{
                width: 100%;
                margin: 4px 0;
            }
        }


    </style>
@endpush



@section('content')
    <!-- row -->
    <div class="row">


        @if(session()->has('Add'))
            <h1>{{session()->get("Add")}}</h1>
        @endif
        @if(session()->has('Error'))
            <h1>{{session()->get("Error")}}</h1>
        @endif
        <div class="container">
            <br/>
            <h2 class="mb-4" style="text-align: right" >إدارة الاقسام</h2>

            <div class='categories' >

                @foreach($categories as $category)

                    <a class="mincategory" style="text-decoration: none" >
                        <img class="category_image" src="{{asset($category->image)}}" />
                        <h2 class="category_title" >{{$category->title}}</h2>


                        <div class="hr"></div>


                        <button id="cart_button" class="btn btn-primary"
                            data-pro_id="{{$category->id}}"
                            data-title="{{$category->title}}"
                            data-category_id="{{ $category->parent_id }}"

                            data-toggle="modal"
                            data-target="#edit"
                    >تعديل </button>


                    <button id="cart_button" class="btn btn-danger"
                            data-pro_id="{{$category->id}}"
                            data-toggle="modal"
                            data-target="#delete"
                    > حذف</button>
                    </a>
                @endforeach







            </div>






    </div>


    <!-- row closed -->

            <!-- Basic modal -->
            <div class="modal" id="modaldemo1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Add Section</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">

                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">اسم القسم</label>
                                    <input type="text" class="form-control" id="section_name" name="title" />
                                </div>

                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                                <select name="parent_id" id="section_id" class="form-control">
                                        <option value="" selected disabled>--حدد القسم--</option>
                                        @foreach($maincategories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach


                                    </select>


                                <div class="form-group">
                                    <label for="favicon">الصورة :</label>
                                    <input type="file" id="image" name="image">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">تاكيد</button>
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Basic modal -->


            <!-- edit -->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="categories/update" method="post" enctype="multipart/form-data">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">
                                    <label for="exampleInputEmail">اسم القسم</label>
                                    <input type="text" class="form-control" id="title" name="title" required />
                                </div>


                                <div class="form-group">
                                    <label for="favicon">الصورة :</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                                <select name="parent_id" id="category_id" class="form-control">

                                    <option value="" selected>قسم رئيسي</option> <!-- هذا هو الخيار الافتراضي -->

                                    @if(isset($maincategories) && $maincategories->count() > 0)
                                        @foreach ($maincategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    @else
                                        <option disabled>No categories available</option>
                                    @endif

                                </select>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

            <!-- delete -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">حذف المنتج</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="categories/destroy" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                <input type="hidden" name="pro_id" id="pro_id" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                <button type="submit" class="btn btn-danger">تاكيد</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@push('js')


    <script>
        $('#edit').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget)
            var pro_id = button.data('pro_id');
            var title = button.data('title')
            var category_id = button.data('category_id'); // جلب الـ category_id من الزر


            var modal = $(this)

            modal.find('.modal-body #pro_id').val(pro_id)
            modal.find('.modal-body #title').val(title)
            modal.find('.modal-body #category_id').val(category_id).change(); // تحديد القسم تلقائياً


        })

        $('#delete').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget)
            var pro_id = button.data('pro_id')

            var modal = $(this)

            modal.find('.modal-body #pro_id').val(pro_id)
        })
    </script>
@endpush
