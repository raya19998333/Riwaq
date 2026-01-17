@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('content')

<main class="contact-page">

    <!-- HERO -->
    <section class="contact-hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>تواصل معنا</h1>
            <p>
                نحن هنا لدعمك والإجابة على استفساراتك حول فعاليات ومرافق مجمع رِواق الثقافي.
            </p>
        </div>
    </section>

    <!-- CONTACT INFO -->
    <section class="contact-info">
        <div class="info-card">
            <h3>📍 الموقع</h3>
            <p>صلالة – سلطنة عمان</p>
        </div>

        <div class="info-card">
            <h3>📧 البريد الإلكتروني</h3>
            <p>info@riwaq.om</p>
        </div>

        <div class="info-card">
            <h3>📞 الهاتف</h3>
            <p>+968 9000 0000</p>
        </div>
    </section>

    <!-- FORM -->
    <section class="contact-form-section">
        <h2>أرسل لنا رسالة</h2>

        <form class="contact-form">
            <input type="text" placeholder="الاسم الكامل" required>
            <input type="email" placeholder="البريد الإلكتروني" required>
            <input type="text" placeholder="الموضوع">
            <textarea placeholder="اكتب رسالتك هنا..." rows="6"></textarea>

            <button type="submit" class="btn-send">إرسال الرسالة</button>
        </form>
    </section>

</main>

@endsection
