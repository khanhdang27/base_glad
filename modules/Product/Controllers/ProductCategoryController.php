<?php

namespace Modules\Product\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\Product\Requests\ProductCategoryRequest;
use Modules\Product\Models\ProductCategory;

class ProductCategoryController extends Controller {

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
        $data = ProductCategory::query();
        if (isset($request->name)){
            $data = $data->where('name', 'LIKE', '%'.$request->name.'%');
        }
        $data = $data->orderBy("name")->paginate(20);

        return view("Product::backend.product_category.index", compact("data", 'filter'));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function getCreate(Request $request) {
        $statuses = Status::getStatuses();

        return view("Product::backend.product_category.form", compact("statuses"));
    }

    /**
     * @param ProductCategoryRequest $request
     * @return RedirectResponse
     */
    public function postCreate(ProductCategoryRequest $request) {
        ProductCategory::query()->create($request->all());
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
        $data = ProductCategory::query()->find($id);
        return view("Product::backend.product_category.form", compact("data", "statuses"));
    }

    /**
     * @param ProductCategoryRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postUpdate(ProductCategoryRequest $request, $id) {
        ProductCategory::query()->find($id)->update($request->all());
        $request->session()->flash('success', trans('Updated successfully.'));

        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function delete(Request $request, $id) {
        ProductCategory::query()->find($id)->delete();
        $request->session()->flash('success', trans('Deleted successfully.'));

        return back();
    }

}
