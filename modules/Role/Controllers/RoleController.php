<?php

namespace Modules\Role\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\Role\Models\Role;
use Modules\Role\Requests\RoleRequest;


class RoleController extends Controller {

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

        $data = Role::query();
        if (isset($request->name)){
            $data->where('name', 'LIKE', '%'.$request->name.'%');
        }

        $filter = $request->all();

        $data = $data->orderBy('name')->paginate(20);
        return view("Role::index", compact('data', 'filter'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|string
     */
    public function getCreate(Request $request) {
        $statuses = Status::getStatuses();

        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view('Role::form', compact('statuses'))->render();
    }

    /**
     * @param RoleRequest $request
     * @return RedirectResponse
     */
    public function postCreate(RoleRequest $request) {
        Role::create($request->all());
        $request->session()->flash('success', trans('Created successfully.'));

        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View
     */
    public function getUpdate(Request $request, $id) {
        $data = Role::query()->find($id);
        $statuses = Status::getStatuses();

        return view('Role::form', compact('data', 'statuses'));
    }

    /**
     * @param RoleRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postUpdate(RoleRequest $request, $id) {
        $data = Role::query()->find($id);
        $data->update($request->all());
        $request->session()->flash('success', trans('Updated successfully.'));

        return back();
    }

    public function delete(Request $request, $id){
        Role::query()->find($id)->delete();
        $request->session()->flash('success', trans('Deleted successfully.'));

        return back();
    }
}
