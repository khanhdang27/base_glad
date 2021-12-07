<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;

class ProductImage extends BaseModel {

    protected $table = "product_images";

    protected $primaryKey = "id";

    protected $guarded = [];

    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
