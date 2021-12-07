<?php

namespace Modules\User\Models;

use App\Models\User as BaseUser;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Order\Models\Order;
use Modules\Role\Models\Role;

class User extends BaseUser {

    use SoftDeletes;

    protected $primaryKey = "id";

    protected $guarded = [];

    protected $dates = ["deleted_at"];

    public $timestamps = true;

    /**
     * @param $filter
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function filter($filter){
        $query = self::query();
        if(isset($filter['name'])){
            $query->where('name', 'LIKE', '%' . $filter['name'] . '%');
        }
        if(isset($filter['role_id'])){
            $query->where('role_id', $filter['role_id']);
        }
        if(isset($filter['status'])){
            $query->where('status', $filter['status']);
        }

        return $query;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role() {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return HasMany
     */
    public function orders() {
        return $this->hasMany(Order::class, 'creator_id');
    }
}
