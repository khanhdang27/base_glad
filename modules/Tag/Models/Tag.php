<?php

namespace Modules\Tag\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Base\Models\BaseModel;
use Modules\Post\Models\Post;

class Tag extends BaseModel {
    protected $table = "tags";

    protected $primaryKey = "id";

    protected $guarded = [];

    public $timestamps = true;

    /**
     * @param $data
     * @return array
     */
    public static  function createTags($data) {
        $ids = [];
        foreach ($data as $item) {
            $tag = self::query()->firstOrCreate($item);
            $ids[] = $tag->id;
        }

        return $ids;
    }

    /**
     * @return MorphToMany
     */
    public function posts() {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    /**
     * @return array
     */
    public static function getTagArray() {
        return self::query()->orderBy('name', 'asc')->pluck("name", "name")->toArray();
    }
}
