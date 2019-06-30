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
use Illuminate\Suport\Facades\Storage;
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

    /**
     * Class constructor.
     * 
     * @param User $user User Instante
     * 
     * @return void
     */
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

    /**
     * Show the create page.
     * 
     * @return View
     */
    public function create()
    {
        return view('socios.create');
    }

    /**
     * Store a new User
     * 
     * @param Request $request Http Request
     * 
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $path = $this->storeFile($request);
            $user = $request->all();
            $user['photo'] = $path;
            $this->user->create($user);
            $request->session()->flash('success', 'Sócio cadastrado com sucesso.');
            return redirect()->route('socios.create');
        } catch (Exception $e) {
            $request->session()->flash('danger', $e);
            return redirect()->route('socios.create');  
        }
    }

    /**
     * Show user details page.
     * 
     * @param Integer $id User Id.
     * 
     * @return View
     */
    public function show($id)
    {
        $user = $this->user->find($id);

        return view('socios.show', compact('user'));
    }

    /**
     * Remove user.
     * 
     * @param Integer $id      User Id.
     * @param Request $request Request instance
     *  
     * @return Redirect
     */
    public function destroy($id, Request $request)
    {
        $user = $this->user->find($id)->delete();
        
        if ($user) {
            $request->session()->flash('success', 'Sócio removido com sucesso.');
        } else {
            $request->session()->flash('danger', 'Não foi possível remover o sócio.');
        }

        return redirect()->route('socios.index');
    }

    /**
     * Store a given file.
     * 
     * @param Request $request Request Instance
     * 
     * @return string
     */
    protected function storeFile(Request $request)
    {
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            return $path;   
        }
        
        return null;
    }

}
