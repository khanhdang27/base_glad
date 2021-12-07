@extends('Base::backend.master')
@section('content')
    <div class="row">
        <div class="col-sm-1">
            <a href="{{ route('elfinder.index') }}" class="btn btn-success">Select image</a>
        </div>
    </div>
    <div class="modal fade" id="elfinderShow">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="elfinder"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

    <!-- elFinder JS (REQUIRED) -->
    <script src="{{ asset('assets/plugins/elfinder/js/elfinder.min.js') }}"></script>
    <script type="text/javascript">
        function openElfinder(){
            $('#elfinderShow').modal();

            $('#elfinder').elfinder({
                debug: false,
                lang: 'jp',
                width: '100%',
                height: '80%',
                customData: {
                    _token: '{{ csrf_token() }}'
                },
                commandsOptions: {
                    getfile: {
                        onlyPath: true,
                        folders: false,
                        multiple: false,
                        oncomplete: 'destroy'
                    },
                    ui : 'uploadbutton'
                },
                mimeDetect: 'internal',
                onlyMimes: [
                    'image/jpeg',
                    'image/jpg',
                    'image/png',
                    'image/gif'
                ],
                url: '{{ route("elfinder.connector") }}',
                soundPath: '{{ asset('packages/barryvdh/elfinder/sounds') }}',
                getFileCallback: function(file) {
                    //Something code

                    $('#elfinderShow').modal('hide');
                },
                resizable: false
            }).elfinder('instance');

        }
    </script>
@endpush
