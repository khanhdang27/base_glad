<form action="" method="post" class="form-material" id="product-form" enctype=multipart/form-data>
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
                          rows="11">{{ $data->description ?? NULL }}</textarea>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="image" class="title">{{ trans('Image') }}</label>
                <input type="file" id="image" class="dropify" name="image"
                       data-default-file="{{ asset($data->image ?? null) }}"/>
            </div>
            @if(isset($data))
                <div class="form-group">
                    <a href="#" data-toggle="modal" data-target=".image-gallery" class="btn btn-outline-purple"><i class="fa fa-plus"></i> {{ trans('Add more image') }}
                    </a>
                </div>
            @endif
        </div>
        <div class="col-md-9">
            <div class="form-group">
                <label for="ckeditor" class="title">{{ trans('Content') }}</label>
                <textarea name="content" id="ckeditor">{{ $data->content ?? NULL }}</textarea>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="capacity" class="title">{{ trans('Price') }}</label>
                <input type="number" name="price" class="form-control" value="{{ $data->price ?? NULL }}">
            </div>
            <div class="form-group">
                <label for="capacity" class="title">{{ trans('Capacity') }}</label>
                @php($capacity = isset($data) ? json_decode($data->capacity, 1) : [])
                {!! Form::select('capacity[]', $capacity, $capacity, [
                    'id' => 'capacity',
                    'multiple' => 'multiple',
                    'class' => 'tag-select2 form-control']) !!}
            </div>
            <div class="form-group">
                <label for="tags" class="title">{{ trans('Tag') }}</label>
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
@include("Product::backend.product._multiple_image")
@push('js')
    {!! JsValidator::formRequest('Modules\Product\Requests\ProductRequest','#product-form') !!}

    <script !src="">
        $(document).ready(function () {
            $('.dropify').dropify();
            $('.tag-select2').select2({
                tags: true
            })
        })
    </script>
@endpush
