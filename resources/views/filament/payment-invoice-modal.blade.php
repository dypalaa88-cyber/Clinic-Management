<!DOCTYPE html>
<html dir="rtl">
<head><meta charset="UTF-8"><title>فاتورة #{{ $payment->id }}</title>
<style>body{font-family:Arial;margin:20px}table{width:100%;border-collapse:collapse;font-size:13px}th,td{border:1px solid #ddd;padding:8px}th{background:#343a40;color:#fff}.btn{padding:6px 14px;border:none;border-radius:4px;cursor:pointer;color:#fff;font-size:12px;text-decoration:none}.btn-add{background:#198754}.btn-del{background:#dc3545}.btn-back{background:#6c757d}input[type=search]{padding:8px;border:1px solid #ced4da;border-radius:4px;font-size:13px;width:100%;margin-bottom:8px}.service-list{border:1px solid #ced4da;border-radius:4px;max-height:200px;overflow-y:auto;padding:8px}.service-list label{display:block;padding:4px 0;font-size:13px;cursor:pointer}</style></head>
<body>

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px">
    <h2 style="margin:0">فاتورة #{{ $payment->id }} — {{ $payment->patient?->first_name }} {{ $payment->patient?->last_name }}</h2>
    <a href="{{ route('filament.admin.resources.payments.index') }}" class="btn btn-back">↩️ رجوع للفواتير</a>
</div>

<div style="display:flex;flex-wrap:wrap;gap:10px;margin-bottom:15px;font-size:13px;background:#fff;padding:12px;border:1px solid #dee2e6">
    <div><strong>الهاتف:</strong> {{ $payment->patient?->phone }}</div>
    <div><strong>العمر:</strong> {{ $payment->patient?->date_of_birth?->age ?? '—' }}</div>
    <div><strong>الطبيب:</strong> {{ $payment->appointment?->doctor?->first_name }} {{ $payment->appointment?->doctor?->last_name }}</div>
    <div><strong>العقد:</strong> {{ $payment->contract?->name ?? '—' }}</div>
    <div><strong>الحالة:</strong> {{ $payment->is_locked ? '🔒 مقفولة' : '🔓 مفتوحة' }}</div>
</div>

<table>
<thead><tr><th>#</th><th>الخدمة</th><th>التصنيف</th><th>السعر</th><th>الإجمالي</th>@if(!$payment->is_locked)<th>حذف</th>@endif</tr></thead>
<tbody>
@php $gt = 0; @endphp
@forelse($payment->items as $i => $item)
@php $gt += $item->total; @endphp
<tr>
    <td>{{ $i+1 }}</td><td>{{ $item->name }}</td>
    <td>@switch($item->category)@case('service')🩺 خدمة طبية@break@case('medicine')💊 دواء@break@case('supply')📦 مستلزم@break@case('lab')🔬 تحليل@break@case('radiology')🩻 أشعة@break@default{{ $item->category }}@endswitch</td>
    <td>{{ number_format($item->price,2) }} ج</td><td style="font-weight:bold">{{ number_format($item->total,2) }} ج</td>
    @if(!$payment->is_locked)
    <td style="text-align:center"><a href="{{ route('payment.remove-item-page', ['payment' => $payment->id, 'item' => $item->id]) }}" class="btn btn-del" onclick="return confirm('تأكيد الحذف؟')">✕</a></td>
    @endif
</tr>
@empty
<tr><td colspan="{{ $payment->is_locked ? '5' : '6' }}" style="text-align:center;padding:20px">لا توجد خدمات</td></tr>
@endforelse
</tbody>
<tfoot><tr style="background:#e9ecef;font-weight:bold"><td colspan="{{ $payment->is_locked ? '4' : '5' }}" style="text-align:left">الإجمالي الكلي</td><td>{{ number_format($gt,2) }} ج</td>@if(!$payment->is_locked)<td></td>@endif</tr></tfoot>
</table>

@if(!$payment->is_locked)
<form method="POST" action="{{ route('payment.add-items', ['payment' => $payment->id]) }}" style="margin-top:15px;">
    @csrf
    <h4 style="margin:0 0 8px 0">➕ إضافة خدمات للفاتورة</h4>
    
    {{-- (1) حقل بحث --}}
    <input type="search" id="serviceSearch" placeholder="🔍 ابحث عن خدمة..." onkeyup="filterServices()" autocomplete="off">

    {{-- (2) قائمة الخدمات مع Checkboxes --}}
    <div class="service-list" id="serviceList">
        @php $contract = $payment->contract; $available = $contract?->priceList?->items()->where('is_active',true)->get() ?? collect(); @endphp
        @foreach($available as $s)
            <label>
                <input type="checkbox" name="service_ids[]" value="{{ $s->id }}" class="service-checkbox">
                {{ $s->name }} — {{ number_format($s->price,2) }} ج
                <small style="color:#6c757d">({{ match($s->category) { 'service' => 'خدمة', 'medicine' => 'دواء', 'supply' => 'مستلزم', 'lab' => 'تحليل', 'radiology' => 'أشعة', default => $s->category } }})</small>
            </label>
        @endforeach
    </div>

    <button type="submit" class="btn btn-add" style="margin-top:10px;padding:10px 24px;font-size:14px">➕ إضافة المحدد</button>
</form>

{{-- (3) سكريبت البحث --}}
<script>
function filterServices() {
    let input = document.getElementById('serviceSearch');
    let filter = input.value.toLowerCase();
    let labels = document.querySelectorAll('#serviceList label');
    labels.forEach(label => {
        let text = label.textContent.toLowerCase();
        label.style.display = text.includes(filter) ? 'block' : 'none';
    });
}
</script>
@endif

<div style="display:flex;justify-content:flex-end;margin-top:20px;font-size:13px">
    <div style="background:#fff;border:1px solid #dee2e6;padding:12px 20px;min-width:200px">
        <div style="display:flex;justify-content:space-between;padding:5px 0;border-bottom:1px solid #eee"><span>الإجمالي:</span><strong>{{ number_format($payment->total_amount,2) }} ج</strong></div>
        <div style="display:flex;justify-content:space-between;padding:5px 0;border-bottom:1px solid #eee"><span>المدفوع:</span><strong style="color:#198754">{{ number_format($payment->paid_amount,2) }} ج</strong></div>
        <div style="display:flex;justify-content:space-between;padding:5px 0"><span>المتبقي:</span><strong style="color:{{ $payment->remaining_amount > 0 ? '#dc3545' : '#198754' }}">{{ number_format($payment->remaining_amount,2) }} ج</strong></div>
    </div>
</div>

<p style="font-size:12px;color:#6c757d;margin-top:10px">طريقة الدفع: <strong>{{ match($payment->payment_method) { 'cash' => 'نقدي', 'card' => 'بطاقة', 'insurance' => 'تأمين', 'corporate' => 'تعاقد', default => $payment->payment_method } }}</strong> | تاريخ: {{ $payment->updated_at->format('Y-m-d H:i') }}</p>

</body></html>