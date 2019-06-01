<?php
/**
 * Test for Creating User.
 * 
 * @category Test
 * @package  CreateUserTest
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
 * Test for Creating User
 * 
 * @category Test
 * @package  CreateUser
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */
class CreateUserTest extends TestCase
{

    protected $response;

    /**
     * Setup test environment.
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->response = $this->get('/socios/create');
    }

    /**
     * Path status must be 200
     * 
     * @return void
     */
    public function testPath()
    {
        $this->response->assertStatus(200);
    }

    /**
     * Test if the correct view is rendered
     * 
     * @return void
     */
    public function testView()
    {
        $this->response->assertViewIs('socios.create');
    }

    /**
     * Test if the form fields exist
     * 
     * @return void
     */
    public function testFormFIelds()
    {
        $this->response
            ->assertSee('<form')
            ->assertSee('Nome<')
            ->assertSee('E-mail<')
            ->assertSee('Número de sócio<')
            ->assertSee('Foto<')
            ->assertSee('Confirmação do e-mail<')
            ->assertSee('Password<')
            ->assertSee('Cadastrar<');  
    }

    /**
     * Form must contain the csfr token.
     * 
     * @return void
     */
    public function testCsrvToken()
    {
        $this->response->assertSee('name="_token"');
    }

    /**
     * Must return status code 200.
     * 
     * @return void
     */
    public function testStorePath()
    {
        $user = factory(User::class)->make()->toArray();
        $response = $this->json('POST', '/socios', $user);

        $response->assertOk();
    }
}
