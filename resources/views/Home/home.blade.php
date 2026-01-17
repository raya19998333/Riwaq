@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
<main class="main-content">

    <!-- 1️⃣ Hero Section -->
    <section class="hero" id="hero">
        <h1>مرحباً بكم في المجمع الثقافي بصلالة</h1>
        <p>المنصة الرقمية الأولى التي تجمع الفعاليات، المعارض، والأنشطة الثقافية في قلب صلالة. اكتشف عالم الثقافة والفنون بكل سهولة ويسر.</p>
        <a href="#" class="btn1 btn-book">احجز قاعة الآن</a>
    </section>

    <!-- 2️⃣ About Section -->
    <section class="section-about" id="about">
        <h2>عن المجمع الثقافي بصلالة</h2>
        <p>المجمع الثقافي بصلالة هو مساحة متكاملة تهدف إلى تعزيز الثقافة والفنون العمانية. يضم قاعات للفعاليات، معارض فنية، ورش عمل تعليمية، ومنصات لعرض المحتوى الثقافي المحلي والدولي.</p>
        <p>نسعى لتوفير تجربة ثقافية شاملة لجميع الأعمار، مع التركيز على دعم المبدعين والفنانين، ونشر المعرفة والحفاظ على التراث الثقافي لصلالة وسلطنة عمان.</p>
    </section>

    <!-- 3️⃣ Featured Events Section -->
    <section class="section-events" id="events">
        <h2>الفعاليات المميزة</h2>
        <div class="events-grid">
            <div class="event-card">
                <img src="{{ asset('images/event1.jpg') }}" alt="مهرجان صلالة">
                <h3>مهرجان صلالة الثقافي</h3>
                <p>فعاليات سنوية تجمع الموسيقى، المسرح، والفنون في تجربة ثقافية متكاملة.</p>
            </div>
            <div class="event-card">
                <img src="{{ asset('images/event2.jpg') }}" alt="ورش عمل">
                <h3>ورش عمل تعليمية</h3>
                <p>ورش عمل متنوعة للأطفال والشباب لتعزيز المهارات الفنية والإبداعية.</p>
            </div>
            <div class="event-card">
                <img src="{{ asset('images/event3.jpg') }}" alt="معارض فنية">
                <h3>معارض فنية ومعرفية</h3>
                <p>استمتع بمجموعة من المعارض التي تعرض أعمال الفنانين المحليين والدوليين.</p>
            </div>
        </div>
    </section>

    <!-- 4️⃣ Cultural Content Section -->
    <section class="section-content" id="content">
        <h2>المحتوى الثقافي</h2>
        <div class="content-grid">
            <div class="content-card">
                <h3>مقالات ثقافية</h3>
                <p>تصفح أحدث المقالات والدراسات التي تسلط الضوء على الثقافة العمانية والفنون التقليدية.</p>
                <a href="#" class="btn1 btn-login1">اقرأ المزيد</a>
            </div>
            <div class="content-card">
                <h3>مقاطع فيديو</h3>
                <p>استمتع بمشاهدة محتوى فيديو غني بالفعاليات، العروض المسرحية، والحفلات الموسيقية.</p>
                <a href="#" class="btn1 btn-login1">شاهد الآن</a>
            </div>
            <div class="content-card">
                <h3>تسجيلات صوتية</h3>
                <p>استمع لمحاضرات ومناقشات ثقافية تتناول التراث والفنون العمانية.</p>
                <a href="#" class="btn1 btn-login1">استمع الآن</a>
            </div>
        </div>
    </section>

    <!-- 5️⃣ Call to Action Section -->
    <section class="section-cta" id="cta">
        <h2>انضم إلى مجتمعنا الثقافي</h2>
        <p>احجز حضورك في الفعاليات، شارك في الورش، وتابع كل جديد في عالم الثقافة والفنون بصلالة.</p>
        <a href="#" class="btn1 btn-book1">سجل الآن</a>
    </section>

</main>


@endsection
