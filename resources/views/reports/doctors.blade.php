<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تقرير الأطباء</title>
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
            <div>إجمالي الأطباء</div>
        </div>
        <div class="stat-box" style="background: #e3f2fd;">
            <div style="font-size: 28px; font-weight: bold; color: #1565c0;">{{ $active }}</div>
            <div>مفعّل</div>
        </div>
        <div class="stat-box" style="background: #fce4ec;">
            <div style="font-size: 28px; font-weight: bold; color: #c62828;">{{ $inactive }}</div>
            <div>غير مفعّل</div>
        </div>
    </div>

    {{-- (3) شريط الفلاتر --}}
    <form method="GET" class="no-print filter-bar">
        <input type="text" name="search" placeholder="ابحث باسم الطبيب أو رقم الترخيص..." value="{{ $search ?? '' }}">
        <select name="specialty_id">
            <option value="">كل التخصصات</option>
            @foreach($specialties as $id => $name)
                <option value="{{ $id }}" {{ ($specialtyId ?? '') == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-filter">تصفية</button>
        <a href="?" style="text-decoration: none; color: #2563eb;">مسح الفلاتر</a>
    </form>

    {{-- (4) جدول التقرير --}}
    <table id="reportTable">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم كاملاً</th>
                <th>البريد الإلكتروني</th>
                <th>رقم الهاتف</th>
                <th>رقم الترخيص</th>
                <th>التخصصات</th>
                <th>سنوات الخبرة</th>
                <th>رسم الكشف</th>
                <th>مفعّل</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td>{{ $doctor->id }}</td>
                <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->phone }}</td>
                <td>{{ $doctor->license_number }}</td>
                <td>{{ $doctor->specialties->pluck('name')->join('، ') }}</td>
                <td>{{ $doctor->years_of_experience }}</td>
                <td>{{ number_format($doctor->consultation_fee, 2) }} جنيه</td>
                <td>{{ $doctor->is_active ? 'نعم' : 'لا' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>إجمالي النتائج: <strong>{{ $total }}</strong> طبيب</p>

    {{-- (5) سكريبت التصدير --}}
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
            link.download = 'تقرير_الأطباء' + ext;
            link.click();
        }
    </script>

</body>
</html>