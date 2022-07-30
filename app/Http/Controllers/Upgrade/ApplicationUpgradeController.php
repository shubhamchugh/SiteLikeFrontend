<?php

namespace App\Http\Controllers\Upgrade;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class ApplicationUpgradeController extends Controller
{
    public function __invoke(Request $request)
    {
        echo "<pre>";
        echo "<h2>Git Update Output</h2>";
        echo shell_exec("git config --global --add safe.directory '*'");
        echo shell_exec('cd .. && git status');

        echo shell_exec('cd .. && sudo chmod -R o+rw bootstrap/cache');
        echo shell_exec('cd .. && sudo chmod -R o+rw storage');
        echo shell_exec('cd .. && sudo chmod -R 777 storage');
        echo shell_exec('cd .. && sudo chmod -R 777 bootstrap/cache');
        echo shell_exec('cd .. && sudo chmod -R 777 public');
        echo shell_exec('cd .. && sudo chmod -R o+rw public');

        echo shell_exec('cd .. && git reset --hard && git clean -d -f && git pull');

        echo shell_exec('cd .. && COMPOSER_MEMORY_LIMIT=-1 composer update');
        
        echo "<h2>Cache Clear Update Output</h2>";

        Artisan::call('cache:clear');
        print_r(Artisan::output());

        Artisan::call('clear-compiled');
        print_r(Artisan::output());

        Artisan::call('optimize:clear');
        print_r(Artisan::output());

        Artisan::call('event:clear');
        print_r(Artisan::output());

        Artisan::call('view:clear');
        print_r(Artisan::output());

        Artisan::call('route:clear');
        print_r(Artisan::output());

        Artisan::call('config:cache');
        print_r(Artisan::output());

        Artisan::call('route:cache');
        print_r(Artisan::output());

        Artisan::call('view:cache');
        print_r(Artisan::output());

        echo shell_exec('cd .. && php artisan debugbar:clear');

        echo shell_exec('cd .. && sudo chmod -R o+rw bootstrap/cache');
        echo shell_exec('cd .. && sudo chmod -R o+rw storage');
        echo shell_exec('cd .. && sudo chmod -R 777 storage');
        echo shell_exec('cd .. && sudo chmod -R 777 bootstrap/cache');
        echo shell_exec('cd .. && sudo chmod -R 777 public');
        echo shell_exec('cd .. && sudo chmod -R o+rw public');
    }
}
