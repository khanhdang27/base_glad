<?php

namespace Modules\Permission\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Permission\Models\Permission;
use Modules\Role\Models\Role;

class PermissionRole extends BaseModel {

    protected $table = 'permission_role';

    protected $guarded = [];

    public $timestamps = FALSE;

    /**
     * @return BelongsTo
     */
    public function permission() {
        return $this->belongsTo(Permission::class);
    }

    /**
     * @return BelongsTo
     */
    public function role() {
        return $this->belongsTo(Role::class);
    }

    /**
     * @param $permission_id
     * @param $role_id
     *
     * @return bool
     */
    public static function checkRolePermission($permission_id, $role_id) {
        $data = self::query()->where('permission_id', $permission_id)->where('role_id', $role_id)->first();
        return (!empty($data)) ? TRUE : FALSE;
    }
}
