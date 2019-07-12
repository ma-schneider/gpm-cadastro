<?php

/**
 * Test User update form.
 * 
 * @category Test
 * @package  UpdateUserTest
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */
namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Test User update form.
 * 
 * @category Test
 * @package  UpdateUserTest
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */
class TestUpdateUser extends DuskTestCase
{

    protected $user;
    protected $newUser;

    /**
     * Initialize tests parameters.
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->newUser = factory(User::class)->make();
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
     * Must update a given user register data.
     * 
     * @return void
     */
    public function testUpdateUser()
    {
        $this->browse(
            function ($browser) {
                $browser->loginAs($this->user)
                    ->visit('/socios/' . $this->user->id . 'edit')
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
                    ->type('password', 'secret')
                    ->click('@update')
                    ->assertSee('Cadastro atualizado com sucesso.')
            }
        );
    }



}
