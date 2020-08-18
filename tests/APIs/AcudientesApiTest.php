<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Acudientes;

class AcudientesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_acudientes()
    {
        $acudientes = factory(Acudientes::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/acudientes', $acudientes
        );

        $this->assertApiResponse($acudientes);
    }

    /**
     * @test
     */
    public function test_read_acudientes()
    {
        $acudientes = factory(Acudientes::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/acudientes/'.$acudientes->id
        );

        $this->assertApiResponse($acudientes->toArray());
    }

    /**
     * @test
     */
    public function test_update_acudientes()
    {
        $acudientes = factory(Acudientes::class)->create();
        $editedAcudientes = factory(Acudientes::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/acudientes/'.$acudientes->id,
            $editedAcudientes
        );

        $this->assertApiResponse($editedAcudientes);
    }

    /**
     * @test
     */
    public function test_delete_acudientes()
    {
        $acudientes = factory(Acudientes::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/acudientes/'.$acudientes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/acudientes/'.$acudientes->id
        );

        $this->response->assertStatus(404);
    }
}
