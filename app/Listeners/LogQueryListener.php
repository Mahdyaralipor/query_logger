<?php
namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\Log;

class LogQueryListener
{
    public function handle(QueryExecuted $event)
    {

        if (!config('app.query_log_enabled', false)) {
            return;
        }

        $queryData = [
            'query' => $event->sql,
            'bindings' => $event->bindings,
            'time' => $event->time,
        ];

        Log::channel('query')->info("Query executed:", $queryData);
    }
}