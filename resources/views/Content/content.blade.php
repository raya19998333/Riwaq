@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/content.css') }}">
@endpush

@section('content')

<main class="content-page">

    <!-- HERO -->
    <section class="content-hero">
        <h1>المحتوى الثقافي</h1>
        <p>
            مكتبة رقمية ثرية تضم المقالات، الفيديوهات، والتسجيلات الصوتية
            التي تعكس الثقافة والفنون والتراث في سلطنة عُمان.
        </p>
    </section>

    <!-- Categories -->
    <section class="content-categories">
        <button class="active">الكل</button>
        <button>مقالات</button>
        <button>فيديو</button>
        <button>بودكاست</button>
        <button>تراث</button>
    </section>

    <!-- Content Grid -->
    <section class="content-grid">

        <div class="content-card">
            <img src="{{ asset('images/content1.jpg') }}">
            <div class="content-info">
                <span>مقال</span>
                <h3>الهوية الثقافية في صلالة</h3>
                <p>نظرة عميقة في التراث الثقافي لمحافظة ظفار وأثره في المجتمع.</p>
            </div>
        </div>

        <div class="content-card">
            <img src="{{ asset('images/content2.jpg') }}">
            <div class="content-info">
                <span>فيديو</span>
                <h3>الفنون الشعبية العُمانية</h3>
                <p>عرض مرئي لأشهر الفنون التقليدية في سلطنة عمان.</p>
            </div>
        </div>

        <div class="content-card">
            <img src="{{ asset('images/content3.jpg') }}">
            <div class="content-info">
                <span>بودكاست</span>
                <h3>حديث مع فنان</h3>
                <p>حوار ملهم مع أحد الفنانين العمانيين حول تجربته الإبداعية.</p>
            </div>
        </div>

        <div class="content-card">
            <img src="{{ asset('images/content4.jpg') }}">
            <div class="content-info">
                <span>مقال</span>
                <h3>تاريخ العمارة في ظفار</h3>
                <p>كيف تعكس المباني التاريخية روح وثقافة المنطقة.</p>
            </div>
        </div>

    </section>

</main>

@endsection
