<?php

/**
 * Test for Show User Page.
 * 
 * @category Test
 * @package  ShowUserTest
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
 * Test for Show User Page.
 * 
 * @category Test
 * @package  ShowUserTest
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */
class ShowUserTest extends DuskTestCase
{

    protected $user;

    /**
     * Test environment setup.
     * 
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create(); 
    }

    /**
     * Reset test data.
     * 
     * @return void
     */
    protected function tearDown(): void
    {
        $this->artisan('migrate:refresh');
    }

    /**
     * Must show a Rmove User confirmation modal.
     * 
     * @return void
     */
    public function testRemoveUserModal()
    {
        $this->browse(
            function ($browser) {
                $browser->loginAs($this->user)
                    ->visit('/socios/' . $this->user->id)
                    ->click('@remove-user')
                    ->waitFor('#remove-user')
                    ->assertSee('Remover Sócio')
                    ->assertSeeIn('@confirmation', 'Remover Sócio');
            }
        );
    }

    /**
     * Test Remove User button
     * 
     * @return void
     */
    public function testDeleteUser()
    {
        $this->browse(
            function ($browser) {
                $browser->loginAs($this->user)
                    ->visit('/socios/' . $this->user->id)
                    ->click('@remove-user')
                    ->waitFor('#remove-user')
                    ->click('@confirmation')
                    ->waitForLocation('/socios')
                    ->assertDontSee($this->user->name)
                    ->assertSee('Sócio removido com sucesso');
            }
        );
    }
    
}
