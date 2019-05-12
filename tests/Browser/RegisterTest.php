<?php
/**
 * Test for Register List
 * 
 * @category Test
 * @package  RegisterListTest
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
 * Test for Register List
 * 
 * @category Test
 * @package  RegisterListTest
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */

class RegisterTest extends DuskTestCase
{

    protected $user;
    
    /**
     * Setup for test environment.
     * 
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * Preparing for the next test.
     * 
     * @return void
     */
    protected function tearDown(): void
    {
        $this->artisan('migrate:refresh');
    }

    /**
     * List items must show Item.
     *
     * @return void
     */
    public function testListItems()
    {
        $this->browse(
            function ($first) {
                $first->loginAs($this->user)
                    ->visit('/socios')
                    ->assertSee($this->user->name);
            }
        );
    }

    /**
     * List Item must be a link.
     * 
     * @return void
     */
    public function testItemIsLink()
    {
        $this->browse(
            function ($first) {
                $first->loginAs($this->user)
                    ->visit('/socios')
                    ->waitForText($this->user->name)
                    ->clickLink($this->user->number)
                    ->waitForLocation('/socios/' . $this->user->id)
                    ->assertPathIs('/socios/' . $this->user->id);
            }
        );
    }

}
