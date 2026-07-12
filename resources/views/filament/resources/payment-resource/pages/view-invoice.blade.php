<div style="max-width: 800px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; border: 1px solid #ddd;" id="invoice-print">

    {{-- (1) ترويسة الفاتورة --}}
    <div style="text-align: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">عيادة SanadCare</h2>
        <p style="margin: 5px 0;">نظام إدارة العيادات المتكامل</p>
        <hr>
    </div>

    {{-- (2) معلومات الفاتورة والمريض --}}
    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
        <div>
            <strong>فاتورة رقم:</strong> {{ $this->payment->id }}<br>
            <strong>التاريخ:</strong> {{ $this->payment->created_at->format('Y-m-d') }}<br>
            <strong>الموعد:</strong> {{ $this->payment->created_at->format('H:i') }}
        </div>
        <div style="text-align: right;">
            <strong>المريض:</strong> {{ $this->payment->patient?->first_name }} {{ $this->payment->patient?->last_name }}<br>
            <strong>العقد:</strong> {{ $this->payment->contract?->name }}<br>
            <strong>الطبيب:</strong> {{ $this->payment->appointment?->doctor?->first_name }} {{ $this->payment->appointment?->doctor?->last_name }}
        </div>
    </div>

    <hr>

    {{-- (3) جدول الخدمات حسب التصنيف --}}
    @php
        $items = $this->payment->items;
        $services = $items->where('category', 'service');
        $supplies = $items->where('category', 'supply');
        $medicines = $items->where('category', 'medicine');
        $labs = $items->where('category', 'lab');
        $radiologies = $items->where('category', 'radiology');
    @endphp

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr style="background: #f5f5f5;">
                <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">#</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">الخدمة</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">التصنيف</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">السعر</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 1; @endphp

            {{-- خدمات طبية --}}
            @if($services->count())
                <tr><td colspan="4" style="background: #e8f5e9; padding: 8px; font-weight: bold;">الخدمات الطبية</td></tr>
                @foreach($services as $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $counter++ }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">خدمة طبية</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ number_format($item->total, 2) }} جنيه</td>
                </tr>
                @endforeach
            @endif

            {{-- تحاليل --}}
            @if($labs->count())
                <tr><td colspan="4" style="background: #e3f2fd; padding: 8px; font-weight: bold;">التحاليل</td></tr>
                @foreach($labs as $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $counter++ }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">تحليل</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ number_format($item->total, 2) }} جنيه</td>
                </tr>
                @endforeach
            @endif

            {{-- أشعة --}}
            @if($radiologies->count())
                <tr><td colspan="4" style="background: #fff3e0; padding: 8px; font-weight: bold;">الأشعة</td></tr>
                @foreach($radiologies as $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $counter++ }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">أشعة</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ number_format($item->total, 2) }} جنيه</td>
                </tr>
                @endforeach
            @endif

            {{-- مستلزمات --}}
            @if($supplies->count())
                <tr><td colspan="4" style="background: #fce4ec; padding: 8px; font-weight: bold;">المستلزمات</td></tr>
                @foreach($supplies as $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $counter++ }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">مستلزم</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ number_format($item->total, 2) }} جنيه</td>
                </tr>
                @endforeach
            @endif

            {{-- أدوية --}}
            @if($medicines->count())
                <tr><td colspan="4" style="background: #f3e5f5; padding: 8px; font-weight: bold;">الأدوية</td></tr>
                @foreach($medicines as $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $counter++ }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">دواء</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ number_format($item->total, 2) }} جنيه</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{-- (4) الإجماليات --}}
    <div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
        <table style="width: 300px; border-collapse: collapse;">
            <tr style="border-top: 2px solid #333;">
                <td style="padding: 5px;"><strong>الإجمالي:</strong></td>
                <td style="text-align: right; padding: 5px;">{{ number_format($this->payment->total_amount, 2) }} جنيه</td>
            </tr>
            @if($this->payment->contract && $this->payment->contract->copay_percentage > 0)
            <tr>
                <td style="padding: 5px;"><strong>تحمل المريض ({{ $this->payment->contract->copay_percentage }}%):</strong></td>
                <td style="text-align: right; padding: 5px;">{{ number_format($this->payment->total_amount * $this->payment->contract->copay_percentage / 100, 2) }} جنيه</td>
            </tr>
            @endif
            <tr style="border-top: 1px solid #ccc;">
                <td style="padding: 5px;"><strong>المدفوع:</strong></td>
                <td style="text-align: right; padding: 5px;">{{ number_format($this->payment->paid_amount, 2) }} جنيه</td>
            </tr>
            <tr>
                <td style="padding: 5px;"><strong>المتبقي:</strong></td>
                <td style="text-align: right; padding: 5px; color: {{ $this->payment->remaining_amount > 0 ? 'red' : 'green' }};">
                    {{ number_format($this->payment->remaining_amount, 2) }} جنيه
                </td>
            </tr>
            <tr style="border-top: 2px solid #333;">
                <td style="padding: 5px;"><strong>طريقة الدفع:</strong></td>
                <td style="text-align: right; padding: 5px;">
                    @switch($this->payment->payment_method)
                        @case('cash') نقدي @break
                        @case('card') بطاقة @break
                        @case('insurance') تأمين @break
                        @case('corporate') تعاقد @break
                        @default {{ $this->payment->payment_method }}
                    @endswitch
                </td>
            </tr>
        </table>
    </div>

    {{-- (5) تذييل --}}
    <hr>
    <div style="text-align: center; font-size: 12px; color: #666;">
        <p>شكراً لزيارتكم — لمزيد من الاستفسارات: 01012345678</p>
        <p>{{ $this->payment->created_at->format('Y-m-d H:i') }} | المستلم: {{ auth()->user()->name }}</p>
    </div>

</div>