<?php

namespace Modules\Base\Consoles;

use Illuminate\Console\Command;

class MakeMigrationCommand extends Command{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:migration {migration_name} {--create=} {--table=} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The systems will create migration';

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
        $module = ucfirst($this->argument('module'));
        $table = $this->option('table');
        $create = $this->option('create');
        $migration_name = $this->argument('migration_name');

        $this->migration($module, $migration_name, $table, $create);

        $this->info("Created Migration: ".formatDate(time(),'Y_m_d_His')."_".$migration_name);
    }

    protected function migration($module, $migration_name, $_table, $create)
    {
        $class = str_replace(" ","", ucwords(str_replace('_', ' ', $migration_name)));

        if (!empty($create)) {
            $content = "<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class $class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('$create', function (Blueprint \$table) {
            \$table->id();
            \$table->softDeletes();
            \$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('$create');
    }
}
";
        }else{
            $content = "<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class $class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('$_table', function(Blueprint \$table){

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('$_table');
    }
}
";
        }
        $fp = fopen(base_path("modules/{$module}/Migrations/".formatDate(time(),'Y_m_d_His')."_".$migration_name.".php"), "wb");
        fwrite($fp, $content);
        fclose($fp);
    }
}
