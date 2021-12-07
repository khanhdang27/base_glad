<?php

use Illuminate\Support\Carbon;

if (!function_exists('get_directories')) {
    /**
     * @param $path
     * @return array
     */
    function get_directories($path) {
        $directories = [];
        $items = scandir($path);
        foreach ($items as $item) {
            if ($item == '..' || $item == '.') {
                continue;
            }
            if (is_dir($path . '/' . $item)) {
                $directories[] = $item;
            }
        }

        return $directories;
    }
}

if (!function_exists('config_permission_merge')) {
    /**
     * @return array
     */
    function config_permission_merge() {
        $modules = get_directories(base_path('modules'));
        $files = [];
        $i = 0;
        foreach ($modules as $key => $value) {
            $urlPath = $value . '/Configs/permission.php';
            $file = base_path('modules') . '/' . $urlPath;
            if (file_exists($file)) {
                $files[(int)filemtime($file) + $i] = $file;
                $i++;
            }
        }
        ksort($files);
        $permissions = [];
        foreach ($files as $file) {
            $permissions[] = require($file);
        }

        return $permissions;
    }
}

if (!function_exists('config_menu_merge')) {
    /**
     * @return array
     */
    function config_menu_merge() {
        $modules = get_directories(base_path('modules'));
        $activeMenu = [];
        foreach ($modules as $key => $value) {
            $urlPath = $value . '/Configs/menu.php';
            if (file_exists(base_path('modules') . '/' . $urlPath)) {
                $activeMenu[] = require(base_path('modules') . '/' . $urlPath);
            }
        }
        $activeMenu = collect($activeMenu)->sortBy('sort')->toArray();

        return $activeMenu;
    }
}

if (!function_exists('isTimestamp')) {
    /**
     * @param $date
     * @return bool
     */
    function isTimestamp($date) {
        try {
            return ((int)$date === $date)
                && ($date <= PHP_INT_MAX)
                && ($date >= ~PHP_INT_MAX);
        } catch (Exception $e) {
            return $date;
        }
    }
}

if (!function_exists('formatDate')) {
    /**
     * @param $timestamp
     * @param null $format
     * @return string|null
     */
    function formatDate($timestamp, $format = null) {
        if (!isTimestamp($timestamp)) {
            $timestamp = strtotime($timestamp);
        }
        if (!empty($format)) {
            return Carbon::createFromTimestamp($timestamp)->format($format);
        }
        return Carbon::createFromTimestamp($timestamp)->format("d-m-Y");
    }
}

if (!function_exists('getModal')) {
    /**
     * @param array $array
     *
     * @return string
     */
    function getModal($array = []) {
        if (!empty($array)) {
            $class = $array['class'] ?? null;
            $id = $array['id'] ?? 'form-modal';
            $tabindex = $array['tabindex'] ?? '-1';
            $size = $array['size'] ?? null;
            $title = $array['title'] ?? 'Title';
            if ($tabindex !== false) {
                $html = '<div class="modal fade ' . $class . '" id="' . $id . '" tabindex="' . $tabindex
                    . '" role="dialog" aria-hidden="true">';
            } else {
                $html = '<div class="modal fade ' . $class . '" id="' . $id . '" role="dialog" aria-hidden="true">';
            }
            $html .= '<div class="modal-dialog ' . $size . ' ">';
            $html .= '<div class="modal-content">';
            $html .= '<div class="modal-header"><h5 class="title">' . $title . '</h5></div>';
            $html .= '<div class="modal-body">';

            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="datetime-modal position-relative"></div>';
        } else {
            $html = '<div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="form-modal" aria-hidden="true">';
            $html .= '<div class="modal-dialog">';
            $html .= '<div class="modal-content">';
            $html .= '<div class="modal-header">';
            $html .= '<h5 class="title">Create</h5>';
            $html .= '</div>';
            $html .= '<div class="modal-body">';

            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="datetime-modal position-relative"></div>';
        }
        return $html;
    }
}

if (!function_exists('segmentUrl')) {
    /**
     * @param $index
     * @return mixed
     */
    function segmentUrl($index) {
        return request()->segments()[$index] ?? '/';
    }

    if (!function_exists('summaryListing')) {
        /**
         * @param $data
         * @return string|null
         */
        function summaryListing($data) {
            $html = '';
            $html .= '<span class="listing-information">';
            $html .= trans('Showing');
            $html .= '<b> ';
            $html .= (count($data) > 0) ? ($data->currentpage() - 1) * $data->perpage() + 1 : 0;
            $html .= '</b> ';
            $html .= trans(' to ');
            $html .= '<b> ';
            $html .= ($data->currentpage() - 1) * $data->perpage() + $data->count();
            $html .= ' </b>';
            $html .= trans(' of ');
            $html .= '<b>' . $data->total() . '</b> ' . trans('entries') . '</span>';

            return $html;
        }
    }
}

if(!function_exists('moneyFormat')){
    /**
     * @param $number
     * @param bool $has_unit
     * @return string
     */
    function moneyFormat($number, $has_unit = true){
        $unit = "HK$";
        if(is_numeric($number)){
            return ($has_unit) ? $unit . number_format($number) : number_format($number);
        }

        return "N/A";
    }
}
