<?php

namespace App\Http\Controllers\configuracion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
//use Yajra\lavarel_datatables_oracle\DataTables;

class UserController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users->all();
    }

    public function index(){

        return view('configuracion.user', [
            'users' => $this->users
        ]);
    }

    public function create(){
        return view('configuracion.createuser');
    }

    public function store(Request $request){


        $credenciales = $request->validate([
            'dni' => 'bail|required|numeric|digits:10',
            'name' => 'bail|required',
            'lastname' => 'bail|required',
            'lastname2' => 'bail|required',
            'email' => 'bail|required',
            'password' => 'bail|required',
            'status' => 'bail|nullable'
        ]);

        $status = $request->filled('status');

        $user = new User();

        $user->dni = $request->dni;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->lastname2 = $request->lastname2;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $status;
        $user->save();

        return redirect('/users/create')->with('status', 'El usuario '.$user->name.' se ha registrado satisfactoriamente');

    }

    public function show(){

    }

    public function edit(User $user){
        return view('configuracion.edituser',
                    ['user' => $user
        ]);
    }

    public function update(){

    }

    public function destroy(){

    }

    public function datatables(Request $request){
        if ($request->ajax()) {

            $users = $this->users;

            return Datatables::of($users)//->make();
            //return Datatables($obtenerObjetivos)
                    ->addColumn('action', function ($users) {
                        $buttons = '<a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> ';
                        $buttons .= '<a href="'.route('edit.users',['id' => $users->id]).'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> ';
                        $buttons .= '<a class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>';
                        return $buttons;
                    })
                    ->make(true);
        }

    }
}
