<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservations;
use DateTime;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user(); // Retrieve the authenticated user
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must log in.'); // Redirect to login if user is not authenticated
        }
        $reservation = new Reservations();
        $reservation->start = $request->input('check_in');
        $reservation->end = $request->input('check_out');
        $reservation->office_id = $request->input('office_id');
        $reservation->user_id = $user->id;

        $reservation->details = $request->input('details');

        $start = new DateTime($reservation->start);
        $end = new DateTime($reservation->end);
        $hours = $end->diff($start)->h;
        $reservation->price = $hours * $request->input('price');

        // Fill in the remaining fields here

        $reservation->save();
        // Redirect to another page or display a confirmation message if needed
        return redirect()->back()->with('success', 'Reservation created successfully!');
    }

    public function getAvailableTimes($selectedDate = null)
    {
        $availableTimes = [];
        $startHour = 8;
        $endHour = 22;

        // تحويل التاريخ المحدد إلى كائن DateTime
        $selectedDateObj = new DateTime($selectedDate);

        // حساب التاريخ الحالي
        $currentDateObj = new DateTime();

        // التحقق من أن التاريخ المحدد ليس في الماضي
        if ($selectedDateObj < $currentDateObj) {
            return $availableTimes;
        }

        // التحقق من أن التاريخ المحدد ليس نفس التاريخ الحالي
        if ($selectedDateObj->format('Y-m-d') !== $currentDateObj->format('Y-m-d')) {
            // إذا كان التاريخ المحدد ليس نفس التاريخ الحالي، يتم تعيين ساعة البداية إلى 8 صباحًا
            $startHour = 8;
        } else {
            // إذا كان التاريخ المحدد هو نفس التاريخ الحالي، يتم تعيين ساعة البداية إلى الساعة الحالية + 1
            $currentHour = $currentDateObj->format('H');
            $startHour = $currentHour < $endHour ? $currentHour + 1 : $endHour;
        }

        // حلقة لتحديد الأوقات المتاحة بين ساعة البداية وساعة النهاية
        for ($hour = $startHour; $hour <= $endHour; $hour++) {
            $availableTimes[] = $hour;
        }

        return $availableTimes;
    }

    public function getBookedTimesByDate($date)
    {
        $bookedTimes = [];

        // تنفيذ العمليات اللازمة للحصول على الأوقات المحجوزة للتاريخ المحدد
        // قم بملء المصفوفة $bookedTimes بالأوقات المحجوزة

        return $bookedTimes;
    }
}
