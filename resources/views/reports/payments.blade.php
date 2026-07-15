<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تقرير الفواتير والمدفوعات</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f5f5f5; }
        .stats { display: flex; gap: 15px; margin-bottom: 20px; }
        .stat-box { flex: 1; padding: 15px; border-radius: 8px; text-align: center; min-width: 100px; }
        .btn { padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin: 5px; }
        .btn-print { background: #2563eb; color: #fff; }
        .btn-excel { background: #16a34a; color: #fff; }
        .btn-csv { background: #ca8a04; color: #fff; }
        .btn-filter { background: #6b7280; color: #fff; }
        .filter-bar { display: flex; gap: 10px; margin-bottom: 15px; flex-wrap: wrap; align-items: center; }
        .filter-bar input, .filter-bar select { padding: 6px 10px; border: 1px solid #ddd; border-radius: 4px; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body>

    <div class="no-print" style="margin-bottom: 15px;">
        <button class="btn btn-print" onclick="window.print()">🖨️ طباعة</button>
        <button class="btn btn-excel" onclick="exportTable('excel')">📥 تصدير Excel</button>
        <button class="btn btn-csv" onclick="exportTable('csv')">📥 تصدير CSV</button>
    </div>

    <div class="stats">
        <div class="stat-box" style="background: #e8f5e9;">
            <div style="font-size: 28px; font-weight: bold; color: #2e7d32;">{{ $total }}</div>
            <div>عدد الفواتير</div>
        </div>
        <div class="stat-box" style="background: #e3f2fd;">
            <div style="font-size: 28px; font-weight: bold; color: #1565c0;">{{ number_format($totalAmount, 2) }}</div>
            <div>إجمالي المستحق (جنيه)</div>
        </div>
        <div class="stat-box" style="background: #fff3e0;">
            <div style="font-size: 28px; font-weight: bold; color: #e65100;">{{ number_format($totalPaid, 2) }}</div>
            <div>إجمالي المسدد (جنيه)</div>
        </div>
        <div class="stat-box" style="background: #fce4ec;">
            <div style="font-size: 28px; font-weight: bold; color: #c62828;">{{ number_format($totalRemaining, 2) }}</div>
            <div>إجمالي المتبقي (جنيه)</div>
        </div>
    </div>

    <p>الفترة: <strong>{{ $dateFrom }} ← {{ $dateTo }}</strong></p>

    <form method="GET" class="no-print filter-bar">
        <input type="hidden" name="date_from" value="{{ $dateFrom }}">
        <input type="hidden" name="date_to" value="{{ $dateTo }}">
        <input type="text" name="search" placeholder="ابحث باسم المريض..." value="{{ $search ?? '' }}">
        <select name="payment_method">
            <option value="">كل الطرق</option>
            <option value="cash" {{ ($paymentMethod ?? '') == 'cash' ? 'selected' : '' }}>نقدي</option>
            <option value="card" {{ ($paymentMethod ?? '') == 'card' ? 'selected' : '' }}>بطاقة</option>
            <option value="insurance" {{ ($paymentMethod ?? '') == 'insurance' ? 'selected' : '' }}>تأمين</option>
            <option value="corporate" {{ ($paymentMethod ?? '') == 'corporate' ? 'selected' : '' }}>تعاقد</option>
        </select>
        <select name="status">
            <option value="">كل الحالات</option>
            <option value="paid" {{ ($status ?? '') == 'paid' ? 'selected' : '' }}>مسدد</option>
            <option value="partial" {{ ($status ?? '') == 'partial' ? 'selected' : '' }}>مسدد جزئياً</option>
            <option value="pending" {{ ($status ?? '') == 'pending' ? 'selected' : '' }}>غير مسدد</option>
        </select>
        <button type="submit" class="btn btn-filter">تصفية</button>
        <a href="?date_from={{ $dateFrom }}&date_to={{ $dateTo }}" style="text-decoration: none; color: #2563eb;">مسح الفلاتر</a>
    </form>

    <table id="reportTable">
        <thead>
            <tr>
                <th>#</th>
                <th>المريض</th>
                <th>الطبيب</th>
                <th>العقد</th>
                <th>الإجمالي</th>
                <th>المدفوع</th>
                <th>المتبقي</th>
                <th>طريقة الدفع</th>
                <th>الحالة</th>
                <th>التاريخ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->patient?->first_name }} {{ $p->patient?->last_name }}</td>
                <td>{{ $p->appointment?->doctor?->first_name }} {{ $p->appointment?->doctor?->last_name }}</td>
                <td>{{ $p->contract?->name ?? '—' }}</td>
                <td>{{ number_format($p->total_amount, 2) }} جنيه</td>
                <td>{{ number_format($p->paid_amount, 2) }} جنيه</td>
                <td>{{ number_format($p->remaining_amount, 2) }} جنيه</td>
                <td>{{ match($p->payment_method) { 'cash' => 'نقدي', 'card' => 'بطاقة', 'insurance' => 'تأمين', 'corporate' => 'تعاقد', default => $p->payment_method } }}</td>
                <td>{{ match($p->status) { 'paid' => 'مسدد', 'partial' => 'مسدد جزئياً', 'pending' => 'غير مسدد', default => $p->status } }}</td>
                <td>{{ $p->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>إجمالي النتائج: <strong>{{ $total }}</strong> فاتورة</p>

    <script>
        function exportTable(type) {
            let table = document.getElementById('reportTable');
            let rows = table.querySelectorAll('tr');
            let data = [];
            rows.forEach(row => {
                let cols = row.querySelectorAll('th, td');
                let rowData = [];
                cols.forEach(col => rowData.push('"' + col.innerText.replace(/"/g, '""') + '"'));
                data.push(rowData.join(','));
            });
            let content = data.join('\n');
            let mime = type === 'excel' ? 'application/vnd.ms-excel' : 'text/csv';
            let ext = type === 'excel' ? '.xls' : '.csv';
            let blob = new Blob(['\uFEFF' + content], { type: mime + ';charset=utf-8;' });
            let link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'تقرير_الفواتير' + ext;
            link.click();
        }
    </script>

</body>
</html>