<?php
/**
 * Test for Register List
 * 
 * @category Test
 * @package  User
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
 * @package  User
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */

class UserShowTest extends TestCase
{
    
    protected $response;
    protected $user;

    /**
     * Setup the test environment.
     * 
     * @return void
     */
    protected function setUp(): void 
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->response = $this->get('/socios/' . $this->user->id);
    }
    
    /**
     * Preparing for the next test.
     * 
     * @return void
     */
    public function tearDown(): void 
    {
        $this->artisan('migrate:refresh');
    }

    /**
     * Path show must exist.
     *
     * @return void
     */
    public function testPath()
    {
        $this->response->assertStatus(200);
    }

    /**
     * Assert that render the right view.
     * 
     * @return void
     */
    public function testView()
    {
        $this->response->assertViewIs('socios.show');
    }

    /**
     * View must has the user data.
     * 
     * @return void
     */
    public function testViewHasUserData()
    {
        $this->response->assertViewHas('user');
    }

    /**
     * User data must be available.
     * 
     * @return void
     */
    public function testUserData()
    {
        $this->response
            ->assertSee($this->user->id)
            ->assertSee($this->user->name)
            ->assertSee($this->user->photo)
            ->assertSee($this->user->email)
            ->assertSee($this->user->number)
            ->assertSee($this->user->created_at)
            ->assertSee($this->user->updated_at);
    }

}
