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
}
