<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Models\User
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(10);
     
        return $users;
    }

    /**
     * Find user by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response or App\Models\User
     */
    public function findById(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $user = User::find($request->id);

        if($user)
        {
            return $user;
        }
        else
        {
            return response("Usuário não encontrado", 400);
        }
    }

    /**
     * Check user in database.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if($user) 
        {
            $verify = password_verify($request->password, $user->password);
    
            if ($verify) {
                return response("Sucesso", 200);
            } 
        }

        return response("Email ou senha incorreto", 400);
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required'
        ]);

        $hash = password_hash($request->password, PASSWORD_DEFAULT);

        $request->merge(['password' => $hash]);

        User::create($request->all());
     
        return response("Sucesso", 200);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id'       => 'required',
            'email'    => 'required',
            'password' => 'required'
        ]);
        
        $user = User::find($request->id);

        if($user)
        {
            $hash = password_hash($request->password, PASSWORD_DEFAULT);

            if($user->password != $hash) 
            {
                $request->merge(['password' => $hash]);
            }

            $user->update($request->all());
        
            return response("Sucesso", 200);
        }
        else
        {
            return response("Usuário não encontrado", 400);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $user = User::find($request->id);

        if($user)
        {
            $user->delete();

            return response("Sucesso", 200);
        }
        else
        {
            return response("Usuário não encontrado", 400);
        }
    }
}
