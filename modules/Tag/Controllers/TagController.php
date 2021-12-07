<?php

namespace Modules\Tag\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Tag\Models\Tag;

class TagController extends Controller {

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
        $data = Tag::query();
        if (isset($request->name)){
            $data = $data->where('name', 'LIKE', '%'.$request->name.'%');
        }
        $data = $data->orderBy("name")->paginate(20);
        $filter = $request->all();

        return view("Tag::index", compact("data", "filter"));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function delete(Request $request, $id) {
        $tag = Tag::query()->find($id);
        $tag->posts()->sync([]);
        $tag->delete();
        $request->session()->flash('success', trans('Deleted successfully.'));

        return back();
    }
}
