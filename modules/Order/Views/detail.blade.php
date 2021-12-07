@php
    /** @var Order $data */
    use Modules\Order\Models\Order;
    $order_details = $data->orderDetails
@endphp

<style>
    .modal-lg {
        max-width: 1000px;
    }
</style>
<div id="invoice" class="container">
    <div id="company-info">
        <h3>GLAD</h3>
        <p class="mb-1">
            {{ trans('Address') }}: Somewhere
        </p>
        <p class="mb-1">
            {{ trans('Tel') }}: 12345678
        </p>
        <p class="mb-1">
            {{ trans('Fax') }}: 12345678
        </p>
        <hr>
    </div>
    <div id="content">
        <div class="text-center title">
            <h3>{{ trans('INVOICE') }}</h3>
        </div>
        <div class="info mb-3 row">
            <div class="col-6">
                <div class="row">
                    <div class="col-4">
                        {{ trans('To') }}
                    </div>
                    <div class="col-8">
                        : {{ $data->member->name ?? "N/A"}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        {{ trans('Email') }}
                    </div>
                    <div class="col-8">
                        : {{ $data->member->email  ?? "N/A"}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        {{ trans('Phone') }}
                    </div>
                    <div class="col-8">
                        : {{ $data->member->phone ?? "N/A" }}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-4">
                        {{ trans('Invoice Code') }}
                    </div>
                    <div class="col-8">
                        : <span
                            class="font-weight-bold">{{ $data->code }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        {{ trans('Purchase/Abort At') }}
                    </div>
                    <div class="col-8">
                        : {{ formatDate(strtotime($data->updated_at), 'd-m-Y H:i') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        {{ trans('Creator') }}
                    </div>
                    <div class="col-8">
                        : {!! $data->creator->name ?? $data->creator_name." <span class='text-danger'>(".trans('This data has been deleted').")</span>" ?? "N/A" !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        {{ trans('Created At') }}
                    </div>
                    <div class="col-8">
                        : {{ formatDate(strtotime($data->created_at), 'd-m-Y H:i') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        {{ trans('Status') }}
                    </div>
                    <div class="col-8">
                        :
                        <span
                            class="font-weight-bold">{{ Order::getStatus()[$data->status] }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        {{ trans('Payment Method') }}
                    </div>
                    <div class="col-8">
                        : {{ $data->paymentMethod->name ?? NULL }}
                    </div>
                </div>
            </div>
        </div>

        <div class="product-list">
            <div class="table-responsive mb-3">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('Product') }}</th>
                        <th>{{ trans('Price') }}</th>
                        <th class="text-center">{{ trans('Quantity') }}</th>
                        <th>{{ trans('Total Price') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_details as $key => $order_detail)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $order_detail->product->name ?? $order_detail->product_name }}</td>
                            <td>{{ moneyFormat($order_detail->price) }}</td>
                            <td class="text-center">{{ $order_detail->quantity }}</td>
                            <td>{{ moneyFormat($order_detail->amount) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"></td>
                        <td><h6>{{ trans('Amount') }}:</h6></td>
                        <td><h6>{{ moneyFormat($data->amount) }}</h6></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container">
    @if($data->status !== Order::STATUS_DRAFT)
        <button class="btn btn-primary print"><i class="mdi mdi-printer"></i></button>
    @else
        @php($route = ($data->order_type === Order::SERVICE_TYPE) ? route('get.member_service.add',$data->member->id) : route('get.member_course.add',$data->member->id))
        <a href="{{ $route }}"
           class="btn btn-warning text-light"> {{ trans('Go to Purchase') }}</a>
    @endif
</div>

<script>
    $(document).on('click', '.print', function () {
        printJS({
            printable: 'invoice',
            type: 'html',
            css: ['/assets/bootstrap/css/bootstrap.min.css']
        })
    });
</script>
