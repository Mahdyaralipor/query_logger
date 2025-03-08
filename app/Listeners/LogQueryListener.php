<?php
namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class LogQueryListener
{
    public function handle(QueryExecuted $event)
    {
        if (!config('app.query_log_enabled', false)) {
            return;
        }

        $client = new Client();
        $queryData = [
            'query' => $event->sql,
            'bindings' => $event->bindings,
            'time' => $event->time,
        ];

        try {
            $client->post('http://localhost:8001/api/log-query', [
                'json' => $queryData,
            ]);
        } catch (\Exception $e) {
            Log::error("Failed to send query to microservice: " . $e->getMessage());
        }
    }
}