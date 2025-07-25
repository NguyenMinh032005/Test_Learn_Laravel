<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userModel;
use Illuminate\Http\Request;

class userController extends Controller {
    public function index() {
        $users = User::all();

        return view( 'user.index', [ 'users' => $users ] );
    }

    public function create() {
        return view( 'user.create' );
    }

    public function store( Request $request ) {
        $data           = $request->validate( [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'required|string|min:8',
        ],
            [
                'name.required'     => 'Bạn cần phải nhập Tên.',
                'email.required'    => 'Bạn cần phải nhập email.',
                'password.required' => 'Bạn cần phải nhập Password.',
                'password.min'      => 'Password phải có ít nhất 8 ký tự.',
            ] );
        $user           = new User();
        $user->name     = $data['name'];
        $user->email    = $data['email'];
        $user->password = bcrypt( $data['password'] );
        $user->save();

        return redirect()->route( 'list-user.index' )->with( 'success', 'User created successfully.' );
    }

    public function show( User $user ) {

        return view( 'user.show', compact( 'user' ) );
    }

    public function edit( User $user ) {
        return view( 'user.edit', compact( 'user' ) );
    }

    public function update( Request $request, User $user ) {
        $data           = $request->validate( [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => !isset($request->password) || $request->password == '' ? 'nullable' : 'required|string|min:8',
        ],
            [
                'name.required'     => 'Bạn cần phải nhập Tên.',
                'email.required'    => 'Bạn cần phải nhập email.',
                'password.required' => 'Bạn cần phải nhập Password.',
                'password.min'      => 'Password phải có ít nhất 8 ký tự.',
            ] );
        $user->name     = $data['name'];
        $user->email = $data['email'];
        if(isset($request->password) && strlen($data['password']) > 8) {
            $user->password = bcrypt( $data['password'] );
        }

        $user->update();

        return redirect()->route( 'list-user.index' )->with( 'success', 'User updated successfully.' );
    }

    public function destroy( User $user ) {
        $user->delete();
    }

}
