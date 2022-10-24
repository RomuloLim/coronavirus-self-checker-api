<?php

namespace Tests\Feature;

use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_patient_can_be_created()
    {
        Storage::fake('public');
        $data = [
            'name' => 'Ricardo Reis Casanova',
            'identifier' => '25667538814',
            'birthdate' => '1987-09-23',
            'phone_number' => '(71) 2181-3790',
            'image' => UploadedFile::fake()->image('patient.png'),
        ];

        $response = $this->postJson('/api/patients', $data);

        $response->assertJsonStructure([
            'data' => [
                'name',
                'identifier',
                'birthdate',
                'phone_number',
                'image',
                'updated_at',
                'created_at',
                'id',
            ]
        ]);
        $this->assertDatabaseHas('patients', ['identifier' => '25667538814']);
    }

    public function test_patient_can_be_found()
    {
        $patient = Patient::factory()->create();

        $response = $this->getJson("/api/patients/$patient->id");

        $response->assertJson(['data' => $patient->toArray()]);
    }

//    Não está implementado, pode ser um futuro exemplo uso para o TDD
//    public function test_patient_can_be_updated()
//    {
//        $patient = Patient::factory()->create();
//        $oldName = $patient->name;
//        $newName = 'Ednaldo Pereira';
//        $assertion = [...$patient->toArray(), 'name' => $newName];
//
//        $response = $this->putJson('/api/patients/$patient->id', ['name' => $newName]);
//
//        $response->assertJson(['data' => $assertion]);
//        $this->assertDatabaseMissing('patients', ['id' => $patient->id, 'name' => $oldName]);
//    }

    public function test_patient_can_be_deleted()
    {
        $patient = Patient::factory()->create();

        $response = $this->deleteJson("/api/patients/$patient->id");

        $response->assertJson(['message' => 'Paciente deletado com sucesso.']);
        $this->assertDatabaseMissing('patients', ['id' => $patient->id]);
    }

    public function test_patients_can_be_listed()
    {
        Patient::factory()->count(20)->create();

        $response = $this->getJson('/api/patients');

        $response->assertJsonStructure([
            'data' => range(0,9),
            'meta',
            'links'
        ]);
    }

}
