@extends('dashboard.layouts.main_sidebar')

@push('styles')

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
            <h2 class="mb-4" style="margin-right: 10px; text-align: right" >إدارة الطلبات</h2>


            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>القسم</th>
                    <th>السعر</th>
                    <th>الكمية</th>
                    <th>الاجمالي</th>
                    <th>المستخدم</th>
                    <th>الإجراءات</th>
                </tr>
                </thead>

                <tbody>



                    <tr>
                        <?php $i = 1 ?>
                        @foreach($orders as $order)


                        <td>{{$i++}}</td>
                        <td>{{$order->title}}</td>
                            <td>{{$order->category->title ?? 'غير محدد'}}</td>                        <td>{{$order->price}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price * $order->quantity}}</td>
                        <td>{{$order->user->name}}</td>

                        <td>

                            <button class="btn btn-outline-danger btn-sm"
                                    data-pro_id="{{$order->id}}"
                                    data-toggle="modal"
                                    data-target="#delete"
                            >حذف</button>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>


        <!-- row closed -->


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
                        <form action="orders/destroy" method="post">
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
        $('#delete').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget)
            var pro_id = button.data('pro_id')
            var modal = $(this)
            modal.find('.modal-body #pro_id').val(pro_id)
        })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endpush







