<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Member\Models\Member;
use Modules\PaymentMethod\Models\PaymentMethod;
use Modules\User\Models\User;

class Order extends Model {
    use SoftDeletes;

    protected $table = "orders";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

    const STATUS_DRAFT = 0;
    const STATUS_PAID = 1;
    const STATUS_ABORT = -1;

    /**
     * @param $filter
     * @return Builder
     */
    public static function filter($filter) {
        $query = self::query()
            ->with('orderDetails')
            ->with('member')
            ->with('creator');
        if (isset($filter['status'])) {
            $query->where('status', $filter['status']);
        }
        if (isset($filter['code'])) {
            $query->where('code', 'LIKE', '%' . $filter['code'] . '%');
        }
        if (isset($filter['month'])) {
            $query->whereMonth('orders.updated_at', $filter['month']);
        }
        if (isset($filter['member_id'])) {
            $query->where('member_id', $filter['member_id']);
        }
        if (isset($filter['order_type'])) {
            $query->where('order_type', $filter['order_type']);
        }
        if (isset($filter['creator'])) {
            $query->where('creator_id', $filter['creator']);
        }

        return $query;
    }

    /**
     * @return array
     */
    public static function getStatus() {
        return [
            self::STATUS_PAID  => trans("Paid"),
            self::STATUS_ABORT => trans("Abort"),
            self::STATUS_DRAFT => trans("Draft"),
        ];
    }

    /**
     * @return BelongsTo
     */
    public function member() {
        return $this->belongsTo(Member::class, 'member_id');
    }

    /**
     * @return BelongsTo
     */
    public function creator() {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * @return BelongsTo
     */
    public function paymentMethod() {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }


    /**
     * @return HasMany
     */
    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }


}
