<?php
/**
 * Test User Database
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
 * Test User Database
 * 
 * @category Test
 * @package  RegisterTest
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */
class UserDatabaseTest extends TestCase
{
    
    protected $user;

    /**
     * Initialize test parameters
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * Refresh the database before testing.
     * 
     * @return void
     */
    protected function tearDown(): void
    {
        $this->artisan('migrate:refresh');
    }

    /**
     * Database users must have the following fields
     * 
     * @return void
     */
    public function testDatabase() 
    {
        $this->assertDatabaseHas(
            'users', 
            [
                'name' => $this->user->name,
                'phone' => $this->user->phone,
                'address' => $this->user->address,
                'city' => $this->user->city,
                'state' => $this->user->state,
                'membership' => $this->user->membership,
                'birthday' => $this->user->birthday,
                'rg' => $this->user->rg,
                'cpf' => $this->user->cpf,
                'blood' => $this->user->blood,
                'healthcare' => $this->user->healthcare,
                'cbm' => $this->user->cbm,
                'cbm_institution' => $this->user->cbm_institution,
                'email' => $this->user->email,
                'number' => $this->user->number,
                'photo' => $this->user->photo,
            ]
        );
    }
}
