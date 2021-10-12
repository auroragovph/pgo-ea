<?php

namespace App\Http\Controllers;

use Spatie\DbDumper\Databases\MySql;

class MySqlController extends Controller
{
    public function dump()
    {
        MySql::create()
            ->setDbName(env('DB_DATABASE'))
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->dumpToFile(base_path()."/backup/sql/".time().".sql");
    }
}
