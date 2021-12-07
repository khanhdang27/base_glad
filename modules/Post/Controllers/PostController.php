<?php

namespace Modules\Post\Controllers;

use App\AppHelpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\Post\Models\Post;
use Modules\Post\Models\PostCategory;
use Modules\Post\Requests\PostRequest;
use Modules\Tag\Models\Tag;
use Modules\User\Models\User;

class PostController extends Controller {

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        # parent::__construct();
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request) {
        $filter   = $request->all();
        $statuses = Status::getStatuses();
        $authors  = User::query()->orderBy("name")->pluck('name', 'id')->toArray();
        $data     = Post::filter($filter)->orderBy("created_at", "DESC")->paginate(20);

        return view("Post::backend.post.index", compact("data", "filter", "statuses", "authors"));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function getCreate(Request $request) {
        $statuses   = Status::getStatuses();
        $categories = PostCategory::getArray();
        $tags       = Tag::getTagArray();

        return view("Post::backend.post.create", compact("statuses", "categories", "tags"));
    }

    /**
     * @param PostRequest $request
     * @return string
     */
    public function postCreate(PostRequest $request) {
        $data = $request->all();
        unset($data['tags']);
        unset($data['image']);
        $tag_ids = Tag::createTags($request->tags);
        $post    = Post::query()->create($data);
        if ($request->hasFile('image')) {
            $image       = $request->image;
            $post->image = Helper::storageFile($image, time() . '_' . $image->getClientOriginalName(), 'Post/' . $post->id);
        }
        $post->save();
        $post->tags()->sync($tag_ids);
        $request->session()->flash('success', trans('Created successfully.'));

        return redirect()->route('get.post.list');
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function getUpdate($id) {
        $data       = Post::query()->find($id);
        $statuses   = Status::getStatuses();
        $categories = PostCategory::getArray();
        $tags       = Tag::getTagArray();

        return view("Post::backend.post.update", compact("data", "statuses", "categories", "tags"));
    }

    /**
     * @param PostRequest $request
     * @return string
     */
    public function postUpdate(PostRequest $request, $id) {
        $data = $request->all();
        unset($data['tags']);
        $tag_ids = Tag::createTags($request->tags);
        $post    = Post::query()->find($id);
        if ($request->hasFile('image')) {
            $image = $request->image;
            if (file_exists($post->image)) {
                unlink($post->image);
            }
            $data['image'] = Helper::storageFile($image, time() . '_' . $image->getClientOriginalName(), 'Post/' . $post->id);
        }
        $post->update($data);
        $post->tags()->sync($tag_ids);
        $request->session()->flash('success', trans('Updated successfully.'));

        return redirect()->route('get.post.list');
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function delete(Request $request, $id) {
        $post = Post::query()->find($id);
        $post->tags()->sync([]);
        $post->delete();
        $request->session()->flash('success', trans('Deleted successfully.'));

        return back();
    }

}
