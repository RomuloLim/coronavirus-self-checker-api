<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateUser;
use App\Http\Resources\AttendanceResource;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response as HttpStatus;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    protected $patientRepository;

    public function __construct(Patient $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function index(): JsonResource
    {
        return PatientResource::collection($this->patientRepository->paginate(10));
    }

    public function show(int $user): JsonResource
    {
        return new PatientResource($this->patientRepository->findOrFail($user));
    }

    public function store(CreateUpdateUser $request): JsonResource
    {
        $data = $request->all();

        $imageName = time() . '.' . $request->image->extension();
        Storage::disk('public')->putFileAs('images', $request->image, $imageName);
        $data['image'] = 'images/' . $imageName;

        $user = $this->patientRepository->create($data);

        return new PatientResource($user);
    }

    public function destroy(int $user): JsonResponse
    {
        $this->patientRepository->findOrFail($user)->delete();
        return response()->json([ 'message' => 'Paciente deletado com sucesso.' ], HttpStatus::HTTP_OK);
    }

    public function getAllAttendances(int $patient): JsonResource
    {
        $patient = $this->patientRepository->findOrFail($patient);

        return AttendanceResource::collection($patient->attendances()->paginate(10));
    }
}
