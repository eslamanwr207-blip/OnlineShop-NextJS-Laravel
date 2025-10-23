@extends('dashboard.layouts.main_sidebar')

@push('styles')
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">
@endpush

    <!-- breadcrumb -->

    <!-- breadcrumb -->
    @section('content')
        <!-- row -->
        <div class="row">


            @if(session()->has('Add'))
                <h1>{{session()->get("Add")}}</h1>
            @endif
            @if(session()->has('Error'))
                <h1>{{session()->get("Error")}}</h1>
            @endif

                <h1 style="text-align: right; margin: 20px 80px 10px 0" >ادارة المنتجات</h1>
            <div class="container">
                <br/>


                @foreach($products as $product)
                    <div class="product">
                        <img src="{{asset($product->image)}}" alt="صورة المنتج">
                        <h2 class="product-title">{{$product->title}}</h2>

                        <div class="price-cart">
                            <span class="price">{{$product->price}}</span>
                            <span class="quantity">{{$product->quantity}}</span>

                        </div>

                        <div class="hr"></div>

                        <button id="cart_button" class="btn btn-primary"
                                data-pro_id="{{$product->id}}"
                                data-title="{{$product->title}}"
                                data-category_id="{{ $product->category_id}}"
                                data-discount="{{$product->discount}}"
                                data-price="{{$product->price}}"
                                data-quantity="{{$product->quantity}}"


                                data-toggle="modal"
                                data-target="#edit"
                        >تعديل</button>


                        <button id="cart_button" class="btn btn-danger"
                                data-pro_id="{{$product->id}}"
                                data-toggle="modal"
                                data-target="#delete"
                        >حذف</button>
                    </div>
                @endforeach



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
                            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">

                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">اسم المنتج</label>
                                    <input type="text" class="form-control" id="title" name="title" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">السعر قبل الخصم</label>
                                    <input type="number" class="form-control" id="discount" name="discount" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">السعر بعد الخصم</label>
                                    <input type="number" class="form-control" id="price" name="price" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">العدد</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" />
                                </div>

                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                                <select name="category_id" id="section_id" class="form-control">
                                    <option value="" selected disabled>--حدد القسم--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach


                                </select>

                                <div class="form-group">
                                    <label for="colorSelect" class="col-form-label">الألوان المتاحة</label>
                                    <select id="colorSelect" class="form-control" multiple="multiple" name="colors[]">
                                        <option value="أحمر">أحمر</option>
                                        <option value="أزرق">أزرق</option>
                                        <option value="أخضر">أخضر</option>
                                        <option value="أصفر">أصفر</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sizeSelect" class="col-form-label">الأحجام المتاحة</label>
                                    <select id="sizeSelect" class="form-control" multiple="multiple" name="sizes[]">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="favicon">الصورة :</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">ملاحظات</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>

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
                            <form action="products/update" method="post" enctype="multipart/form-data">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">
                                    <label for="exampleInputEmail">اسم القسم</label>
                                    <input type="text" class="form-control" id="title" name="title" required />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">السعر قبل الخصم</label>
                                    <input type="number" class="form-control" id="discount" name="discount" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">السعر بعد الخصم</label>
                                    <input type="number" class="form-control" id="price" name="price" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">العدد</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" />
                                </div>

                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                                <select name="parent_id" id="category_id" class="form-control">

                                    <option value="" selected>قسم رئيسي</option> <!-- هذا هو الخيار الافتراضي -->

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach

                                </select>



                                <div class="form-group">
                                    <label for="favicon">الصورة :</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="editColorSelect" class="col-form-label">الألوان المتاحة</label>
                                    <select id="editColorSelect" class="form-control" multiple="multiple" name="colors[]">
                                        <option value="أحمر">أحمر</option>
                                        <option value="أزرق">أزرق</option>
                                        <option value="أخضر">أخضر</option>
                                        <option value="أصفر">أصفر</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sizeSelect" class="col-form-label">الأحجام المتاحة</label>
                                    <select id="editSizeSelect" class="form-control" multiple="multiple" name="sizes[]">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>




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
                    <form action="products/destroy" method="post">
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
                var discount = button.data('discount'); // جلب الـ category_id من الزر
                var price = button.data('price'); // جلب الـ category_id من الزر
                var quantity = button.data('quantity'); // جلب الـ category_id من الزر


                var modal = $(this)

                modal.find('.modal-body #pro_id').val(pro_id)
                modal.find('.modal-body #title').val(title)
                modal.find('.modal-body #category_id').val(category_id).change(); // تحديد القسم تلقائياً

                modal.find('.modal-body #discount').val(discount)
                modal.find('.modal-body #price').val(price)
                modal.find('.modal-body #quantity').val(quantity)



            })

            $('#delete').on('show.bs.modal', function (event){
                var button = $(event.relatedTarget)
                var pro_id = button.data('pro_id')

                var modal = $(this)

                modal.find('.modal-body #pro_id').val(pro_id)
            })
        </script>








        <script>
            $(document).ready(function() {
                $('#colorSelect, #sizeSelect, #editColorSelect, #editSizeSelect').select2({
                    tags: true,
                    placeholder: "اختر أو أضف قيمة جديدة",
                    allowClear: true,
                    tokenSeparators: [',', ' '] // يمكن فصل القيم بالفاصلة أو المسافة
                });
            });
        </script>
    @endpush
