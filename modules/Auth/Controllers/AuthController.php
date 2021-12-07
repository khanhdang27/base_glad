<?php

namespace Modules\Auth\Controllers;

use App\AppHelpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Base\Models\Status;
use Modules\User\Models\User;

class AuthController extends Controller {

    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->auth = Auth::guard('admin');
    }

    /**
     * @param Request $request
     * @return Factory|View|RedirectResponse
     */
    public function login(Request $request) {
        if ($this->auth->check()) {
            return redirect()->route('admin.dashboard');
        }

        if ($request->post()){
            $credentials = $request->only('email', 'password');
            $credentials['deleted_at'] = null;

            if ($this->auth->attempt($credentials, $request->has('remember_me'))) {
                if ($this->auth->user()->status != Status::STATUS_ACTIVE && (Auth::user()->role->status ?? NULL) != Status::STATUS_ACTIVE){
                    $request->session()->flash('danger',
                        trans('Your account is inactive. Please contact with admin page to get more information.'));
                    return $this->logout();
                }

                return redirect()->route('admin.dashboard');
            }
            $request->session()->flash('danger', trans('Incorrect username or password'));

            return $this->logout();
        }

        return view("Auth::backend.login");
    }

    /**
     * @return RedirectResponse
     */
    public function logout() {
        $this->auth->logout();

        return redirect()->route('admin.get.login');
    }

    /**
     * @param Request $request
     * @return Factory|View|RedirectResponse
     */
    public function forgotPassword(Request $request) {
        if($request->post()) {
            $user = User::query()->where('email', $request->email)->first();
            if(!empty($user)) {
                $password = Str::random(6);
                $body     = '';
                $body     .= "<div><p>" . trans("Your password: ") . $password . "</p></div>";
                $body     .= '<div><i><p style="color: red">' . trans("You should change password after login.") . '</p></i></div>';
                $send     = Helper::sendMail($user->email, trans('Reset password'), trans('Reset password'), $body);
                if($send) {
                    $user->password = $password;
                    $user->save();
                    $request->session()->flash('success', trans('Send email successfully. Please check your email'));
                }else{
                    $request->session()->flash('danger', trans('Can not send email. Please contact with admin.'));
                }
            } else {
                $request->session()->flash('danger', trans('Your email not exist.'));
            }

            return redirect()->route('admin.get.login');
        }

        return view("Auth::backend.forgot_password");
    }
}
