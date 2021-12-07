<?php

namespace Modules\Member\Models;

use App\Models\Member as BaseMember;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Modules\Order\Models\Order;

class Member extends BaseMember {
    use SoftDeletes;

    protected $dates = ["deleted_at"];

    public $timestamps = true;

    /**
     * @param $filter
     * @return Builder
     */
    public static function filter($filter) {
        $query = self::query();
        if (isset($filter['name'])) {
            $query->where('name', 'LIKE', '%' . $filter['name'] . '%');
        }
        if (isset($filter['phone'])) {
            $query->where('phone', 'LIKE', '%' . $filter['phone'] . '%');
        }
        if (isset($filter['email'])) {
            $query->where('email', 'LIKE', '%' . $filter['email'] . '%');
        }
        if (isset($filter['status'])) {
            $query->where('status', $filter['status']);
        }

        return $query;
    }

    /**
     * @return string
     */
    public function getAvatar() {
        $avatar = $this->avatar;
        if (!empty($avatar) && File::exists(base_path() . '/storage/app/public/' . $avatar)) {
            return url('/storage/' . $avatar);
        }
        return asset('/image/user.png');
    }

    /**
     * @param null $status
     * @return array
     */
    public static function getArray($status = null) {
        $query = self::query()->select('id', 'name', 'phone', 'email', 'username');
        if (!empty($status)) {
            $query = $query->where('status', $status);
        }
        $query = $query->orderBy('name', 'asc')->get();

        $data = [];

        foreach ($query as $item) {
            $data[$item->id] = $item->name . ' | ' . $item->phone . ' | ' . $item->username;
        }

        return $data;
    }

    /**
     * @return HasMany
     */
    public function orders() {
        return $this->hasMany(Order::class, 'member_id');
    }

}
