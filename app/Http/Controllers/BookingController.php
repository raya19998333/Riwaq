<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // 1️⃣ التحقق من البيانات (اختياري لكن مهم)
        $validated = $request->validate([
            'hall_id'      => 'required|integer',
            'booking_date' => 'required|date',
            'attendees'    => 'nullable|integer',
            'event_type'   => 'nullable|string',
        ]);

        // 2️⃣ حفظ الحجز في قاعدة البيانات
        Booking::create([
            'user_id'      => auth()->id(), // null إذا زائر
            'hall_id'      => $validated['hall_id'],
            'booking_date' => $validated['booking_date'],
            'attendees'    => $validated['attendees'] ?? null,
            'event_type'   => $validated['event_type'] ?? null,
            'status'       => 'pending',
        ]);

        // 3️⃣ رسالة نجاح
        return back()->with('success', 'تم إرسال طلب الحجز بنجاح');
    }
}
