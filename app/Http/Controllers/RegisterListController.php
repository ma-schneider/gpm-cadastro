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
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Faker\Generator as Faker;
use App\Http\Requests\Users\CreateRequest;

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
    protected $faker;

    /**
     * Class constructor.
     * 
     * @param User  $user  User  Instante
     * @param Faker $faker Faker data
     * 
     * @return void
     */
    public function __construct(User $user, Faker $faker) 
    {
        $this->user = $user;
        $this->faker = $faker;
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
     * Render the user edit form
     * 
     * @param Integer $id User id
     * 
     * @return View 
     */
    public function edit($id)
    {
        $user = $this->user->findOrFail($id);

        return view('socios.edit', compact('user'));
    }

    /**
     * Update User data.
     * 
     * @param UserUpdateRequest $request User data
     * @param Integer           $id      User id
     * 
     * @return Array
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $path = $this->storeFile($request);
            $data = $request->all();
            
            if ($path) {
                $data['photo'] = $path;
            }

            $user = $this->user->find($id);
            $user->fill($data);
            $user->save();
            
            $request->session()->flash('success', 'Cadastro atualizado com sucesso.');
            return redirect()->route('socios.edit', ['id' => $id]);

        } catch (ValidationException $e) {
            
            $response = [
                'message' => 'Algum problema ocorreu tentar atualizar o cadastro.',
                'status' => false,
                'error' => $e,
            ];
            $request->session->flash('error', 'Ocorreu um problema ao tentar atualizar o cadastro.');
            return redirect()->route('socios.update', ['id' => $id]);
        }

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
     * @param CreateRequest $request Http Request
     * 
     * @return void
     */
    public function store(CreateRequest $request)
    {
        try {
            $path = $this->storeFile($request);
            $user = $request->all();
            $user['photo'] = $path;

            if (!isset($user['password'])) {
                $this->generatePassword($user);
            }

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

    /**
     * Gewnerate a password
     * 
     * @param Array $user User data
     * 
     * @return void
     */
    protected function generatePassword(&$user)
    {
        $user['password'] = $this->faker->randomNumber(8); 
    }

}
