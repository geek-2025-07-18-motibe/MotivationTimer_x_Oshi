<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimerLog;


class TimerLogController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'timer_time' => 'required|integer',
        ]);

        $timerLog = TimerLog::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'description' => $request->description,
            'timer_time' => $request->timer_time,
        ]);

        return response()->json($timerLog, 201);
    }

    public function retrieve(Request $request)
    {
        $timerLogs = TimerLog::select('id', 'name', 'description', 'timer_time', 'created_at')
            ->where('user_id', $request->user_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($timerLogs);
    }
}
