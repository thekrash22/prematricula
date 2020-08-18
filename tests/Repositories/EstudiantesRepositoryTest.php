<?php namespace Tests\Repositories;

use App\Models\Estudiantes;
use App\Repositories\EstudiantesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EstudiantesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EstudiantesRepository
     */
    protected $estudiantesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estudiantesRepo = \App::make(EstudiantesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_estudiantes()
    {
        $estudiantes = factory(Estudiantes::class)->make()->toArray();

        $createdEstudiantes = $this->estudiantesRepo->create($estudiantes);

        $createdEstudiantes = $createdEstudiantes->toArray();
        $this->assertArrayHasKey('id', $createdEstudiantes);
        $this->assertNotNull($createdEstudiantes['id'], 'Created Estudiantes must have id specified');
        $this->assertNotNull(Estudiantes::find($createdEstudiantes['id']), 'Estudiantes with given id must be in DB');
        $this->assertModelData($estudiantes, $createdEstudiantes);
    }

    /**
     * @test read
     */
    public function test_read_estudiantes()
    {
        $estudiantes = factory(Estudiantes::class)->create();

        $dbEstudiantes = $this->estudiantesRepo->find($estudiantes->id);

        $dbEstudiantes = $dbEstudiantes->toArray();
        $this->assertModelData($estudiantes->toArray(), $dbEstudiantes);
    }

    /**
     * @test update
     */
    public function test_update_estudiantes()
    {
        $estudiantes = factory(Estudiantes::class)->create();
        $fakeEstudiantes = factory(Estudiantes::class)->make()->toArray();

        $updatedEstudiantes = $this->estudiantesRepo->update($fakeEstudiantes, $estudiantes->id);

        $this->assertModelData($fakeEstudiantes, $updatedEstudiantes->toArray());
        $dbEstudiantes = $this->estudiantesRepo->find($estudiantes->id);
        $this->assertModelData($fakeEstudiantes, $dbEstudiantes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_estudiantes()
    {
        $estudiantes = factory(Estudiantes::class)->create();

        $resp = $this->estudiantesRepo->delete($estudiantes->id);

        $this->assertTrue($resp);
        $this->assertNull(Estudiantes::find($estudiantes->id), 'Estudiantes should not exist in DB');
    }
}
