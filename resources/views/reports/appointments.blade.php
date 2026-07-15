<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تقرير المواعيد</title>
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
        .filter-bar select { padding: 6px 10px; border: 1px solid #ddd; border-radius: 4px; }
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
            <div>إجمالي المواعيد</div>
        </div>
        <div class="stat-box" style="background: #e3f2fd;">
            <div style="font-size: 28px; font-weight: bold; color: #1565c0;">{{ $completed }}</div>
            <div>تم الكشف</div>
        </div>
        <div class="stat-box" style="background: #fff3e0;">
            <div style="font-size: 28px; font-weight: bold; color: #e65100;">{{ $pending }}</div>
            <div>قيد الانتظار</div>
        </div>
        <div class="stat-box" style="background: #fce4ec;">
            <div style="font-size: 28px; font-weight: bold; color: #c62828;">{{ $cancelled }}</div>
            <div>ملغي / لم يحضر</div>
        </div>
    </div>

    <p>الفترة: <strong>{{ $dateFrom }} ← {{ $dateTo }}</strong></p>

    <form method="GET" class="no-print filter-bar">
        <input type="hidden" name="date_from" value="{{ $dateFrom }}">
        <input type="hidden" name="date_to" value="{{ $dateTo }}">
        <select name="doctor_id">
            <option value="">كل الأطباء</option>
            @foreach($doctors as $id => $name)
                <option value="{{ $id }}" {{ ($doctorId ?? '') == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        <select name="status">
            <option value="">كل الحالات</option>
            <option value="pending" {{ ($status ?? '') == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
            <option value="confirmed" {{ ($status ?? '') == 'confirmed' ? 'selected' : '' }}>مؤكد</option>
            <option value="completed" {{ ($status ?? '') == 'completed' ? 'selected' : '' }}>مكتمل</option>
            <option value="cancelled" {{ ($status ?? '') == 'cancelled' ? 'selected' : '' }}>ملغي</option>
            <option value="no_show" {{ ($status ?? '') == 'no_show' ? 'selected' : '' }}>لم يحضر</option>
        </select>
        <select name="type">
            <option value="">كل الأنواع</option>
            <option value="scheduled" {{ ($type ?? '') == 'scheduled' ? 'selected' : '' }}>محجوز</option>
            <option value="walk_in" {{ ($type ?? '') == 'walk_in' ? 'selected' : '' }}>مباشر</option>
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
                <th>الغرفة</th>
                <th>التاريخ</th>
                <th>الوقت</th>
                <th>النوع</th>
                <th>الحالة</th>
                <th>تم الكشف</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->patient?->first_name }} {{ $a->patient?->last_name }}</td>
                <td>{{ $a->doctor?->first_name }} {{ $a->doctor?->last_name }}</td>
                <td>{{ $a->room?->name ?? '—' }}</td>
                <td>{{ $a->appointment_date->format('Y-m-d') }}</td>
                <td>{{ $a->appointment_time?->format('H:i') }}</td>
                <td>{{ $a->type === 'scheduled' ? 'محجوز' : 'مباشر' }}</td>
                <td>{{ match($a->status) { 'pending' => 'قيد الانتظار', 'confirmed' => 'مؤكد', 'in_progress' => 'جاري الكشف', 'completed' => 'مكتمل', 'cancelled' => 'ملغي', 'no_show' => 'لم يحضر', default => $a->status } }}</td>
                <td>{{ $a->is_completed ? '✅' : '❌' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>إجمالي النتائج: <strong>{{ $total }}</strong> موعد</p>

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
            link.download = 'تقرير_المواعيد' + ext;
            link.click();
        }
    </script>

</body>
</html>