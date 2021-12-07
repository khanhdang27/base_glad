<?php

namespace Modules\PaymentMethod\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Order\Models\Order;

class PaymentMethod extends Model {
    use SoftDeletes;

    protected $table = "payment_methods";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

    /**
     * @return HasMany
     */
    public function orders() {
        return $this->hasMany(Order::class, 'payment_method_id');
    }
}
