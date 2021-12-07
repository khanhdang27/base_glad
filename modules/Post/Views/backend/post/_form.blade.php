<form action="" method="post" class="form-material" id="post-form" enctype=multipart/form-data>
    @csrf
    @php($prompt = ['' => trans('Select')])
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title" class="title">{{ trans('Title') }}</label>
                <input type="text" class="form-control form-control-line" id="title" name="title"
                       value="{{ $data->title ?? null }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="cate_id" class="title">{{ trans('Category') }}</label>
                {!! Form::select('cate_id', $prompt + $categories, $data->cate_id ?? NULL, [
                    'id' => 'cate_id',
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
                <label for="description" class="title">{{ trans('Description') }}</label>
                <textarea name="description" id="description" class="form-control"
                          rows="10">{{ $data->description ?? NULL }}</textarea>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="image" class="title">{{ trans('Image') }}</label>
                <input type="file" id="image" class="dropify" name="image"
                       data-default-file="{{ asset($data->image ?? null) }}"/>
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
                <label for="input-file-now-custom-1" class="title">{{ trans('Tag') }}</label>
                @php($selected = isset($data) ? $data->tags->pluck("name")->toArray() : NULL)
                {!! Form::select('tags[][name]', $tags, $selected, [
                    'id' => 'tags',
                    'multiple' => 'multiple',
                    'class' => 'tag-select2 form-control']) !!}
            </div>
            @if(isset($data))
                <div class="form-group">
                    <label for="tags" class="title">{{ trans('Updated By') }}</label>
                    <div>{{ $data->updatedBy->name ?? "N/A" }}</div>
                </div>
                <div class="form-group">
                    <label for="tags" class="title">{{ trans('Updated At') }}</label>
                    <div>{{ formatDate(strtotime($data->updated_at), 'd-m-Y H:i:s') }}</div>
                </div>
                <div class="form-group">
                    <label for="tags" class="title">{{ trans('Created By') }}</label>
                    <div>{{ $data->author->name ?? "N/A" }}</div>
                </div>
                <div class="form-group">
                    <label for="tags" class="title">{{ trans('Created At') }}</label>
                    <div>{{ formatDate(strtotime($data->created_at), 'd-m-Y H:i:s') }}</div>
                </div>
            @endif
        </div>
    </div>
    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">{{ trans('Save') }}</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">{{ trans('Cancel') }}</button>
    </div>
</form>
@push('js')
    {!! JsValidator::formRequest('Modules\Post\Requests\PostRequest','#post-form') !!}

    <script !src="">
        $(document).ready(function () {
            $('.dropify').dropify();
            $('.tag-select2').select2({
                tags: true
            })
        })
    </script>
@endpush
