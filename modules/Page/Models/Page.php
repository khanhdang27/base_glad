<?php

namespace Modules\Page\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Modules\User\Models\User;

class Page extends Model
{
    use SoftDeletes;

    protected $table = "pages";

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

    const ABOUT_US = 'ABOUT_US';
    const OUR_MISSION = 'OUR_MISSION';
    const SHIPPING_INFORMATION = 'SHIPPING_INFORMATION';
    const COMMON_PROBLEM = 'COMMON_PROBLEM';
    const CONTACT_US = 'CONTACT_US';

    public static function getPageList()
    {
        return [
            self::ABOUT_US => trans('About Us'),
            self::OUR_MISSION => trans('Our Mission'),
            self::SHIPPING_INFORMATION => trans('Shipping Information'),
            self::COMMON_PROBLEM => trans('Common Problem'),
            self::CONTACT_US => trans('Contact Us'),
        ];
    }

    /**
     * @param array $filter
     * @return Builder
     */

    public static function filter(array $filter)
    {
        $data = self::query()->with('author')->with('updatedBy');
        if (isset($filter['name'])) {
            $data = $data->where('name', 'LIKE', '%' . $filter['name'] . '%');
        }
        if (isset($filter['page_id'])) {
            $data = $data->where('page_id', $filter['page_id']);
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
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return BelongsTo
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
