<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateUser;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response as HttpStatus;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    public function index(): JsonResource
    {
        return PatientResource::collection(Patient::paginate());
    }

    public function show(int $user): JsonResource
    {
        return new PatientResource(Patient::findOrFail($user));
    }

    public function store(CreateUpdateUser $request): JsonResource
    {
        $data = $request->all();

        $imageName = time() . '.' . $request->image->extension();
        Storage::disk('public')->putFileAs('images', $request->image, $imageName);
        $data['image'] = 'images/' . $imageName;

        $user = Patient::create($data);

        return new PatientResource($user);
    }

    public function destroy(int $user): JsonResponse
    {
        Patient::findOrFail($user)->delete();
        return response()->json([ 'message' => 'Paciente deletado com sucesso.' ], HttpStatus::HTTP_OK);
    }
}
