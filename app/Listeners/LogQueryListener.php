<?php
namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\Log;

class LogQueryListener
{
    public function handle(QueryExecuted $event)
    {
        $sql = $event->sql;
        $bindings = $event->bindings;
        $time = $event->time;

        Log::info("Query: $sql | Bindings: " . json_encode($bindings) . " | Time: $time ms");
    }
}