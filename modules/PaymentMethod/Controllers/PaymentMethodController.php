<?php

namespace Modules\PaymentMethod\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\PaymentMethod\Models\PaymentMethod;
use Modules\PaymentMethod\Requests\PaymentMethodRequest;

class PaymentMethodController extends Controller {

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
        $data = PaymentMethod::query();
        if (isset($request->name)){
            $data = $data->where('name', 'LIKE', '%'.$request->name.'%');
        }

        $data = $data->orderBy("name")->paginate(20);

        return view("PaymentMethod::index", compact("data", "filter"));
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

        return view('PaymentMethod::form', compact('statuses'))->render();
    }

    /**
     * @param PaymentMethodRequest $request
     * @return RedirectResponse
     */
    public function postCreate(PaymentMethodRequest $request) {
        PaymentMethod::query()->create($request->all());
        $request->session()->flash('success', trans('Created successfully.'));

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse|string
     */
    public function getUpdate(Request $request, $id) {
        $statuses = Status::getStatuses();
        $data     = PaymentMethod::query()->find($id);

        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view('PaymentMethod::form', compact('statuses', 'data'))->render();
    }

    /**
     * @param PaymentMethodRequest $request
     * @return RedirectResponse
     */
    public function postUpdate(PaymentMethodRequest $request, $id) {
        PaymentMethod::query()->find($id)->update($request->all());
        $request->session()->flash('success', trans('Updated successfully.'));

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function delete(Request $request, $id) {
        PaymentMethod::query()->find($id)->delete();
        $request->session()->flash('success', trans('Deleted successfully.'));

        return redirect()->back();
    }
}
