@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/exhibitions.css') }}">
@endpush

@section('content')

<main class="exhibitions-page">

    <!-- HERO -->
    <section class="exhibitions-hero">
        <h1>المعارض الثقافية</h1>
        <p>
            مساحة تجمع الإبداع، الفن، والتاريخ في قلب المجمع الثقافي بصلالة.
            اكتشف أعمال الفنانين المحليين والدوليين.
        </p>
    </section>

    <!-- Exhibitions Grid -->
    <section class="exhibitions-container">

        <div class="exhibition-card">
            <img src="{{ asset('images/ex1.jpg') }}">
            <div class="exhibition-info">
                <h3>معرض الفن العُماني</h3>
                <p>يستعرض أعمال الفنانين العمانيين في مختلف المدارس الفنية.</p>
                <span>📅 15 يوليو – 30 يوليو</span>
            </div>
        </div>

        <div class="exhibition-card">
            <img src="{{ asset('images/ex2.jpg') }}">
            <div class="exhibition-info">
                <h3>معرض الخط العربي</h3>
                <p>لوحات فنية تمزج بين الأصالة والإبداع المعاصر.</p>
                <span>📅 1 أغسطس – 20 أغسطس</span>
            </div>
        </div>

        <div class="exhibition-card">
            <img src="{{ asset('images/ex3.jpg') }}">
            <div class="exhibition-info">
                <h3>تراث صلالة</h3>
                <p>رحلة بصرية في تاريخ وثقافة محافظة ظفار.</p>
                <span>📅 10 أغسطس – 5 سبتمبر</span>
            </div>
        </div>

        <div class="exhibition-card">
            <img src="{{ asset('images/ex4.jpg') }}">
            <div class="exhibition-info">
                <h3>الفن المعاصر</h3>
                <p>أعمال فنية حديثة تعكس قضايا المجتمع والهوية.</p>
                <span>📅 20 أغسطس – 15 سبتمبر</span>
            </div>
        </div>

    </section>

</main>

@endsection
