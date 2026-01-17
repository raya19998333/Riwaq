@extends('layouts.auth')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<div class="login-container">

    <!-- Header / شعار و ترحيب -->
    <div class="login-header">
        <h1>مرحباً بك</h1>
        <p>سجل دخولك للمجمع الثقافي بصلالة</p>
    </div>

    <!-- رسالة الخطأ -->
    <div class="error-message" id="errorMessage">
        البريد الإلكتروني أو كلمة المرور غير صحيحة
    </div>

    <!-- نموذج تسجيل الدخول -->
    <form id="loginForm">
        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" id="email" name="email" placeholder="example@email.com" required>
        </div>

        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور" required>
        </div>

        <div class="login-options">
            <label class="remember-me">
                <input type="checkbox" id="remember">
                <span>تذكرني</span>
            </label>
            <a href="#" class="forgot-password">نسيت كلمة المرور؟</a>
        </div>

        <button type="submit" class="btn-login">تسجيل الدخول</button>
    </form>

    <!-- فاصل -->
    <div class="divider">أو</div>

    <!-- تسجيل الدخول عبر وسائل التواصل -->
    <div class="social-login">
        <button class="social-btn">Google</button>
        <button class="social-btn">Facebook</button>
    </div>

    <!-- فاصل -->
    <div class="divider"></div>

    <!-- رابط التسجيل -->
    <div class="signup-link">
        ليس لديك حساب؟ <a href="/register">سجل الآن</a>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/login.js') }}"></script>
@endpush
