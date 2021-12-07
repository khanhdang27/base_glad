<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\BaseModel;

class PostCategory extends BaseModel {
    use SoftDeletes;

    protected $table = "post_categories";

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
    public function posts() {
        return $this->hasMany(Post::class, 'cate_id');
    }
}
