<?php
/**
 * Test for Register List
 * 
 * @category Controller
 * @package  Register
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

/**
 * Test for Register List
 * 
 * @category Controller
 * @package  Register
 * @author   Marcelo Schneider <schneider.fei@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU
 * @link     https://github.com/ma-schneider/gpm-cadastro
 */
class RegisterListController extends Controller
{

    protected $user;

    public function __construct(User $user) 
    {
        $this->user = $user;
    }

    /**
     * Show a list of user register.
     * 
     * @return View
     */
    public function index()
    {
        $members = $this->user->paginate(4); 
        
        return view('socios.index', compact('members'));
    }
}
