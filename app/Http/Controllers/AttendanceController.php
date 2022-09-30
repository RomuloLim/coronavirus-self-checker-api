<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $attendance = Attendance::create($data);

        $attendance->symptoms()->attach($data['symptoms']);

        return response()->json($attendance, 201);
    }
}
