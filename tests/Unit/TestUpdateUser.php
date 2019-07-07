<?php
/**
 * Test User data update
 * 
 * @category Test
 * @package  UpdateTest
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

/**
 * Test for User update form
 * 
 * @category Test
 * @package  User
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */

class TestUpdateUser extends TestCase
{

    protected $user;

    /**
     * Initialize parameters.
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * Clear the tests data.
     * 
     * @return void
     */
    public function tearDown(): void
    {
        $this->artisan('migrate:refresh');
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testPath()
    {
        $this->user->name = 'Marcelo';
        $response = $this->put('/socios/' . $this->user->id, $this->user->toArray());
        $response->assertStatus(200);
    }

    /**
     * Test User data update.
     * 
     * @return void
     */
    public function testUserDataUpdate()
    {
        $this->user->name = 'Su';
        $response  = $this->put('/socios/'.$this->user->id, $this->user->toArray());
        $response->assertSee('Cadastro atualizado com sucesso.');
    }

    /**
     * Test when the User data update fails.
     * 
     * @return void
     */
    public function testUserDataFailUpdate()
    {
        $user = [];
        $response = $this->put('/socios/'.$this->user->id, []);
        $response->assertRedirect();
    }
}
