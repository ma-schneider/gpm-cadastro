<?php
/**
 * Test for Create user form
 * 
 * @category Test
 * @package  CreateUserTest
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

/**
 * Test for Create user form
 * 
 * @category Test
 * @package  CreateUserTest
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */

class CreateUserTest extends DuskTestCase
{

    protected $user;

    protected $newUser;

    /**
     * Set up the environment.
     * 
     * @return void
     */
    protected function setUp(): void 
    {
        parent::setUp();
        $this->newUser = factory(User::class)->make();
        $this->user = factory(User::class)->create();
    }

    /**
     * Form must create new user
     * 
     * @return void
     */
    public function testUserForm()
    {
        $this->browse(
            function ($browser) {
                $browser->loginAs($this->user)
                    ->visit('/socios/create')
                    ->type('name', $this->newUser->name)
                    ->type('email', $this->newUser->email)
                    ->type('email_verified_at', $this->newUser->email)
                    ->type('number', $this->newUser->number)
                    ->attach('photo', __DIR__.'/photos/santos.jpg')
                    ->type('password', 'secret')
                    ->click('@register')
                    ->waitForLocation('/socios/create')
                    ->assertSee('Sócio cadastrado com sucesso');
            }
        );
        
        $this->assertDatabaseHas('users', ['name' => $this->newUser->name]);
    }

}
