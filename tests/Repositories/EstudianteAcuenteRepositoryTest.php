<?php namespace Tests\Repositories;

use App\Models\EstudianteAcuente;
use App\Repositories\EstudianteAcuenteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EstudianteAcuenteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EstudianteAcuenteRepository
     */
    protected $estudianteAcuenteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estudianteAcuenteRepo = \App::make(EstudianteAcuenteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_estudiante_acuente()
    {
        $estudianteAcuente = factory(EstudianteAcuente::class)->make()->toArray();

        $createdEstudianteAcuente = $this->estudianteAcuenteRepo->create($estudianteAcuente);

        $createdEstudianteAcuente = $createdEstudianteAcuente->toArray();
        $this->assertArrayHasKey('id', $createdEstudianteAcuente);
        $this->assertNotNull($createdEstudianteAcuente['id'], 'Created EstudianteAcuente must have id specified');
        $this->assertNotNull(EstudianteAcuente::find($createdEstudianteAcuente['id']), 'EstudianteAcuente with given id must be in DB');
        $this->assertModelData($estudianteAcuente, $createdEstudianteAcuente);
    }

    /**
     * @test read
     */
    public function test_read_estudiante_acuente()
    {
        $estudianteAcuente = factory(EstudianteAcuente::class)->create();

        $dbEstudianteAcuente = $this->estudianteAcuenteRepo->find($estudianteAcuente->id);

        $dbEstudianteAcuente = $dbEstudianteAcuente->toArray();
        $this->assertModelData($estudianteAcuente->toArray(), $dbEstudianteAcuente);
    }

    /**
     * @test update
     */
    public function test_update_estudiante_acuente()
    {
        $estudianteAcuente = factory(EstudianteAcuente::class)->create();
        $fakeEstudianteAcuente = factory(EstudianteAcuente::class)->make()->toArray();

        $updatedEstudianteAcuente = $this->estudianteAcuenteRepo->update($fakeEstudianteAcuente, $estudianteAcuente->id);

        $this->assertModelData($fakeEstudianteAcuente, $updatedEstudianteAcuente->toArray());
        $dbEstudianteAcuente = $this->estudianteAcuenteRepo->find($estudianteAcuente->id);
        $this->assertModelData($fakeEstudianteAcuente, $dbEstudianteAcuente->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_estudiante_acuente()
    {
        $estudianteAcuente = factory(EstudianteAcuente::class)->create();

        $resp = $this->estudianteAcuenteRepo->delete($estudianteAcuente->id);

        $this->assertTrue($resp);
        $this->assertNull(EstudianteAcuente::find($estudianteAcuente->id), 'EstudianteAcuente should not exist in DB');
    }
}
