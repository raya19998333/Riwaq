@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/Booking.css') }}">
@endpush

@section('content')
<section class="booking-page">

    <div class="booking-hero">
        <h1>حجز القاعة</h1>
        <p>احجز قاعتك بكل سهولة لإقامة فعاليتك الثقافية أو الفنية</p>
    </div>

    <div class="booking-container">

        <!-- معلومات القاعة -->
        <div class="hall-info">
            <img src="{{ asset('images/hall.jpg') }}" alt="قاعة رِواق">
            <h2>قاعة محاضرات</h2>
            <ul>
                <li>🎭 سعة 300 شخص</li>
                <li>🎤 نظام صوتي احترافي</li>
                <li>📽 شاشة عرض + بروجكتر</li>
                <li>☕ منطقة ضيافة</li>
                <li>🅿️ موقف سيارات</li>
            </ul>
        </div>

        <!-- نموذج الحجز -->
        <div class="booking-form">
            <h3>تفاصيل الحجز</h3>
<form action="{{ route('booking.store') }}" method="POST">
    @csrf

    <input type="hidden" name="hall_id" value="1">

    <div class="form-group">
        <input type="hidden" name="hall_id" value="1">
        <label>الاسم الكامل</label>
        <input type="text" name="full_name" required>
    </div>

    <div class="form-group">
        <label>البريد الإلكتروني</label>
        <input type="email" name="email" required>
    </div>

    <div class="form-group">
        <label>نوع الفعالية</label>
        <select name="event_type">
            <option>مسرحية</option>
            <option>معرض</option>
            <option>محاضرة</option>
            <option>ورشة عمل</option>
            <option>أخرى</option>
        </select>
    </div>

    <div class="form-row">
        <div>
            <label>تاريخ الحجز</label>
            <input type="date" name="booking_date">
        </div>

        <div>
            <label>عدد الحضور</label>
            <input type="number" name="attendees">
        </div>
    </div>

    <button class="btn-booking">إرسال طلب الحجز</button>
</form>

        </div>

    </div>

</section>
@endsection
