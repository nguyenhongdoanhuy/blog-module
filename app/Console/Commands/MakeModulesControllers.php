<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeModulesControllers extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modules:controller
                        {name : The name of migration file}
                        {--path= : The path of migration file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new modules controller';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Controllers';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/controller.stub';
    }

    protected function getNameInput()
    {
        return trim($this->argument('name'));
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
        $class = str_replace($this->getNamespace($name) .'\\', '', $name);

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
