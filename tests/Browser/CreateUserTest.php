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
                    ->type('phone', $this->newUser->phone)
                    ->type('address', $this->newUser->address)
                    ->type('city', $this->newUser->city)
                    ->type('state', $this->newUser->state)
                    ->type('blood', $this->newUser->bloody)
                    ->type('healthcare', $this->newUser->healthcare)
                    ->type('membership', $this->newUser->membership)
                    ->type('birthday', $this->newUser->birthday)
                    ->type('rg', $this->newUser->rg)
                    ->type('cpf', $this->newUser->cpf)
                    ->select('cbm', $this->newUser->cbm)
                    ->type('cbm_institution', $this->newUser->cbm_institution)
                    ->type('email_verified_at', $this->newUser->email)
                    ->type('number', $this->newUser->number)
                    ->attach('photo', __DIR__.'/photos/santos.jpg')
                    ->click('@register')
                    ->waitForLocation('/socios/create')
                    ->assertSee('Sócio cadastrado com sucesso');
            }
        );
        
        $this->assertDatabaseHas('users', ['name' => $this->newUser->name]);
    }

}
