<?php

namespace App\AppHelpers;

use App\AppHelpers\Excel\Import;
use App\AppHelpers\Mail\SendMail;
use Exception;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Pusher\ApiErrorException;
use Pusher\Pusher;
use Pusher\PusherException;

class Helper {
    /**
     * @return mixed
     */
    public static function getRoutePrevious() {
        return app('router')->getRoutes(url()->previous())->match(app('request')->create(url()->previous()))->getName();
    }

    /**
     * @param $mail_to
     * @param $subject
     * @param $title
     * @param $body
     * @param null $template
     * @return bool
     */
    public static function sendMail($mail_to, $subject, $title, $body, $template = null) {
        /** Send email */
        if (empty($template)) {
            $template = 'Base::mail.send_test_mail';
        }
        $mail = new SendMail;
        $mail->to($mail_to)->subject($subject)->title($title)->body($body)->view($template);

        try {
            Mail::send($mail);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * @param $string
     * @param false $associative
     * @return false|mixed
     */
    public static function isJson($string, $associative = false) {
        try {
            $string = json_decode($string, $associative);
            return $string;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $file
     * @return array
     */
    public static function excelImport($file) {
        /** Get array data*/
        $array = Excel::toArray(new Import, $file);
        $array = reset($array);

        /** Get header*/
        $header = $array[0];
        /** Get data*/
        unset($array[0]);
        $data = $array;

        return [
            'head' => $header,
            'data' => $data
        ];
    }

    /**
     * @param $file
     * @param $file_name
     * @param $upload_address
     * @return string
     */
    public static function storageFile($file, $file_name, $upload_address) {
        $file->storeAs('public/upload/' . $upload_address, $file_name);

        return 'storage/upload/'.$upload_address . '/' . $file_name;
    }
}
