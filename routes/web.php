<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PatientStatementController;
use App\Models\Payment;
use App\Models\PaymentItem;
use App\Models\Patient;
use Illuminate\Http\Request;

Route::get('/', function () { return view('welcome'); });
Route::get('/reports/patients', [ReportController::class, 'patients'])->name('patient.report');
Route::get('/reports/doctors', [ReportController::class, 'doctors'])->name('doctor.report');
Route::get('/reports/appointments', [ReportController::class, 'appointments'])->name('appointment.report');
Route::get('/reports/payments', [ReportController::class, 'payments'])->name('payment.report');
Route::get('/patient/{patient}/statement', [PatientStatementController::class, 'index'])->name('patient.statement');

// صفحة فواتير المريض
Route::get('/payment/patient/{patient}/invoices', function ($patientId) {
    $patient = Patient::with(['payments' => function ($q) { $q->orderBy('created_at', 'desc'); }, 'contract'])->findOrFail($patientId);
    return view('reports.patient-invoices', ['patient' => $patient]);
})->name('payment.patient-invoices');

// صفحة الفاتورة المنفصلة
Route::get('/payment/{payment}/invoice', function ($paymentId) {
    $payment = Payment::with(['items', 'patient', 'contract.priceList.items', 'appointment.doctor'])->findOrFail($paymentId);
    return view('reports.payment-invoice-page', ['payment' => $payment]);
})->name('payment.invoice');

// إضافة خدمات للفاتورة
Route::post('/payment/{payment}/add-items', function (Request $request, $paymentId) {
    $payment = Payment::findOrFail($paymentId);
    if ($payment->is_locked) return back();
    $contract = $payment->contract;
    if (!$contract || !$contract->priceList) return back();
    foreach ($request->service_ids as $serviceId) {
        $service = $contract->priceList->items()->find($serviceId);
        if ($service) {
            PaymentItem::create(['payment_id' => $payment->id, 'name' => $service->name, 'category' => $service->category, 'price' => $service->price, 'quantity' => 1, 'total' => $service->price]);
        }
    }
    $newTotal = $payment->items()->sum('total');
    $newRemaining = $newTotal - $payment->paid_amount;
    $payment->update(['total_amount' => $newTotal, 'remaining_amount' => max(0, $newRemaining)]);
    return redirect()->route('payment.invoice', ['payment' => $paymentId]);
})->name('payment.add-items');

// حذف خدمة من الفاتورة
Route::get('/payment/{payment}/remove-item/{item}', function ($paymentId, $itemId) {
    $pi = PaymentItem::findOrFail($itemId);
    $p = $pi->payment;
    if (!$p->is_locked) {
        $pi->delete();
        $newTotal = $p->items()->sum('total');
        $newRemaining = $newTotal - $p->paid_amount;
        $p->update(['total_amount' => $newTotal, 'remaining_amount' => max(0, $newRemaining)]);
    }
    return redirect()->route('payment.invoice', ['payment' => $paymentId]);
})->name('payment.remove-item-page');