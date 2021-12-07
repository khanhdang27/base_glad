<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\BaseModel;

class ProductCategory extends BaseModel {
    use SoftDeletes;

    protected $table = "product_categories";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

    protected static function boot() {
        parent::boot();

        static::deleting(function ($cate) {
            $cate->posts->each->delete();
        });
    }

    /**
     * @return HasMany
     */
    public function products() {
        return $this->hasMany(Product::class, 'cate_id');
    }
}
