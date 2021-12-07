@extends('Base::backend.master')
@php
    $locale = session()->get('locale');
    if($locale === 'cn'){
        $locale = 'zh_CN';
    }
    if($locale === 'tw'){
        $locale = 'zh_TW';
    }
@endphp
@section('content')
    <div class="mt-3">
        <div class="card">
            <div class="card-body">
                <div id="elfinder"></div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript" charset="utf-8">
        $().ready(function () {
            var cc = $('#elfinder').elfinder({
                width: '100%',
                height: '90%',
                @if($locale)
                lang: '{{ $locale }}',
                @endif
                customData: {
                    _token: '{{ csrf_token() }}'
                },
                url: '{{ route("elfinder.connector") }}',
                soundPath: '{{ asset('asset/plugins/elfinder/sounds') }}'
            });
        });
    </script>
@endpush
