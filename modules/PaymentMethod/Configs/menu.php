<?php
return [
    'name' => trans('Payment Method'),
    'route' => route('get.payment_method.list'),
    'sort' => 6,
    'active'=> TRUE,
    'id'=> 'payment-method',
    'icon' => '<i class="mdi mdi-credit-card-multiple"></i>',
    'middleware' => [],
    'group' => []
];
