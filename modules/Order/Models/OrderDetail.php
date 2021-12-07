<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Member\Models\Member;
use Modules\Product\Models\Product;
use Modules\User\Models\User;

class OrderDetail extends Model
{
    protected $table = "order_details";

    protected $primaryKey = "id";

    protected $guarded = [];

    public $timestamps = true;


    /**
     * @return BelongsTo
     */
    public function order() {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * @return BelongsTo
     */
    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
