<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientReportController extends Controller
{
    public function index(Request $request)
    {
        $dateFrom = $request->get('date_from', now()->startOfMonth()->format('Y-m-d'));
        $dateTo = $request->get('date_to', now()->format('Y-m-d'));

        $patients = Patient::with('contract')
            ->whereDate('created_at', '>=', $dateFrom)
            ->whereDate('created_at', '<=', $dateTo)
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $patients->count();
        $male = $patients->where('gender', 'male')->count();
        $female = $patients->where('gender', 'female')->count();

        return view('reports.patients', compact(
            'patients', 'total', 'male', 'female', 'dateFrom', 'dateTo'
        ));
    }
}