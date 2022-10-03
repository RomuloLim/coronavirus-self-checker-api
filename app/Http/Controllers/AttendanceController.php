<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendance;
use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceController extends Controller
{
    protected $attendanceRepository;

    public function __construct(Attendance $attendanceRepository)
    {
        $this->attendanceRepository = $attendanceRepository;
    }

    public function store(StoreAttendance $request): JsonResource
    {
        $data = $request->validated();

        $attendance = $this->attendanceRepository->create($data);

        $attendance->symptoms()->attach($data['symptoms']);

        return new AttendanceResource($attendance);
    }

    public function find(int $attendance): JsonResource
    {
        $attendance = $this->attendanceRepository->findOrFail($attendance);

        return new AttendanceResource($attendance);
    }
}
