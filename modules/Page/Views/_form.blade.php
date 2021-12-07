<form action="" method="post" class="form-material" id="page-form" enctype=multipart/form-data>
    @csrf
    @php($prompt = ['' => trans('Select')])
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="title">{{ trans('Name') }}</label>
                <input type="text" class="form-control form-control-line" id="name" name="name"
                       value="{{ $data->name ?? null }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="page_id" class="title">{{ trans('Page') }}</label>
                {!! Form::select('page_id', $prompt + $page_list, $data->page_id ?? NULL, [
                    'id' => 'page_id',
                    'class' => 'select2 form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="status" class="title">{{ trans('Status') }}</label>
                {!! Form::select('status', $prompt + $statuses, $data->status ?? NULL, [
                    'id' => 'status',
                    'class' => 'select2 form-control']) !!}
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-group">
                <label for="ckeditor" class="title">{{ trans('Content') }}</label>
                <textarea name="content" id="ckeditor">{{ $data->content ?? NULL }}</textarea>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="image" class="title">{{ trans('Image') }}</label>
                <input type="file" id="image" class="dropify" name="image"
                       data-default-file="{{ asset($data->image ?? null) }}"/>
            </div>
        </div>
    </div>
    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">{{ trans('Save') }}</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">{{ trans('Cancel') }}</button>
    </div>
</form>
@push('js')
    {!! JsValidator::formRequest('Modules\Page\Requests\PageRequest','#page-form') !!}

    <script !src="">
        $(document).ready(function () {
            $('.dropify').dropify();
            $('.tag-select2').select2({
                tags: true
            })
        })
    </script>
@endpush
