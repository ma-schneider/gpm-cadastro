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
    protected $editResponse;
    /**
     * Initialize parameters.
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->editResponse = $this->get('/socios/' . $this->user->id . '/edit');
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

    /**
     * Test if the Edit path exists.
     * 
     * @return void
     */
    public function testEditPath() 
    {
        $this->editResponse->assertOk();
    }

    /**
     * Test if the right view is rendered.
     * 
     * @return void
     */
    public function testRenderRightView()
    {
        $this->editResponse->assertViewIs('socios.edit');
    }
    
    /**
     * Test if the view has the user parameter.
     *
     * @return void
     */
    public function testViewHasParameters()
    {
        $this->editResponse->assertViewHas('user');
    }

    
    /**
     * Test if the form fields is present.
     *
     * @return void
     */
    public function testViewHasfields()
    {
        $this->editResponse
            ->assertSee('<form')
            ->assertSee('Nome<')
            ->assertSee('Telefone/Celular/Whatsapp<')
            ->assertSee('Endereço<')
            ->assertSee('Cidade<')
            ->assertSee('Estado<')
            ->assertSee('Ano de filiação<')
            ->assertSee('Data de nascimento')
            ->assertSee('RG<')
            ->assertSee('CPF<')
            ->assertSee('Tipo sanguíneo')
            ->assertSee('Convênio médico')
            ->assertSee('Participou do curso básico de montanhismo?<')
            ->assertSee('Em qual entidade?')
            ->assertSee('E-mail<')
            ->assertSee('Número de sócio<')
            ->assertSee('Foto<')
            ->assertSee('Confirmação do e-mail<')
            ->assertDontSee('Password<')
            ->assertSee('Atualizar<');  
    }
}
