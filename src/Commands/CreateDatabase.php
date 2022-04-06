<?php

namespace Akukoder\FortifyTablerAdmin\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    public $signature = 'tabler:create-db';

    public $description = 'Create database for app';

    public function handle()
    {
        try {
            $connection = env('DB_DATABASE', false);
            $database = env('DB_CONNECTION', 'mysql');

            if (! $database) {
                $this->info('Skipping creation of database as env(DB_DATABASE) is empty');
                return;
            }

//            $connection = $this->hasArgument('connection') && $this->argument('connection') ? $this->argument('connection'): DB::connection()->getPDO()->getAttribute(PDO::ATTR_DRIVER_NAME);

            $hasDb = DB::connection($connection)
                ->select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME ='{$database}'");

            if (empty($hasDb)) {
                DB::connection($connection)->select('CREATE DATABASE '. $database);
                $this->info("Database '$database' created for '{$connection}' connection");
            }
            else {
                $this->info("Database $database already exists for '{$connection}' connection");
            }
        }
        catch (\Exception $e){
            $this->error($e->getMessage());
        }
    }
}
