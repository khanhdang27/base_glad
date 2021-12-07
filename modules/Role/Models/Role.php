<?php

namespace Modules\Role\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\BaseModel;
use Modules\Permission\Models\Permission;
use Modules\User\Models\User;

class Role extends BaseModel {
    use SoftDeletes;

    protected $table = "roles";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;

    const ADMINISTRATOR = 'Administrator';

    protected static function boot() {
        parent::boot();

        static::deleting(function ($role) {
            $role->users->each->delete();
        });
    }

    /**
     * @return Builder|Model|object|null
     */
    public static function getAdminRole() {
        return self::query()->where('name', self::ADMINISTRATOR)->first();
    }

    /**
     * @return HasMany
     */
    public function users() {
        return $this->hasMany(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function permissions() {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }
}
