<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\Role\Models\Role;
use Modules\User\Models\User;
use Modules\User\Requests\UserRequest;

class UserController extends Controller {

    /**
     * @return Factory|View
     */
    public function index(Request $request) {
        $filter = $request->all();
        $data = User::filter($filter)->orderBy('name')->paginate(20);
        $roles    = Role::getArray();
        $statuses = Status::getStatuses();

        return view('User::index', compact('data', 'roles', 'filter', 'statuses'));
    }

    /**
     * @return Factory|View
     */
    public function getCreate() {
        $statuses = Status::getStatuses();
        $roles    = Role::getArray();
        return view('User::create', compact('statuses', 'roles'));
    }

    /**
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function postCreate(UserRequest $request) {
        $data = $request->all();
        unset($data['password_confirmation']);
        User::create($data);
        $request->session()->flash('success', trans('Created successfully.'));

        return redirect()->route('get.user.list');
    }

    /**
     * @return Factory|View
     */
    public function getUpdate($id) {
        $data     = User::find($id);
        $statuses = Status::getStatuses();
        $roles    = Role::getArray();
        return view('User::update', compact('data', 'statuses', 'roles'));
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postUpdate(UserRequest $request, $id) {
        $data = $request->all();
        if (empty($request->password)) {
            unset($data['password']);
        }
        User::query()->find($id)->update($data);
        $request->session()->flash('success', trans('Created successfully.'));

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function delete(Request $request, $id){
        User::query()->find($id)->delete();
        $request->session()->flash('success', trans('Deleted successfully.'));

        return redirect()->back();
    }
}
