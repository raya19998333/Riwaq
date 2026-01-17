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

            <form>
                <div class="form-group">
                    <label>الاسم الكامل</label>
                    <input type="text" placeholder="أدخل اسمك" required>
                </div>

                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" placeholder="example@email.com" required>
                </div>

                <div class="form-group">
                    <label>نوع الفعالية</label>
                    <select>
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
                        <input type="date">
                    </div>
                    <div>
                        <label>عدد الحضور</label>
                        <input type="number" placeholder="مثال: 120">
                    </div>
                </div>

                <div class="form-group">
                    <label>ملاحظات إضافية</label>
                    <textarea placeholder="اكتب أي تفاصيل إضافية عن الفعالية..."></textarea>
                </div>

                <button class="btn-booking">إرسال طلب الحجز</button>
            </form>
        </div>

    </div>

</section>
@endsection
