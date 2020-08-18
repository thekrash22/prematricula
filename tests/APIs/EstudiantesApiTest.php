<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Estudiantes;

class EstudiantesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_estudiantes()
    {
        $estudiantes = factory(Estudiantes::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/estudiantes', $estudiantes
        );

        $this->assertApiResponse($estudiantes);
    }

    /**
     * @test
     */
    public function test_read_estudiantes()
    {
        $estudiantes = factory(Estudiantes::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/estudiantes/'.$estudiantes->id
        );

        $this->assertApiResponse($estudiantes->toArray());
    }

    /**
     * @test
     */
    public function test_update_estudiantes()
    {
        $estudiantes = factory(Estudiantes::class)->create();
        $editedEstudiantes = factory(Estudiantes::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/estudiantes/'.$estudiantes->id,
            $editedEstudiantes
        );

        $this->assertApiResponse($editedEstudiantes);
    }

    /**
     * @test
     */
    public function test_delete_estudiantes()
    {
        $estudiantes = factory(Estudiantes::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/estudiantes/'.$estudiantes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/estudiantes/'.$estudiantes->id
        );

        $this->response->assertStatus(404);
    }
}
