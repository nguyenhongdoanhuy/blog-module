<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeModulesMigration extends GeneratorCommand
{
    private $now = '';

    public function __construct(Filesystem $files)
    {
        parent::__construct($files);
        $this->now = Carbon::now();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modules:migration 
                        {name : The name of migration file}
                        {--path= : The path of migration file}';

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

    protected function getNameInput()
    {
        return trim(date_format($this->now, 'Y_m_d_His') . '_' . $this->argument('name'));
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name) .'\\' . date_format($this->now, 'Y_m_d_His') . '_', '', $name);

        return str_replace(['DummyClass', '{{ class }}', '{{class}}'], Str::studly($class), $stub);
    }


    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Modules\\' . $this->option('path');
    }
}
