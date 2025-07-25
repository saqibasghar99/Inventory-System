<?php

namespace App\Http\Controllers\Api;

use App\Models\AuditLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index()
    {
        return response()->json(AuditLog::all());
    }

    public function showByTransaction($transactionId)
    {
        $logs = AuditLog::where('transaction_id', $transactionId)->get();

        if ($logs->isEmpty()) {
            return response()->json(['message' => 'No audit logs found'], 404);
        }

        return response()->json($logs);
    }
}
