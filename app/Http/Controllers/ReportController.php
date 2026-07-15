<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Contract;

class ReportController extends Controller
{
    // (1) تقرير المرضى
    public function patients(Request $request)
    {
        $dateFrom = $request->get('date_from', now()->startOfMonth()->format('Y-m-d'));
        $dateTo = $request->get('date_to', now()->format('Y-m-d'));
        $contractId = $request->get('contract_id');
        $gender = $request->get('gender');
        $search = $request->get('search');

        $patients = Patient::with('contract')
            ->whereDate('created_at', '>=', $dateFrom)
            ->whereDate('created_at', '<=', $dateTo)
            ->when($contractId, fn ($q) => $q->where('contract_id', $contractId))
            ->when($gender, fn ($q) => $q->where('gender', $gender))
            ->when($search, fn ($q) => $q->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            }))
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $patients->count();
        $male = $patients->where('gender', 'male')->count();
        $female = $patients->where('gender', 'female')->count();
        $contracts = Contract::where('is_active', true)->pluck('name', 'id');

        return view('reports.patients', compact(
            'patients', 'total', 'male', 'female', 'dateFrom', 'dateTo', 'contracts', 'contractId', 'gender', 'search'
        ));
    }

    // (2) تقرير الأطباء
    public function doctors(Request $request)
    {
        $search = $request->get('search');
        $specialtyId = $request->get('specialty_id');

        $doctors = Doctor::with('specialties')
            ->when($search, fn ($q) => $q->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('license_number', 'like', "%{$search}%");
            }))
            ->when($specialtyId, fn ($q) => $q->whereHas('specialties', fn ($q) => $q->where('specialty_id', $specialtyId)))
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $doctors->count();
        $active = $doctors->where('is_active', true)->count();
        $inactive = $doctors->where('is_active', false)->count();
        $specialties = \App\Models\Specialty::pluck('name', 'id');

        return view('reports.doctors', compact(
            'doctors', 'total', 'active', 'inactive', 'specialties', 'specialtyId', 'search'
        ));
    }

    // (3) تقرير المواعيد
    public function appointments(Request $request)
    {
        $dateFrom = $request->get('date_from', now()->startOfMonth()->format('Y-m-d'));
        $dateTo = $request->get('date_to', now()->format('Y-m-d'));
        $doctorId = $request->get('doctor_id');
        $status = $request->get('status');
        $type = $request->get('type');

        $appointments = Appointment::with(['patient', 'doctor', 'room'])
            ->whereDate('appointment_date', '>=', $dateFrom)
            ->whereDate('appointment_date', '<=', $dateTo)
            ->when($doctorId, fn ($q) => $q->where('doctor_id', $doctorId))
            ->when($status, fn ($q) => $q->where('status', $status))
            ->when($type, fn ($q) => $q->where('type', $type))
            ->orderBy('appointment_date', 'desc')
            ->get();

        $total = $appointments->count();
        $completed = $appointments->where('is_completed', true)->count();
        $pending = $appointments->where('status', 'pending')->count();
        $cancelled = $appointments->whereIn('status', ['cancelled', 'no_show'])->count();
        $doctors = Doctor::pluck('first_name', 'id')->map(fn ($n, $id) => Doctor::find($id)->first_name . ' ' . Doctor::find($id)->last_name);

        return view('reports.appointments', compact(
            'appointments', 'total', 'completed', 'pending', 'cancelled', 'dateFrom', 'dateTo', 'doctors', 'doctorId', 'status', 'type'
        ));
    }

    // (4) تقرير الفواتير والمدفوعات
    public function payments(Request $request)
    {
        $dateFrom = $request->get('date_from', now()->startOfMonth()->format('Y-m-d'));
        $dateTo = $request->get('date_to', now()->format('Y-m-d'));
        $paymentMethod = $request->get('payment_method');
        $status = $request->get('status');
        $search = $request->get('search');

        $payments = Payment::with(['patient', 'contract', 'appointment.doctor', 'receiver'])
            ->whereDate('created_at', '>=', $dateFrom)
            ->whereDate('created_at', '<=', $dateTo)
            ->when($paymentMethod, fn ($q) => $q->where('payment_method', $paymentMethod))
            ->when($status, fn ($q) => $q->where('status', $status))
            ->when($search, fn ($q) => $q->whereHas('patient', fn ($q) => $q->where('first_name', 'like', "%{$search}%")->orWhere('last_name', 'like', "%{$search}%")))
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $payments->count();
        $totalAmount = $payments->sum('total_amount');
        $totalPaid = $payments->sum('paid_amount');
        $totalRemaining = $payments->sum('remaining_amount');

        return view('reports.payments', compact(
            'payments', 'total', 'totalAmount', 'totalPaid', 'totalRemaining', 'dateFrom', 'dateTo', 'paymentMethod', 'status', 'search'
        ));
    }
}