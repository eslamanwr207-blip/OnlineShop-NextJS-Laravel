<footer class="bg-dark text-white pt-4 mt-5">
    <div class="container">
        <div class="row text-center text-md-start">
            {{-- About Section --}}
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase">OnlineShop</h5>
                <p>أفضل متجر إلكتروني يوفر لك تجربة تسوق ممتعة وسهلة.</p>
            </div>

            {{-- Links Section --}}
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase">روابط سريعة</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" class="text-white text-decoration-none">الرئيسية</a></li>
                    <li><a href="{{ url('/products_') }}" class="text-white text-decoration-none">المنتجات</a></li>
                    <li><a href="{{ url('/category') }}" class="text-white text-decoration-none">الأقسام</a></li>
                    <li><a href="{{ url('/cart') }}" class="text-white text-decoration-none">عربة التسوق</a></li>
                </ul>
            </div>

            {{-- Social Section --}}
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase">تابعنا</h5>
                <div>
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>
        </div>

        <hr class="bg-white">

        <div class="text-center pb-3">
            <p class="mb-0">جميع الحقوق محفوظة &copy; 2025 OnlineShop</p>
        </div>
    </div>
</footer>
