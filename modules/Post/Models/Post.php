<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Modules\Tag\Models\Tag;
use Modules\User\Models\User;

class Post extends Model {
    use SoftDeletes;

    protected $table = "posts";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

    protected static function boot() {
        parent::boot();

        $author_id = Auth::guard('admin')->user()->id ?? 1;
        static::creating(function ($model) use ($author_id) {
            $model->created_by = $author_id;
            $model->updated_by = $author_id;
        });

        static::updating(function ($model) use ($author_id) {
            $model->updated_by = $author_id;
        });
    }

    /**
     * @param $filter
     * @return Builder
     */
    public static function filter($filter) {
        $data = self::query()->with('category')->with('author')->with('updatedBy');
        if (isset($filter['title'])) {
            $data = $data->where('title', 'LIKE', '%' . $filter['title'] . '%');
        }
        if (isset($filter['status'])) {
            $data = $data->where('status', $filter['status']);
        }
        if (isset($filter['created_by'])) {
            $data = $data->where('created_by', $filter['created_by']);
        }

        return $data;
    }

    /**
     * @return BelongsTo
     */
    public function category() {
        return $this->belongsTo(PostCategory::class, 'cate_id');
    }

    /**
     * @return MorphToMany
     */
    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * @return BelongsTo
     */
    public function author() {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return BelongsTo
     */
    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
