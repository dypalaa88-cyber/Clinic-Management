<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>فواتير — {{ $patient->first_name }} {{ $patient->last_name }}</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #343a40; color: #fff; }
        .btn { padding: 6px 14px; border: none; border-radius: 4px; cursor: pointer; color: #fff; font-size: 12px; text-decoration: none; display: inline-block; margin: 2px; }
        .btn-primary { background: #0d6efd; }
        .btn-back { background: #6c757d; }
        .btn-print { background: #198754; }
        .badge { padding: 3px 8px; border-radius: 4px; font-size: 11px; }
        .badge-success { background: #198754; color: #fff; }
        .badge-danger { background: #dc3545; color: #fff; }
        .badge-warning { background: #ffc107; color: #000; }
        .badge-gray { background: #6c757d; color: #fff; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;" class="no-print">
        <h2 style="margin:0;">📁 فواتير — {{ $patient->first_name }} {{ $patient->last_name }}</h2>
        <a href="{{ route('filament.admin.resources.payments.index') }}" class="btn btn-back">↩️ رجوع</a>
    </div>

    <div style="display:flex; flex-wrap:wrap; gap:10px; margin-bottom:15px; font-size:13px; background:#fff; padding:12px; border:1px solid #dee2e6;">
        <div><strong>كود المريض:</strong> {{ $patient->id }}</div>
        <div><strong>الهاتف:</strong> {{ $patient->phone }}</div>
        <div><strong>العقد:</strong> {{ $patient->contract?->name ?? '—' }}</div>
        <div><strong>عدد الفواتير:</strong> {{ $patient->payments->count() }}</div>
    </div>

    @if($patient->payments->isEmpty())
        <p style="text-align:center;padding:40px;color:#6c757d;">لا توجد فواتير لهذا المريض</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>رقم الفاتورة</th>
                    <th>الطبيب</th>
                    <th>التاريخ</th>
                    <th>الإجمالي</th>
                    <th>المدفوع</th>
                    <th>المتبقي</th>
                    <th>الحالة</th>
                    <th>فتح</th>
                    <th class="no-print">طباعة</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patient->payments as $p)
                <tr>
                    <td>#{{ $p->id }}</td>
                    <td>{{ $p->appointment?->doctor?->first_name }} {{ $p->appointment?->doctor?->last_name }}</td>
                    <td>{{ $p->created_at->format('Y-m-d') }}</td>
                    <td>{{ number_format($p->total_amount,2) }} ج</td>
                    <td>{{ number_format($p->paid_amount,2) }} ج</td>
                    <td>{{ number_format($p->remaining_amount,2) }} ج</td>
                    <td>
                        @if($p->is_locked)
                            <span class="badge badge-gray">🔒 مقفولة</span>
                        @else
                            @switch($p->status)
                                @case('paid')<span class="badge badge-success">✅ مسدد</span>@break
                                @case('partial')<span class="badge badge-warning">⚠️ جزئي</span>@break
                                @case('pending')<span class="badge badge-danger">❌ غير مسدد</span>@break
                            @endswitch
                        @endif
                    </td>
                    <td><a href="{{ route('payment.invoice', ['payment' => $p->id]) }}" class="btn btn-primary">📄 فتح</a></td>
                    <td class="no-print">
                        {{-- زرارين طباعة لكل فاتورة --}}
                        <a href="{{ route('patient.statement', ['patient' => $patient->id, 'mode' => 'summary', 'payment_id' => $p->id]) }}" class="btn btn-print" target="_blank">📋 إجمالي</a>
                        <a href="{{ route('patient.statement', ['patient' => $patient->id, 'mode' => 'detailed', 'payment_id' => $p->id]) }}" class="btn btn-print" target="_blank">📝 تفصيلي</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>