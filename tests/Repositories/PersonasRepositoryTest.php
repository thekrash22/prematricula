<?php namespace Tests\Repositories;

use App\Models\Personas;
use App\Repositories\PersonasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PersonasRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PersonasRepository
     */
    protected $personasRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->personasRepo = \App::make(PersonasRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_personas()
    {
        $personas = factory(Personas::class)->make()->toArray();

        $createdPersonas = $this->personasRepo->create($personas);

        $createdPersonas = $createdPersonas->toArray();
        $this->assertArrayHasKey('id', $createdPersonas);
        $this->assertNotNull($createdPersonas['id'], 'Created Personas must have id specified');
        $this->assertNotNull(Personas::find($createdPersonas['id']), 'Personas with given id must be in DB');
        $this->assertModelData($personas, $createdPersonas);
    }

    /**
     * @test read
     */
    public function test_read_personas()
    {
        $personas = factory(Personas::class)->create();

        $dbPersonas = $this->personasRepo->find($personas->id);

        $dbPersonas = $dbPersonas->toArray();
        $this->assertModelData($personas->toArray(), $dbPersonas);
    }

    /**
     * @test update
     */
    public function test_update_personas()
    {
        $personas = factory(Personas::class)->create();
        $fakePersonas = factory(Personas::class)->make()->toArray();

        $updatedPersonas = $this->personasRepo->update($fakePersonas, $personas->id);

        $this->assertModelData($fakePersonas, $updatedPersonas->toArray());
        $dbPersonas = $this->personasRepo->find($personas->id);
        $this->assertModelData($fakePersonas, $dbPersonas->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_personas()
    {
        $personas = factory(Personas::class)->create();

        $resp = $this->personasRepo->delete($personas->id);

        $this->assertTrue($resp);
        $this->assertNull(Personas::find($personas->id), 'Personas should not exist in DB');
    }
}
