<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Personas;

class PersonasApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_personas()
    {
        $personas = factory(Personas::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/personas', $personas
        );

        $this->assertApiResponse($personas);
    }

    /**
     * @test
     */
    public function test_read_personas()
    {
        $personas = factory(Personas::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/personas/'.$personas->id
        );

        $this->assertApiResponse($personas->toArray());
    }

    /**
     * @test
     */
    public function test_update_personas()
    {
        $personas = factory(Personas::class)->create();
        $editedPersonas = factory(Personas::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/personas/'.$personas->id,
            $editedPersonas
        );

        $this->assertApiResponse($editedPersonas);
    }

    /**
     * @test
     */
    public function test_delete_personas()
    {
        $personas = factory(Personas::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/personas/'.$personas->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/personas/'.$personas->id
        );

        $this->response->assertStatus(404);
    }
}
