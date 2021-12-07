<form action="" method="post" class="form-material" id="user-form">
    @csrf
    @php($prompt = ['' => trans('Select')])
    <div class="row">
        <div class="col-md-8">
            <div class="form-group row">
                <label for="name" class="col-3 title">{{ trans('Name') }}</label>
                <div class="col-9">
                    <input type="text" class="form-control form-control-line" id="name" name="name"
                           value="{{ $data->name ?? null }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-3 title">{{ trans('Username') }}</label>
                <div class="col-9">
                    <input type="text" class="form-control form-control-line" id="username" name="username"
                           value="{{ $data->username ?? null }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-3 title">{{ trans('Phone') }}</label>
                <div class="col-9">
                    <input type="text" class="form-control form-control-line" id="phone" name="phone"
                           value="{{ $data->phone ?? null }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-3 title">{{ trans('Email') }}</label>
                <div class="col-9">
                    <input type="email" class="form-control form-control-line" id="email" name="email"
                           value="{{ $data->email ?? null }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="role" class="col-3 title">{{ trans('Role') }}</label>
                <div class="col-9">
                    {!! Form::select('role_id', $prompt + $roles, $data->role_id ?? NULL, [
                        'id' => 'role',
                        'class' => 'select2 form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-3 title">{{ trans('Status') }}</label>
                <div class="col-9">
                    {!! Form::select('status', $prompt + $statuses, $data->status ?? NULL, [
                        'id' => 'status',
                        'class' => 'select2 form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-3 title">{{ trans('Password') }}</label>
                <div class="col-9">
                    <input type="password" class="form-control form-control-line" id="password" name="password">
                </div>
            </div>
            <div class="form-group row">
                <label for="password_confirmation" class="col-3 title">{{ trans('Confirm Password') }}</label>
                <div class="col-9">
                    <input type="password" class="form-control form-control-line" id="password_confirmation"
                           name="password_confirmation">
                </div>
            </div>
        </div>
    </div>
    <div class="input-group mt-5">
        <button type="submit" class="btn btn-info mr-2">{{ trans('Save') }}</button>
        <button type="reset" class="btn btn-default" data-dismiss="modal">{{ trans('Cancel') }}</button>
    </div>
</form>
@push('js')
    {!! JsValidator::formRequest('Modules\User\Requests\UserRequest','#user-form') !!}
@endpush
