<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeModulesFactories extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modules:factory
                        {name : The name of factory file}
                        {--path= : The path of factory file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new modules factory';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Factories';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/factory.stub';
    }

    protected function getNameInput()
    {
        return trim($this->argument('name'));
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
