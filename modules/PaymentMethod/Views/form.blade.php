<form action="" method="post" id="paymentmethod-form">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-md-4">
            <label for="name">{{ trans('Name') }}</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name ?? old('name') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="status">{{ trans('Status') }}</label>
        </div>
        <div class="col-md-8">
            @php($prompt = ['' => trans('Select')])
            {!! Form::select('status', $prompt + $statuses, $data->status ?? NULL, [
                'id' => 'status',
                'class' => 'select2 form-control',
                'style' => 'width: 100%']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="description">{{ trans('Description') }}</label>
        </div>
        <div class="col-md-8">
            <textarea name="description" id="description" class="form-control"
                      rows="5">{{ $data->description ?? NULL }}</textarea>
        </div>
    </div>
    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">{{ trans('Save') }}</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">{{ trans('Cancel') }}</button>
    </div>
</form>
{!! JsValidator::formRequest('Modules\PaymentMethod\Requests\PaymentMethodRequest','#paymentmethod-form') !!}
