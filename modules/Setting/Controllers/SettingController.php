<?php

namespace Modules\Setting\Controllers;

use App\AppHelpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Setting\Models\MailConfig;

class SettingController extends Controller {

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
        return view("Setting::index");
    }

    /**
     * @param Request $request
     * @return Factory|View|RedirectResponse
     */
    public function emailConfig(Request $request) {
        $post = $request->post();
        $mail_config = MailConfig::getMailConfig();
        if ($post) {
            unset($post['_token']);
            foreach ($post as $key => $value) {
                $mail_config = MailConfig::query()->where('key', $key)->first();
                if (!empty($mail_config)) {
                    $mail_config->update(['value' => $value]);
                } else {
                    $mail_config = new MailConfig();
                    $mail_config->key = $key;
                    $mail_config->value = $value;
                    $mail_config->save();
                }
            }

            $request->session()->flash('success', 'Updated successfully.');

            return redirect()->back();
        }

        return view("Setting::setting.email", compact('mail_config'));
    }

    /**
     * @return RedirectResponse
     */
    public function testSendMail(Request $request) {
        $mail_to = MailConfig::getValueByKey(MailConfig::MAIL_ADDRESS);
        $subject = 'Test email';
        $title = 'Test email function';
        $body = 'We are testing email!';
        $send = Helper::sendMail($mail_to, $subject, $title, $body);
        if ($send) {
            $request->session()->flash('success', 'Mail send successfully');
        } else {
            $request->session()->flash('danger', trans('Can not send email. Please check your Email config.'));
        }
        return redirect()->back();
    }

}
