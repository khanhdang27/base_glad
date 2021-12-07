@extends("Base::backend.master")
@php
    $prompt = ['' => trans('All')]
@endphp
@section("content")
    <div class="user-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">{{ trans('User') }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('User') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="{{ route("get.user.create") }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>&nbsp; {{ trans("Add New") }}
            </a>
        </div>
        <!--Search box-->
        <div class="search-box">
            <div class="card">
                <div class="card-header" data-toggle="collapse" data-target="#form-search-box" aria-expanded="false"
                     aria-controls="form-search-box">
                    <div class="title">{{ trans("Search") }}</div>
                </div>
                <div class="card-body collapse show" id="form-search-box">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="text-input">{{ trans("Name") }}</label>
                                    <input type="text" class="form-control" id="text-input" name="name"
                                           value="{{ $filter['name'] ?? null}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="text-input">{{ trans('Role') }}</label>
                                    {!! Form::select('role_id', $prompt + $roles, $filter['role_id'] ?? NULL, ['class' => 'select2 form-control', 'style' => 'width:"100px"']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="text-input">{{ trans('Status') }}</label>
                                    {!! Form::select('status', $prompt + $statuses, $filter['status'] ?? NULL, ['class' => 'select2 form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn btn-info mr-2">{{ trans("Search") }}</button>
                            <button type="button" class="btn btn-default clear">{{ trans("Cancel") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="listing">
            <div class="card">
                <div class="card-body">
                    <div class="sumary">
                        {!! summaryListing($data) !!}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('Name') }}</th>
                                <th>{{ trans('Username') }}</th>
                                <th>{{ trans('Phone') }}</th>
                                <th>{{ trans('Email') }}</th>
                                <th>{{ trans('Role') }}</th>
                                <th>{{ trans('Status') }}</th>
                                <th>{{ trans('Created At') }}</th>
                                <th class="action">{{ trans('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($key = ($data->currentpage()-1)*$data->perpage()+1)
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$key++}}</td>
                                    <td>{{ trans($item->name) }}</td>
                                    <td>{{ trans($item->username) }}</td>
                                    <td>{{ trans($item->phone) }}</td>
                                    <td>{{ trans($item->email) }}</td>
                                    <td>{{ $roles[$item->role_id] ?? 'N/A' }}</td>
                                    <td>{{ $statuses[$item->status] ?? null }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i:s')}}</td>
                                    <td class="link-action">
                                        @if(($item->name == \Modules\Role\Models\Role::ADMINISTRATOR && auth('admin')->user()->name == \Modules\Role\Models\Role::ADMINISTRATOR)
                                            || $item->name != \Modules\Role\Models\Role::ADMINISTRATOR)
                                            <a href="{{ route('get.user.update',$item->id) }}"
                                               class="btn btn-primary">
                                                <i class="fa fa-pencil"></i></a>
                                        @endif
                                        @if((auth('admin')->user()->id !== $item->id
                                            && ($item->role->name ?? null) !== \Modules\Role\Models\Role::ADMINISTRATOR)
                                            || auth('admin')->user()->name == \Modules\Role\Models\Role::ADMINISTRATOR)
                                            <a href="{{ route('get.user.delete',$item->id) }}"
                                               class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-5 pagination-style">
                            {{ $data->withQueryString()->render('vendor/pagination/default') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
