@extends("Base::backend.master")

@section("content")
    <div id="coupon-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">{{ trans("Coupon") }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans("Home") }}</a></li>
                        <li class="breadcrumb-item active">{{ trans("Coupon") }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="{{ route("get.coupon.create") }}" class="btn btn-primary"
               data-toggle="modal" data-target="#form-modal" data-title="{{ trans("Create Coupon") }}">
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="code">{{ trans("Coupon Code") }}</label>
                                <input type="text" class="form-control" id="code" name="code"
                                       value="{{ $filter['code'] ?? NULL }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="expiration_date">{{ trans("Expiration Date") }}</label>
                                <input type="text" class="form-control date" id="expiration_date" name="expiration_date"
                                       value="{{ $filter['expiration_date'] ?? NULL }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="text-input">{{ trans('Status') }}</label>
                                @php($prompt = ['' => trans('Select')])
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
                            <th>{{ trans('Code') }}</th>
                            <th>{{ trans('Discount') }}</th>
                            <th>{{ trans('Image') }}</th>
                            <th>{{ trans('Expiration Date') }}</th>
                            <th>{{ trans('Status') }}</th>
                            <th>{{ trans('Created At') }}</th>
                            <th>{{ trans('Updated At') }}</th>
                            <th class="action">{{ trans('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($key = ($data->currentpage()-1)*$data->perpage()+1)
                        @foreach($data as $item)
                            <tr>
                                <td>{{$key++}}</td>
                                <td>{{ trans($item->code) }}</td>
                                <td>{{ trans($item->discount) }}%</td>
                                <td class="image-box">
                                    @if(!empty($item->image))
                                        <div class="image-item image-in-listing">
                                            <a href="{{ asset($item->image) }}" target="">
                                                <img src="{{ asset($item->image) }}" width="120"
                                                     alt="{{ $item->title }}">
                                            </a>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ formatDate(strtotime($item->expiration_date), 'd-m-Y H:i') }}</td>
                                <td>{{ \Modules\Base\Models\Status::getStatus($item->status) ?? null }}</td>
                                <td>{{ formatDate(strtotime($item->created_at), 'd-m-Y H:i:s')}}</td>
                                <td>{{ formatDate(strtotime($item->updated_at), 'd-m-Y H:i:s')}}</td>
                                <td class="link-action">
                                    <a href="{{ route('get.coupon.update', $item->id) }}" class="btn btn-primary"
                                       data-toggle="modal" data-target="#form-modal"
                                       data-title="{{ trans("Update Coupon") }}">
                                        <i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('get.coupon.delete', $item->id) }}"
                                       class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5 pagination-style">
                        {{ $data->withQueryString()->render("vendor/pagination/default") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! getModal(["class" => "modal-ajax", "size" => "modal-lg"]) !!}
@endsection
