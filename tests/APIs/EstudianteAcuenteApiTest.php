<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EstudianteAcuente;

class EstudianteAcuenteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_estudiante_acuente()
    {
        $estudianteAcuente = factory(EstudianteAcuente::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/estudiante_acuentes', $estudianteAcuente
        );

        $this->assertApiResponse($estudianteAcuente);
    }

    /**
     * @test
     */
    public function test_read_estudiante_acuente()
    {
        $estudianteAcuente = factory(EstudianteAcuente::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/estudiante_acuentes/'.$estudianteAcuente->id
        );

        $this->assertApiResponse($estudianteAcuente->toArray());
    }

    /**
     * @test
     */
    public function test_update_estudiante_acuente()
    {
        $estudianteAcuente = factory(EstudianteAcuente::class)->create();
        $editedEstudianteAcuente = factory(EstudianteAcuente::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/estudiante_acuentes/'.$estudianteAcuente->id,
            $editedEstudianteAcuente
        );

        $this->assertApiResponse($editedEstudianteAcuente);
    }

    /**
     * @test
     */
    public function test_delete_estudiante_acuente()
    {
        $estudianteAcuente = factory(EstudianteAcuente::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/estudiante_acuentes/'.$estudianteAcuente->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/estudiante_acuentes/'.$estudianteAcuente->id
        );

        $this->response->assertStatus(404);
    }
}
