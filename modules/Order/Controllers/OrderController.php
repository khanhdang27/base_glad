<?php

namespace Modules\Order\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\Member\Models\Member;
use Modules\Order\Models\Order;
use Modules\User\Models\User;

class OrderController extends Controller {

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
        $members  = Member::getArray(Status::STATUS_ACTIVE);
        $statuses = Order::getStatus();
        $creators = User::query()->pluck('name', 'id')->toArray();
        $data     = Order::filter($request->all())->orderBy("code")->paginate(20);
        $filter   = $request->all();

        return view("Order::index", compact("data", "members", "statuses", "creators", "filter"));
    }


    /**
     * @param Request $request
     * @param $id
     * @return Factory|View|RedirectResponse
     */
    public function getDetail(Request $request, $id) {
        $data = Order::query()
            ->find($id)
            ->with('creator')
            ->with(['orderDetails' => function($od){
                $od->with('product');
            }])
            ->first();

        if (!$request->ajax()) {
            return redirect()->route('get.order.list');
        }

        return view("Order::detail", compact("data"));
    }
}
