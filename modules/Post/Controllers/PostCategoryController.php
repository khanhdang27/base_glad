<?php

namespace Modules\Post\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\Post\Models\Post;
use Modules\Post\Models\PostCategory;
use Modules\Post\Requests\PostCategoryRequest;

class PostCategoryController extends Controller {

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
        $filter = $request->all();
        $data = PostCategory::query();
        if (isset($request->name)){
            $data = $data->where('name', 'LIKE', '%'.$request->name.'%');
        }
        $data = $data->orderBy("name")->paginate(20);

        return view("Post::backend.post_category.index", compact("data", 'filter'));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function getCreate(Request $request) {
        $statuses = Status::getStatuses();

        return view("Post::backend.post_category.form", compact("statuses"));
    }

    /**
     * @param PostCategoryRequest $request
     * @return RedirectResponse
     */
    public function postCreate(PostCategoryRequest $request) {
        PostCategory::query()->create($request->all());
        $request->session()->flash('success', trans('Created successfully.'));

        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View
     */
    public function getUpdate(Request $request, $id) {
        $statuses = Status::getStatuses();
        $data = PostCategory::query()->find($id);
        return view("Post::backend.post_category.form", compact("data", "statuses"));
    }

    /**
     * @param PostCategoryRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postUpdate(PostCategoryRequest $request, $id) {
        PostCategory::query()->find($id)->update($request->all());
        $request->session()->flash('success', trans('Updated successfully.'));

        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function delete(Request $request, $id) {
        PostCategory::query()->find($id)->delete();

        return back();
    }

}
