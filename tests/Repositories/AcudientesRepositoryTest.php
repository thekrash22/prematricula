<?php namespace Tests\Repositories;

use App\Models\Acudientes;
use App\Repositories\AcudientesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AcudientesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AcudientesRepository
     */
    protected $acudientesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->acudientesRepo = \App::make(AcudientesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_acudientes()
    {
        $acudientes = factory(Acudientes::class)->make()->toArray();

        $createdAcudientes = $this->acudientesRepo->create($acudientes);

        $createdAcudientes = $createdAcudientes->toArray();
        $this->assertArrayHasKey('id', $createdAcudientes);
        $this->assertNotNull($createdAcudientes['id'], 'Created Acudientes must have id specified');
        $this->assertNotNull(Acudientes::find($createdAcudientes['id']), 'Acudientes with given id must be in DB');
        $this->assertModelData($acudientes, $createdAcudientes);
    }

    /**
     * @test read
     */
    public function test_read_acudientes()
    {
        $acudientes = factory(Acudientes::class)->create();

        $dbAcudientes = $this->acudientesRepo->find($acudientes->id);

        $dbAcudientes = $dbAcudientes->toArray();
        $this->assertModelData($acudientes->toArray(), $dbAcudientes);
    }

    /**
     * @test update
     */
    public function test_update_acudientes()
    {
        $acudientes = factory(Acudientes::class)->create();
        $fakeAcudientes = factory(Acudientes::class)->make()->toArray();

        $updatedAcudientes = $this->acudientesRepo->update($fakeAcudientes, $acudientes->id);

        $this->assertModelData($fakeAcudientes, $updatedAcudientes->toArray());
        $dbAcudientes = $this->acudientesRepo->find($acudientes->id);
        $this->assertModelData($fakeAcudientes, $dbAcudientes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_acudientes()
    {
        $acudientes = factory(Acudientes::class)->create();

        $resp = $this->acudientesRepo->delete($acudientes->id);

        $this->assertTrue($resp);
        $this->assertNull(Acudientes::find($acudientes->id), 'Acudientes should not exist in DB');
    }
}
