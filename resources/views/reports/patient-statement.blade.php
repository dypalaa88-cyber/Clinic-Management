<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>كشف حساب — {{ $patient->first_name }} {{ $patient->last_name }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f5f5f5; }
        .header { text-align: center; margin-bottom: 20px; }
        .header img { max-width: 120px; margin-bottom: 10px; display: block; margin-left: auto; margin-right: auto; }
        .btn { padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin: 5px; }
        .btn-print { background: #2563eb; color: #fff; }
        .btn-back { background: #6b7280; color: #fff; text-decoration: none; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body>

    <div class="no-print" style="margin-bottom: 15px;">
        <button class="btn btn-print" onclick="window.print()">🖨️ طباعة</button>
    <a href="#" onclick="window.close()" class="btn btn-back">↩️ إغلاق</a>
    </div>

    {{-- (1) ترويسة الفاتورة مع لوجو --}}
    <div class="header">
        <img src="{{ asset('images/logo.png') }}" alt="SanadCare Logo">
        <h2>عيادة SanadCare</h2>
        <p>نظام إدارة العيادات المتكامل</p>
        <hr>
    </div>

    {{-- (2) معلومات المريض --}}
    <p><strong>المريض:</strong> {{ $patient->first_name }} {{ $patient->last_name }}</p>
    <p><strong>العقد:</strong> {{ $patient->contract?->name ?? '—' }}</p>
    <p><strong>النمط:</strong> {{ $mode === 'summary' ? 'إجمالي' : 'تفصيلي' }}</p>

    @if($mode === 'summary')
        <table>
            <thead>
                <tr><th>التصنيف</th><th>عدد البنود</th><th>الإجمالي</th></tr>
            </thead>
            <tbody>
                @if($services->count())
                <tr><td>خدمات طبية</td><td>{{ $services->count() }}</td><td>{{ number_format($services->sum('total'), 2) }} جنيه</td></tr>
                @endif
                @if($medicines->count())
                <tr><td>أدوية</td><td>{{ $medicines->count() }}</td><td>{{ number_format($medicines->sum('total'), 2) }} جنيه</td></tr>
                @endif
                @if($supplies->count())
                <tr><td>مستلزمات</td><td>{{ $supplies->count() }}</td><td>{{ number_format($supplies->sum('total'), 2) }} جنيه</td></tr>
                @endif
                @if($labs->count())
                <tr><td>تحاليل</td><td>{{ $labs->count() }}</td><td>{{ number_format($labs->sum('total'), 2) }} جنيه</td></tr>
                @endif
                @if($radiologies->count())
                <tr><td>أشعة</td><td>{{ $radiologies->count() }}</td><td>{{ number_format($radiologies->sum('total'), 2) }} جنيه</td></tr>
                @endif
            </tbody>
        </table>
    @else
        @php
            $firstPayment = $payments->first();
        @endphp
        @if($firstPayment && $firstPayment->appointment)
            <p><strong>الطبيب:</strong> {{ $firstPayment->appointment->doctor?->first_name }} {{ $firstPayment->appointment->doctor?->last_name }}</p>
            <p><strong>التخصص:</strong> {{ $firstPayment->appointment->doctor?->specialties?->pluck('name')->join('، ') ?? '—' }}</p>
        @endif

        @if($services->count())
            <h3>الخدمات الطبية</h3>
            <table>
                <thead><tr><th>#</th><th>الخدمة</th><th>السعر</th></tr></thead>
                <tbody>
                    @foreach($services as $i => $item)
                    <tr><td>{{ $i+1 }}</td><td>{{ $item->name }}</td><td>{{ number_format($item->total, 2) }} جنيه</td></tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if($labs->count())
            <h3>التحاليل</h3>
            <table>
                <thead><tr><th>#</th><th>التحليل</th><th>السعر</th></tr></thead>
                <tbody>
                    @foreach($labs as $i => $item)
                    <tr><td>{{ $i+1 }}</td><td>{{ $item->name }}</td><td>{{ number_format($item->total, 2) }} جنيه</td></tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if($radiologies->count())
            <h3>الأشعة</h3>
            <table>
                <thead><tr><th>#</th><th>الأشعة</th><th>السعر</th></tr></thead>
                <tbody>
                    @foreach($radiologies as $i => $item)
                    <tr><td>{{ $i+1 }}</td><td>{{ $item->name }}</td><td>{{ number_format($item->total, 2) }} جنيه</td></tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if($medicines->count())
            <h3>الأدوية</h3>
            <table>
                <thead><tr><th>#</th><th>الدواء</th><th>السعر</th></tr></thead>
                <tbody>
                    @foreach($medicines as $i => $item)
                    <tr><td>{{ $i+1 }}</td><td>{{ $item->name }}</td><td>{{ number_format($item->total, 2) }} جنيه</td></tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if($supplies->count())
            <h3>المستلزمات</h3>
            <table>
                <thead><tr><th>#</th><th>المستلزم</th><th>السعر</th></tr></thead>
                <tbody>
                    @foreach($supplies as $i => $item)
                    <tr><td>{{ $i+1 }}</td><td>{{ $item->name }}</td><td>{{ number_format($item->total, 2) }} جنيه</td></tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif

    {{-- (3) الإجماليات --}}
    <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
        <table style="width: 300px; border-collapse: collapse;">
            <tr style="border-top: 2px solid #333;"><td><strong>الإجمالي:</strong></td><td style="text-align: right;">{{ number_format($totalAmount, 2) }} جنيه</td></tr>
            <tr><td><strong>المدفوع:</strong></td><td style="text-align: right;">{{ number_format($totalPaid, 2) }} جنيه</td></tr>
            <tr><td><strong>المتبقي:</strong></td><td style="text-align: right; color: {{ $totalRemaining > 0 ? 'red' : 'green' }};">{{ number_format($totalRemaining, 2) }} جنيه</td></tr>
        </table>
    </div>

    {{-- (4) تذييل — اسم المستخدم هنا فقط --}}
    <hr>
    <div style="text-align: center; font-size: 12px; color: #666;">
        <p>تم الطباعة بواسطة: {{ auth()->user()->name }} | {{ now()->format('Y-m-d H:i') }}</p>
    </div>

</body>
</html>