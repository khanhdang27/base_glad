@extends("Base::backend.master")

@section("content")
    <div id="member-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">{{ trans("Member") }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans("Home") }}</a></li>
                        <li class="breadcrumb-item active">{{ trans("Member") }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="{{ route('get.member.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>&nbsp; {{ trans("Add New") }}
            </a>
        </div>
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
                        <div class="col-md-3 form-group">
                            <label for="name">{{ trans("Client name") }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $filter['name'] ?? null }}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="phone">{{ trans("Phone Number") }}</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                   value="{{ $filter['phone'] ?? null }}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="email">{{ trans("Email") }}</label>
                            <input type="text" class="form-control" id="text-input" name="email"
                                   value="{{ $filter['email'] ?? null }}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="status">{{ trans('Status') }}</label>
                            <select name="status" id="status" class="select2 form-control">
                                <option value="">{{ trans('All') }}</option>
                                @foreach($statuses as $key => $status)
                                    <option value="{{ $key }}"
                                            @if(isset($filter['status']) && $filter['status'] == $key) selected @endif>{{ $status }}</option>
                                @endforeach
                            </select>
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
                    {!! summaryListing($members) !!}
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th>{{ trans('Name') }}</th>
                            <th>{{ trans('Username') }}</th>
                            <th>{{ trans('Email') }}</th>
                            <th>{{ trans('Phone Number') }}</th>
                            <th>{{ trans('Status') }}</th>
                            <th>{{ trans('Created At') }}</th>
                            <th>{{ trans('Updated At') }}</th>
                            <th style="width: 200px;" class="text-center">{{ trans('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($key = ($members->currentpage()-1)*$members->perpage()+1)
                        @foreach($members as $member)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->username }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->phone }}</td>
                                <td>{{ $statuses[$member->status] }}</td>
                                <td>{{ \Carbon\Carbon::parse($member->created_at)->format('d/m/Y H:i:s')}}</td>
                                <td>{{ \Carbon\Carbon::parse($member->updated_at)->format('d/m/Y H:i:s')}}</td>
                                <td class="text-center">
                                    <a href="{{ route('get.member.update',$member->id) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('get.member.delete',$member->id) }}"
                                       class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5 pagination-style">
                        {{ $members->withQueryString()->render('vendor.pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
