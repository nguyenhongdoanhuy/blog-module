<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeModulesConfigs extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modules:config
                        {name : The name of config file}
                        {--path= : The path of config file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new modules config';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Configs';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/config.stub';
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
