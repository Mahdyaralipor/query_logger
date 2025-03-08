<?php

namespace App\Http\Controllers;

use App\Models\QueryLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QueryLogController extends Controller
{
    public function store(Request $request)
{
    $queryData = $request->validate([
        'query' => 'required|string',
        'bindings' => 'nullable|array',
        'time' => 'required|numeric',
    ]);

    $log = QueryLog::create([
        'query' => $queryData['query'],
        'bindings' => $queryData['bindings'] ?? null,
        'execution_time' => $queryData['time'],
    ]);

    Log::info("Query logged:", $queryData);

    return response()->json(['message' => 'Query logged successfully', 'data' => $log], 200);
}
}
