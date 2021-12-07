<?php

namespace Modules\Coupon\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\Coupon\Models\Coupon;
use Modules\Coupon\Requests\CouponRequest;

class CouponController extends Controller {

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
        $statuses = Status::getStatuses();
        $filter = $request->all();
        $data = Coupon::filter($filter)->orderBy("code")->paginate(20);

        return view("Coupon::backend.index", compact("data", "filter", "statuses"));
    }

    /**
     * @param Request $request
     * @return string
     */
    public function getCreate(Request $request) {
        $statuses = Status::getStatuses();

        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view("Coupon::backend.form", compact("statuses"))->render();
    }

    /**
     * @param CouponRequest $request
     * @return RedirectResponse
     */
    public function postCreate(CouponRequest $request) {
        $data         = $request->all();
        $data['expiration_date'] = formatDate(strtotime($request->expiration_date), 'Y-m-d H:i');
        Coupon::query()->create($data);
        $request->session()->flash('success', 'Created Successfully.');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse|string
     */
    public function getUpdate(Request $request, $id) {
        $statuses = Status::getStatuses();
        $data     = Coupon::query()->find($id);
        $data->expiration_date = formatDate(strtotime($data->expiration_date), 'd-m-Y H:i');
        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view("Coupon::backend.form", compact("statuses", "data"))->render();
    }

    /**
     * @param CouponRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postUpdate(CouponRequest $request, $id) {
        $data         = $request->all();
        $data['expiration_date'] = formatDate(strtotime($request->expiration_date), 'Y-m-d H:i');
        Coupon::query()->find($id)->update($data);
        $request->session()->flash('success', 'Updated Successfully.');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse|string
     */
    public function delete(Request $request, $id) {
        Coupon::query()->find($id)->delete();
        $request->session()->flash('success', 'Deleted Successfully.');

        return redirect()->back();
    }
}
