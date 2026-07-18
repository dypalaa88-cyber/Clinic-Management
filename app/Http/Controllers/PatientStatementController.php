<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientStatementController extends Controller
{
    public function index($patient, Request $request)
    {
        $patient = Patient::with(['payments.items', 'contract'])->findOrFail($patient);
        $mode = $request->get('mode', 'detailed');
        $paymentId = $request->get('payment_id');

        // (1) إذا تم تحديد دفعة معينة، نعرضها فقط
        $payments = $paymentId
            ? $patient->payments->where('id', $paymentId)
            : $patient->payments;

        // (2) تجميع كل PaymentItems
        $allItems = collect();
        $totalAmount = 0;
        $totalPaid = 0;
        $totalRemaining = 0;

        foreach ($payments as $payment) {
            $allItems = $allItems->merge($payment->items);
            $totalAmount += $payment->total_amount;
            $totalPaid += $payment->paid_amount;
            $totalRemaining += $payment->remaining_amount;
        }

        // (3) تجميع حسب التصنيف
        $services = $allItems->where('category', 'service');
        $medicines = $allItems->where('category', 'medicine');
        $supplies = $allItems->where('category', 'supply');
        $labs = $allItems->where('category', 'lab');
        $radiologies = $allItems->where('category', 'radiology');

        return view('reports.patient-statement', compact(
            'patient',
            'mode',
            'allItems',
            'totalAmount',
            'totalPaid',
            'totalRemaining',
            'services',
            'medicines',
            'supplies',
            'labs',
            'radiologies',
            'paymentId',
            'payments'
        ));
    }
}