<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwaq - رواق الثقافي</title>
       <link rel="icon" type="image/png" href="{{ asset('images/logo1.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">

   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   

@stack('styles')

</head>
<body>
   <nav class="navbar">
    <div class="navbar-container">
        <!-- شعار + اسم -->
        <div class="logo-section">
            <div class="logo">
                <img src="{{ asset('images/logo1.png') }}" alt="Riwaq Logo" style="width: 100%; height: 100%; object-fit: contain;">
            </div>
            <div class="brand-text">
                <h1>Riwaq | رواق</h1>
                <p>الإطار الرقمي للمجمع الثقافي</p>
            </div>
        </div>

        <!-- روابط التنقل -->
        <ul class="nav-links" id="navLinks">
            <li><a href="/" class="active">الرئيسية</a></li>
            <li><a href="/events">الفعاليات</a></li>
            <li><a href="/exhibitions">المعارض</a></li>
            <li><a href="/content">المحتوى الثقافي</a></li>
            <li><a href="/about">عن المجمع</a></li>
            <li><a href="/contact">تواصل معنا</a></li>
        </ul>

        <!-- الأزرار -->
        <div class="nav-actions" id="navActions">
            <a href="/login" class="btn btn-login">
                <i class="fas fa-user"></i>
                تسجيل دخول
            </a>
            <a href="/hall-booking" class="btn btn-book">
                <i class="fas fa-calendar-check"></i>
                حجز قاعة
            </a>
        </div>

        <!-- زر قائمة الموبايل -->
        <button class="menu-toggle" id="menuToggle">☰</button>
    </div>
</nav>



@yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <!-- About -->
            <div class="footer-section footer-about">
                <div class="footer-logo">
                    <!-- ⭐ ضع الشعار هنا أيضاً في الـ Footer -->
                    <div class="footer-logo-icon">
                        <!-- إذا كنت تريد استخدام صورة بدلاً من حرف ر، احذف هذا السطر -->
                        <img src="{{ asset('images/logo1.png') }}" alt="Riwaq Logo" style="width: 100%; height: 100%; object-fit: contain;">
                        <!-- أو ضع: <img src="logo.png" alt="Riwaq Logo" style="width: 100%; height: 100%; object-fit: contain;"> -->
                    </div>
                    <div class="footer-logo-text">
                        <h3>Riwaq | رواق</h3>
                        <p>الإطار الرقمي المجمع الثقافي</p>
                    </div>
                </div>
                <p>منصة رقمية متقدمة لإدارة للمجمع الثقافي والشبابية بطريقة ذكية ومنظمة، نوفر تجربة سلسة للزوار والمنظمين.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h4>روابط سريعة</h4>
                <ul class="footer-links">
                    <li><a href="#">الفعاليات</a></li>
                    <li><a href="#">المعارض</a></li>
                    <li><a href="#">حجز القاعات</a></li>
                    <li><a href="#">المحتوى الثقافي</a></li>
                    <li><a href="#">ملف المستخدم</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="footer-section">
                <h4>خدماتنا</h4>
                <ul class="footer-links">
                    <li><a href="#">إدارة الفعاليات</a></li>
                    <li><a href="#">حجز المرافق</a></li>
                    <li><a href="#">التحول الرقمي</a></li>
                    <li><a href="#">دعم المنظمين</a></li>
                    <li><a href="#">التقارير</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="footer-section">
                <h4>تواصل معنا</h4>
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                    <div class="contact-text">info@riwaq.om</div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-phone"></i></div>
                    <div class="contact-text">+968 XXXX XXXX</div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="contact-text">مسقط، سلطنة عُمان</div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>© 2026 Riwaq | رواق - جميع الحقوق محفوظة</p>
            <div class="footer-bottom-links">
                <a href="#">سياسة الخصوصية</a>
                <a href="#">الشروط والأحكام</a>
                <a href="#">خريطة الموقع</a>
            </div>
        </div>
    </footer>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');
        const navActions = document.getElementById('navActions');

        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            navActions.classList.toggle('active');
            menuToggle.textContent = navLinks.classList.contains('active') ? '✕' : '☰';
        });
    </script>
</body>
</html>