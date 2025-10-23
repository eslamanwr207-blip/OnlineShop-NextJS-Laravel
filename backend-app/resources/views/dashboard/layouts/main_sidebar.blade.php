<html lang="ar" dir="rtl" >
<head>

    @stack('styles')


    <!-- Title -->
    <title>{{$settings->title}}</title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .main_sidebar{
            width: 20%;
            background: white;;
            padding: 30px 0;


            position: fixed;

            right: 0; /* إذا كانت القائمة على اليمين */
            top: 0;
            height: 100vh;
            overflow-y: auto; /* لتمرير داخلي إن لزم */
            z-index: 1000; /* لتكون فوق المحتوى */


        }

        .user_data{
            text-align: center;
            width: 90%;
            border-radius: 100px;
            color: #000000;


            margin: auto;

            margin-top: 50px;

        }

        .button_pages{
            margin-top: 20px;
            text-align: right;
            width: 100%;
            height: 100vh;


        }

        .button_pages a{
            display: block;
            text-decoration: none;
            font-size: 20px;
            color: #000000;
            font-weight: bold;
            padding: 10px 30px;


        }
    </style>
</head>

<body style="display: flex" >




    <div class="main_sidebar" >


        <div class="user_data" >
            <svg style="width: 100px; height: 100px"

                 xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
            <h2>Eslam</h2>
            <h6>dyabcf@gmail.com</h6>
        </div>
        <hr/>

        <div class="button_pages" >
            <a href="/dashboard" ># الرئيسية</a>
            <a href="/dashboard/orders" ># الطلبات</a>
            <a data-effect="effect-scale" data-toggle="modal" href="#modaldemo1" ># اضافة قسم</a>
            <a href="/dashboard/categories" ># الاقسام</a>
            <a data-effect="effect-scale" data-toggle="modal" href="#modaldemo1" ># اضافة منتج</a>
            <a href="/dashboard/products" ># المنتجات</a>
            <a href="/dashboard/settings" ># الاعدادات</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                # تسجيل الخروج</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
            </form>
        </div>
    </div>

    <div style="width: 80%; background: white; margin-right: 20%"  >
        @yield('content')
    </div>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    @stack('js')

</body>


</html>
