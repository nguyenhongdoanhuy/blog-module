<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeModulesLanguages extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modules:language
                        {name : The name of language file}
                        {--path= : The path of language file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new modules language';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Languages';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/language.stub';
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
