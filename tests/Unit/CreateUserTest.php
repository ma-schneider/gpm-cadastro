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
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
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
        Storage::fake('public');

        $user = factory(User::class)->make()->toArray();
        $user['password'] = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';

        $file = UploadedFile::fake()->image('photo.jpeg');
        $user['photo'] = $file;

        $response = $this->json('POST', '/socios', $user);
        $response->assertStatus(302);

        Storage::disk('public')->assertExists('photos/' . $file->hashName());
    }
}
