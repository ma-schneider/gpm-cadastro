<?php
/**
 * Test for Register List
 * 
 * @category Test
 * @package  RegisterTest
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
 * Test for Register List
 * 
 * @category Test
 * @package  RegisterTest
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */
class RegisterListTest extends TestCase
{

    protected $response;

    /**
     * Test setup.
     * 
     * @inheritDoc
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->response = $this->get('/socios');
        $this->artisan('db:seed', ['--class' => 'DatabaseSeeder']);
    }

    public function tearDown(): void
    {
        parent::tearDown();

    }

    /**
     * Response must return status 200.
     * 
     * @return void
     */
    public function testUrl()
    {
        $this->response->assertStatus(200);
    }

    /**
     * Must render socios.index view.
     * 
     * @return void
     */
    public function testView()
    {
        $this->response->assertViewIs('socios.index');
    }

    /**
     * Must contain the table html markup.
     * 
     * @return void
     */
    public function testHtml()
    {
        $this->response->assertSee('<table');
        $this->response->assertSee('>Nº');
        $this->response->assertSee('>Nome');
        $this->response->assertSee('>E-mail');
        $this->response->assertSee('>Foto');
    }

    /**
     * Must contain the members variable.
     * 
     * @return void
     */
    public function testMembers()
    {
        $this->response->assertViewHas('members');
    }

    /**
     * Must contain Members values.
     * 
     * @return void
     */
    public function testMembersValues()
    {
        $user = User::find(1);
        $this->response->assertSee('>' . $user->number);
        $this->response->assertSee('>' . $user->name);
        $this->response->assertSee('>' . $user->email);
        $this->response->assertSee('src="' . $user->photo);
        
    }

    /**
     * Must extend the app layout.
     * 
     * @return void
     */
    public function testExtendAppLayout()
    {
        $this->response->assertSee('<nav');
        $this->response->assertSee('class="container"');
    }

    /**
     * View must has pagination.
     * 
     * @return void
     */
    public function testSeePagination()
    {
        $this->response->assertSee('pagination');
    }

    /**
     * Must be a hoverable table.
     * 
     * @return void
     */
    public function testTableStyle()
    {
        $this->response->assertSee('table table-hover');
        $this->response->assertSee('Lista de sócios');
        $this->response->assertSee('Cadastro GPM');
    }

}
