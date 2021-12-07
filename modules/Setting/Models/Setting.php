<?php

namespace Modules\Setting\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\BaseModel;

class Setting extends BaseModel {

    protected $table = "settings";

    protected $primaryKey = "id";

    protected $guarded = [];

    public $timestamps = false;

    /**
     * @param $key
     * @return |null
     */
    public static function getValueByKey($key) {

        $setting = self::query()->where('key', $key)->first();

        if (!empty($setting)) {
            return $setting->value;
        }

        return NULL;
    }

}
