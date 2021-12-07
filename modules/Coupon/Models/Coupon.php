<?php

namespace Modules\Coupon\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model {
    use SoftDeletes;

    protected $table = "coupons";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

    /**
     * @param $filter
     * @return Builder
     */
    public static function filter($filter) {
        $data = Coupon::query();
        if (isset($filter['code'])) {
            $data = $data->where('code', 'LIKE', '%' . $filter['code'] . '%');
        }
        if (isset($filter['expiration_date'])) {
            $data = $data->whereDate('expiration_date', '=', formatDate(strtotime($filter['expiration_date']), 'Y-m-d'));
        }
        if (isset($filter['status'])) {
            $data = $data->where('status', $filter['status']);
        }

        return $data;
    }

}
