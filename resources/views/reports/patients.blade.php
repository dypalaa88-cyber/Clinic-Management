<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تقرير المرضى</title>
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

    {{-- (1) أزرار التصدير والطباعة --}}
    <div class="no-print" style="margin-bottom: 15px;">
        <button class="btn btn-print" onclick="window.print()">🖨️ طباعة</button>
        <button class="btn btn-excel" onclick="exportTable('excel')">📥 تصدير Excel</button>
        <button class="btn btn-csv" onclick="exportTable('csv')">📥 تصدير CSV</button>
    </div>

    {{-- (2) بطاقات الإحصائيات --}}
    <div class="stats">
        <div class="stat-box" style="background: #e8f5e9;">
            <div style="font-size: 28px; font-weight: bold; color: #2e7d32;">{{ $total }}</div>
            <div>إجمالي المرضى</div>
        </div>
        <div class="stat-box" style="background: #e3f2fd;">
            <div style="font-size: 28px; font-weight: bold; color: #1565c0;">{{ $male }}</div>
            <div>ذكور</div>
        </div>
        <div class="stat-box" style="background: #fce4ec;">
            <div style="font-size: 28px; font-weight: bold; color: #c62828;">{{ $female }}</div>
            <div>إناث</div>
        </div>
    </div>

    {{-- (3) معلومات الفترة --}}
    <p>الفترة: <strong>{{ $dateFrom }} ← {{ $dateTo }}</strong></p>

    {{-- (4) شريط الفلاتر الإضافية --}}
    <form method="GET" class="no-print filter-bar">
        <input type="hidden" name="date_from" value="{{ $dateFrom }}">
        <input type="hidden" name="date_to" value="{{ $dateTo }}">
        <input type="text" name="search" placeholder="ابحث باسم المريض أو الهاتف..." value="{{ $search ?? '' }}">
        <select name="contract_id">
            <option value="">كل العقود</option>
            @foreach($contracts as $id => $name)
                <option value="{{ $id }}" {{ ($contractId ?? '') == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        <select name="gender">
            <option value="">كل الجنسين</option>
            <option value="male" {{ ($gender ?? '') == 'male' ? 'selected' : '' }}>ذكر</option>
            <option value="female" {{ ($gender ?? '') == 'female' ? 'selected' : '' }}>أنثى</option>
        </select>
        <button type="submit" class="btn btn-filter">تصفية</button>
        <a href="?date_from={{ $dateFrom }}&date_to={{ $dateTo }}" style="text-decoration: none; color: #2563eb;">مسح الفلاتر</a>
    </form>

    {{-- (5) جدول التقرير --}}
    <table id="reportTable">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم كاملاً</th>
                <th>رقم الهاتف</th>
                <th>الجنس</th>
                <th>العمر</th>
                <th>العقد</th>
                <th>تاريخ التسجيل</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->id }}</td>
                <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->gender === 'male' ? 'ذكر' : 'أنثى' }}</td>
                <td>{{ $patient->date_of_birth?->age ?? '—' }}</td>
                <td>{{ $patient->contract?->name ?? '—' }}</td>
                <td>{{ $patient->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>إجمالي النتائج: <strong>{{ $total }}</strong> مريض</p>

    {{-- (6) سكريبت التصدير --}}
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
            link.download = 'تقرير_المرضى' + ext;
            link.click();
        }
    </script>

</body>
</html>