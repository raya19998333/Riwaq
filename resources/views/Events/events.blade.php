@extends('layouts.app')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/events.css') }}">
@endpush
<!-- ================= Hero ================= -->
<section class="events-hero">
    <h1>الفعاليات الثقافية</h1>
    <p>برنامج متنوع من الأنشطة الثقافية والفنية في قلب صلالة</p>
</section>

<!-- ================= Events ================= -->
<main class="events-container">

    <article class="event-card">
        <img src="{{ asset('images/event1.jpg') }}" alt="مهرجان صلالة">
        <div class="event-info">
            <h3>مهرجان صلالة الثقافي</h3>
            <p>تجربة ثقافية تجمع الفنون، الموسيقى، والعروض المسرحية.</p>
            <span><i class="fa-regular fa-calendar"></i> 15 أغسطس 2026</span>
            <a href="#" class="btn btn-book">احجز مقعدك</a>
        </div>
    </article>

    <article class="event-card">
        <img src="{{ asset('images/event2.jpg') }}" alt="ورشة الخط">
        <div class="event-info">
            <h3>ورشة الخط العربي</h3>
            <p>ورشة تعليمية بإشراف مختصين في فن الخط العربي.</p>
            <span><i class="fa-regular fa-calendar"></i> 5 سبتمبر 2026</span>
            <a href="#" class="btn btn-book">سجل الآن</a>
        </div>
    </article>

    <article class="event-card">
        <img src="{{ asset('images/event3.jpg') }}" alt="معرض فني">
        <div class="event-info">
            <h3>معرض الفن المعاصر</h3>
            <p>عرض إبداعي لأعمال الفنانين الشباب من سلطنة عمان.</p>
            <span><i class="fa-regular fa-calendar"></i> 22 سبتمبر 2026</span>
            <a href="#" class="btn btn-book">عرض التفاصيل</a>
        </div>
    </article>

</main>

@endsection
