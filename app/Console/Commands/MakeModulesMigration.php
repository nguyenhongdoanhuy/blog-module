<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\GeneratorCommand;

class MakeModulesMigration extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modules:migration {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new modules migration';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Migrations';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/migration.stub';
    }

    protected function rootNamespace()
    {
        return date_format(Carbon::now(), 'Y_m_d_His') . '_' . $this->laravel->getNamespace();
    }


    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Modules\\';
    }
}
