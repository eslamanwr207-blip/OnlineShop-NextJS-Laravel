<!-- resources/views/components/navbar.blade.php أو ضمن layout -->

<nav class="navbar navbar-expand-md bg-white fixed-top shadow transition-navbar" >
    <div class="container">
        {{-- Logo --}}
        <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
            🛒 OnlineShop
        </a>

        {{-- Toggle Button --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Links --}}
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" style="font-size: 20px;" href="{{ url('/') }}">
                        الرئيسية
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" style="font-size: 20px;" href="{{ url('/category') }}">
                        الأقسام
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" style="font-size: 20px;" href="{{ url('/products_') }}">
                        المنتجات
                    </a>
                </li>







                {{-- زر تسجيل الخروج --}}
                <li class="nav-item">
                    <form id="form" method="POST" action="{{ route('logout') }}"  >
                        @csrf
                        <button type="submit" class="btn nav-link text-dark fw-bold" style="font-size: 20px;">
                            تسجيل الخروج
                        </button>
                    </form>
                </li>
                {{-- أيقونة عربة التسوق --}}
                <li class="nav-item position-relative ms-3">
                    <a class="nav-link text-dark" href="{{ url('/cart') }}">
                        🛒
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                            3
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<br/>
<br/>
<br/>
<br/>

