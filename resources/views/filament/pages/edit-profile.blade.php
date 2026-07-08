{{-- (1) استيراد مكونات Filament لبناء صفحة متوافقة مع شكل لوحة التحكم --}}
<x-filament-panels::page>

    {{-- (2) عرض النموذج الذي عرفناه في EditProfile.php --}}
    {{ $this->form }}

    {{-- (3) زر الحفظ أسفل النموذج --}}
    {{--     x-filament::button: زر بتصميم Filament الرسمي --}}
    {{--     wire:click="submit": يستدعي دالة submit() في الكلاس عند الضغط --}}
    <div class="mt-6">
        <x-filament::button wire:click="submit" color="primary" size="lg">
            حفظ التغييرات
        </x-filament::button>
    </div>

</x-filament-panels::page>