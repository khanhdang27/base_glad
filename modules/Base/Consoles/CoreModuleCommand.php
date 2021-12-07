<?php

namespace Modules\Base\Consoles;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CoreModuleCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The systems will create module with name you entered';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $module = ucfirst($this->argument('name'));

        if (!file_exists(base_path("modules/{$module}"))) {
            mkdir(base_path("modules/{$module}"), 0777, true);
            $this->config($module);
            $this->migration($module);
            $this->http($module);
            $this->model($module);
            $this->views($module);
        }

        Artisan::call('module:migration create_'.strtolower($module).'s_table --create='.strtolower($module).'s '. ucfirst($module));

        $this->info("Module {$module} has been created");
    }

    /**
     * Generate Config
     * @param $module
     */
    protected function config($module)
    {
        mkdir(base_path("modules/{$module}/Configs"), 0777, true);
        //menu
        $content = "<?php
return [
    'name' => trans('" . $module . "'),
    'route' => route('get." . strtolower($module) . ".list'),
    'sort' => 1,
    'active'=> TRUE,
    'id'=> '".strtolower($module)."',
    'icon' => '',
    'middleware' => [],
    'group' => []
];";
        $fp = fopen(base_path("modules/{$module}/Configs/menu.php"), "wb");
        fwrite($fp, $content);
        fclose($fp);

        //permission

        $content = "<?php
return [
    'name' => '" . strtolower($module) . "',
    'display_name' => trans('" . ucfirst($module) . "'),
    'group' => []
];";
        $fp = fopen(base_path("modules/{$module}/Configs/permission.php"), "wb");
        fwrite($fp, $content);
        fclose($fp);
    }

    /**
     * Generate Multiple language
     * @param $module
     */
    protected function migration($module)
    {
        mkdir(base_path("modules/{$module}/Migrations"), 0777, true);
    }

    /**
     * Generate Model
     * @param $module
     */
    protected function model($module)
    {
        mkdir(base_path("modules/{$module}/Models"), 0777, true);
        $content = '<?php

namespace Modules\\' . $module . '\\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ' . $module . ' extends Model
{
    use SoftDeletes;

    protected $table = "' . strtolower($module) . 's";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $guarded = [];

    public $timestamps = true;


}
';
        $fp = fopen(base_path("modules/{$module}/Models/{$module}.php"), "wb");
        fwrite($fp, $content);
        fclose($fp);
    }

    /**
     * Generate Http folder
     * @param $module
     */
    protected function http($module)
    {
        // Controller
        mkdir(base_path("modules/{$module}/Controllers"), 0777, true);
        $content = '<?php

namespace Modules\\' . $module . '\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\\'.$module.'\Models\\'.$module.';

class ' . $module . 'Controller extends Controller{

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(){
        # parent::__construct();
    }

    public function index(Request $request){
        $data = ' . $module . '::query()->orderBy("name")->paginate(20);

        return view("' . $module . '::index", compact("data"));
    }
}
';
        $fp = fopen(base_path("modules/{$module}/Controllers/{$module}Controller.php"), "wb");
        fwrite($fp, $content);
        fclose($fp);
        /************************************************************************************/

        //Validation
        mkdir(base_path("modules/{$module}/Requests"), 0777, true);
        $content = '<?php

namespace Modules\\' . $module . '\Requests;

use App\AppHelpers\Helper;
use Illuminate\Foundation\Http\FormRequest;

class ' . $module . 'Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = segmentUrl(2);
        switch ($method) {
            default:
                return [];
                break;
            case "update":
                return [];
                break;
        }
    }

    public function messages()
    {
        return [];
    }

    public function attributes()
    {
        return [];
    }
}
';

        $fp = fopen(base_path("modules/{$module}/Requests/{$module}Request.php"), "wb");
        fwrite($fp, $content);
        fclose($fp);

        /*****************************************************************************************/

        //Route
        mkdir(base_path("modules/{$module}/Routes"), 0777, true);

        $content = '<?php
use Illuminate\Support\Facades\Route;

Route::prefix("' . strtolower($module) . '")->group(function (){
    Route::get("/", "' . $module . 'Controller@index")->name("get.' . strtolower($module) . '.list");
});
';
        $fp = fopen(base_path("modules/{$module}/Routes/admin.php"), "wb");
        fwrite($fp, $content);
        fclose($fp);

        $content2 = '<?php
use Illuminate\Support\Facades\Route;
';
        $fp = fopen(base_path("modules/{$module}/Routes/web.php"), "wb");
        fwrite($fp, $content2);
        fclose($fp);

    }

    protected function views($module)
    {
        mkdir(base_path("modules/{$module}/Views"), 0777, true);
        $content = '@extends("Base::backend.master")

@section("content")
    <div id="' . strtolower($module) . '-module">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="title">{{ trans("' . $module . '") }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans("Home") }}</a></li>
                        <li class="breadcrumb-item active">{{ trans("' . $module . '") }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end group-btn">
            <a href="#" class="btn btn-primary"
               data-toggle="modal" data-target="#form-modal" data-title="{{ trans("Create' . $module . '") }}">
                <i class="fa fa-plus"></i>&nbsp; {{ trans("Add New") }}
            </a>
        </div>
    </div>
    <!--Search box-->
    <div class="search-box">
        <div class="card">
            <div class="card-header" data-toggle="collapse" data-target="#form-search-box" aria-expanded="false" aria-controls="form-search-box">
                <div class="title">{{ trans("Search") }}</div>
            </div>
            <div class="card-body collapse show" id="form-search-box">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="text-input">{{ trans("' . $module . ' name") }}</label>
                                <input type="text" class="form-control" id="text-input" name="name" value="">
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn btn-info mr-2">{{ trans("Search") }}</button>
                        <button type="button" class="btn btn-default clear">{{ trans("Cancel") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="listing">
        <div class="card">
            <div class="card-body">
                <div class="sumary">
                    {!! summaryListing($data) !!}
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans(\'Name\') }}</th>
                            <th>{{ trans(\'Status\') }}</th>
                            <th>{{ trans(\'Created At\') }}</th>
                            <th>{{ trans(\'Updated At\') }}</th>
                            <th class="action">{{ trans(\'Action\') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($key = ($data->currentpage()-1)*$data->perpage()+1)
                        @foreach($data as $item)
                            <tr>
                                <td>{{$key++}}</td>
                                <td>{{ trans($item->name) }}</td>
                                <td>{{ \Modules\Base\Models\Status::getStatus($item->status) ?? null }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format(\'d/m/Y H:i:s\')}}</td>
                                <td>{{ \Carbon\Carbon::parse($item->updated_at)->format(\'d/m/Y H:i:s\')}}</td>
                                <td class="link-action">
                                    <a href="#" class="btn btn-primary"
                                       data-toggle="modal" data-target="#form-modal" data-title="{{ trans("Update '.$module.'") }}">
                                        <i class="fa fa-pencil"></i></a>
                                    <a href="#"
                                       class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5 pagination-style">
                        {{ $data->withQueryString()->render("vendor/pagination/default") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! getModal(["class" => "modal-ajax"]) !!}
@endsection';

        $fp = fopen(base_path("modules/{$module}/Views/index.blade.php"), "wb");
        fwrite($fp, $content);
        fclose($fp);

    }
}
