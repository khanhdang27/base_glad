@extends("Base::backend.master")

@section("content")
    <div id="order-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">{{ trans("Invoice") }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans("Home") }}</a></li>
                        <li class="breadcrumb-item active">{{ trans("Invoice") }}</li>
                    </ol>
                </div>
            </div>
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
                                <label for="text-input">{{ trans("Invoice Code") }}</label>
                                <input type="text" class="form-control" id="text-input" name="code"
                                       value="{{ $filter['code'] ?? NULL }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="text-input">{{ trans("Member") }}</label>
                                {!! Form::select('member_id', ["" => trans("All")] + $members, $filter['member_id'] ?? NULL, ['class' => 'form-control select2 w-100']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="text-input">{{ trans("Status") }}</label>
                                {!! Form::select('status', ["" => trans("All")] + $statuses, $filter['status'] ?? NULL, ['class' => 'form-control select2 w-100']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="text-input">{{ trans("Month") }}</label>
                                <input type="text" name="month" class="form-control month"
                                       value="{{ $filter['month'] ?? NULL }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="text-input">{{ trans("Creator") }}</label>
                                {!! Form::select('creator', ["" => trans("All")] + $creators, $filter['creator'] ?? NULL, ['class' => 'form-control select2 w-100']) !!}
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
                <div class="sumary d-flex justify-content-between">
                    <span class="listing-information">
                        {!! summaryListing($data) !!}
                    </span>
                    <span class="total-price">
                         <h4>
                             {{ trans('Total:') }}
                             <span class="text-danger font-size-clearfix">
                                 {{ moneyFormat($data->sum('total_price')) }}
                             </span>
                         </h4>
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th>{{ trans("Invoice Code") }}</th>
                            <th>{{ trans("Status") }}</th>
                            <th>{{ trans("Member") }}</th>
                            <th>{{ trans("Total Price") }}</th>
                            <th>{{ trans("Purchase/Abort At") }}</th>
                            <th>{{ trans("Payment Method") }}</th>
                            <th>{{ trans("Creator") }}</th>
                            <th class="action text-center">{{ trans("Action") }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $key = ($data->currentpage() - 1) * $data->perpage() + 1 ?>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td><h5>{{ $item->code }}</h5></td>
                                @php
                                    $bg_status = "bg-danger";
                                    if($item->status === Modules\Order\Models\Order::STATUS_DRAFT)
                                        $bg_status = 'bg-warning';
                                    elseif($item->status === Modules\Order\Models\Order::STATUS_PAID)
                                       $bg_status = 'bg-success';
                                @endphp
                                <td>
                                    <span class="status-box {{ $bg_status }}">
                                        {{ $statuses[$item->status] }}
                                    </span>
                                </td>
                                <td>
                                    @if(isset($item->member->id))
                                        <a href="{{ route('get.member.update', $item->member_id) }}"
                                           target="_blank">{{ $item->member_name  }}</a>
                                    @else
                                        {{ $item->member_name  }}
                                    @endif
                                </td>
                                <td>{{ moneyFormat($item->total_price) }}</td>
                                <td>{{ formatDate(strtotime($item->updated_at), 'd-m-Y H:i') }}</td>
                                <td>{{ $item->paymentMethod->name ?? NULL }}</td>
                                <td>{{ $item->creator_name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('get.order.detail', $item->id) }}"
                                       class="btn btn-outline-info"
                                       data-toggle="modal" data-title="{{ trans('Invoice Detail') }}"
                                       data-target="#form-modal">
                                        <i class="mdi mdi-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5 pagination-style">
                        {{ $data->withQueryString()->render('vendor.pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! getModal(["class" => "modal-ajax", "size" => "modal-lg"]) !!}
@endsection
