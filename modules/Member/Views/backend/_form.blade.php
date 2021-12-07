<div class="card">
    <form action="" method="post" class="form-material" >
        @csrf
        <div id="member-info">
            <div class="card-header">
                <h4 class="title">{{ trans("Information") }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="name">{{ trans('Name') }}</label>
                        <input type="text" id="name" class="form-control" name="name"
                               value="{{ $member->name ?? old('name') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="phone">{{ trans('Phone Number') }}</label>
                        <input type="tel" id="phone" class="form-control" name="phone"
                               value="{{ $member->phone ?? old('phone') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="email">{{ trans('Email') }}</label>
                        <input type="email" id="email" class="form-control" name="email"
                               value="{{ $member->email ?? old('email') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="address">{{ trans('Address') }}</label>
                        <input type="text" id="address" class="form-control" name="address"
                               value="{{ $member->address ?? old('address') }}">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="birthday">{{ trans('Birthday') }}</label>
                        <input type="text" class="form-control date" id="birthday" name="birthday"
                               value="{{ !empty($member) ? \Carbon\Carbon::parse($member->birthday)->format('d-m-Y') : old('birthday') }}"
                               placeholder="dd-mm-yyyy">
                    </div>
                    <div class="col-md-4 form-group">
                        <label>{{ trans('Sex') }}</label>
                        <select name="sex" id="sex" class="form-control select2">
                            <option value="1">{{ trans('Male') }}</option>
                            <option value="0">{{ trans('Female') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="member-account">
            <div class="card-header">
                <h4 class="title">{{ trans("Account") }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="username">{{ trans('Username') }}</label>
                                <input type="text" id="username" class="form-control" name="username"
                                       value="{{ $member->username ?? old('username') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="status">{{ trans('Status') }}</label>
                                <select name="status" id="status" class="select2 form-control">
                                    @foreach($statuses as $key => $status)
                                        <option value="{{ $key }}"
                                                @if(isset($member) && $member->status === $key) selected @endif>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="password">{{ trans('Password') }}</label>
                                <input type="password" id="password" class="form-control" name="password">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="password_re_enter">{{ trans('Re-enter Password') }}</label>
                                <input type="password" id="password_re_enter" class="form-control" name="password_re_enter">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-group">
            <div class="p-2 mt-5">
                <button type="submit" id="save" class="btn btn-info mr-2">{{ trans('Save') }}</button>
                <button type="reset" class="btn btn-default">{{ trans('Reset') }}</button>
            </div>
        </div>
    </form>
</div>
@push('js')
    {!! JsValidator::formRequest('Modules\Member\Requests\MemberRequest') !!}
@endpush
