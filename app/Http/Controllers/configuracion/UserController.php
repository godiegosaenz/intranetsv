<?php

namespace App\Http\Controllers\configuracion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Arr;

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
        return view('configuracion.userCreate',[
            'user' => new User()
        ]);
    }

    public function store(SaveUserRequest $request){

        $registerUser = Arr::add($request->validated(),'password',bcrypt($request->dni.$request->lastname));
        User::create($registerUser);
        return redirect('/users/create')->with('status', 'El usuario '.$request->name.' se ha registrado satisfactoriamente');
    }

    public function show(User $user){
        return view('configuracion.userShow',compact('user'));
    }

    public function edit(User $user){
        return view('configuracion.userEdit',
                    ['user' => $user
        ]);
    }

    public function update(User $user,UpdateUserRequest $request){
        $user->update($request->validated());
        return back()->with('status',  'El usuario '.$request->name.' se ha actualizado satisfactoriamente');
    }

    public function destroy(){

    }

    public function datatables(Request $request){
        if ($request->ajax()) {

            $users = $this->users;

            return Datatables::of($users)
                    ->addColumn('action', function ($users) {
                        $buttons = '<a href="'.route('users.show',['user' => $users]).'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> ';
                        $buttons .= '<a href="'.route('users.edit',['user' => $users]).'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> ';
                        $buttons .= '<a class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>';
                        return $buttons;
                    })
                    ->make(true);
        }

    }
}
