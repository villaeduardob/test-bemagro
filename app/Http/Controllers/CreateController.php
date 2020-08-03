<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use DB;

class CreateController extends Controller
{
	protected $arrCss;
	protected $arrJs;

	public function __construct()
	{
        $this->arrCss = array(
            'css/bootstrap/bootstrap.min.css',
            'css/custom.css'
        );
        
		$this->arrJs = array(
            'js/jquery/jquery.min.js',
		    'js/bootstrap/bootstrap.min.js',
		    'js/jquery/jquery.validate.min.js',
            'js/custom.js'
        );	
	}


	public function index()
	{
		return view('create', [
			'arrCss'	=> $this->arrCss,
			'arrJs'		=> $this->arrJs,
		]);
    }
    

	public function store(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'email'	=> 'required|email',
				'username'	=> 'required',
				'password'	=> 'required',
			],
			[
				'required'	=> 'Campo obrigatório',
				'email'		=> 'Informe um e-mail válido',
			]
        );

        if ($validator->fails()) {
			
			$code = 409;
			$response = $validator->messages();

		} else {

            $user = User::where('username', $request->username)
						  ->orWhere('email', $request->email);
			//dd($user->toSql(), $user->getBindings());
			if ($user->exists()) {

				$code = 409;
				$response = [
					'message_action'	=> 'danger',
					'message'			=> 'O usuário ou e-mail informado já foi utilizado!'
				];

			} else {

				$hashedPassword = Hash::make(md5($request->password));

				$user = new User;
				$user->email	= $request->email;
				$user->username	= $request->username;
				$user->password	= $hashedPassword;
				if ($user->save()) {

					$redirect = route('login');

					if (session()->has('users_email')) {
						$redirect = route('home');
					}

					$code = 201;
					$response = [
						'message_action'	=> 'success',
						'message'			=> 'Usuário cadastro com sucesso!',
						'redirect'			=> $redirect
					];

				} else {

					$code = 409;
					$response = [
						'message_action'	=> 'danger',
						'message'			=> 'Não foi possível cadastrar o usuário!'
					];
				}

			}

		}

		return response()->json($response, $code);
	}


	public function edit($id)
	{
		$user = User::where('id', $id);
		if ($user->exists()) {
			$row = $user->first();
		}
		
		return view('edit', [
			'arrCss'	=> $this->arrCss,
			'arrJs'		=> $this->arrJs,
			'row'		=> $row,
		]);
	}


	public function update(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'email'	=> 'required|email',
				'username'	=> 'required',
				'password'	=> 'required',
			],
			[
				'required'	=> 'Campo obrigatório',
				'email'		=> 'Informe um e-mail válido',
			]
        );

        if ($validator->fails()) {
			
			$code = 409;
			$response = $validator->messages();

		} else {

			$user = User::where('id', $request->id);
			if ($user->exists()) {

				$row = $user->first();

				if ($request->password) {

					$hashedPassword = Hash::make(md5($request->password));

				} else {

					$hashedPassword = $row->password;

				}

				$update = tap(DB::table('users'))->where('id', $request->id)->update([
					'email'		=> $request->email,
					'username'	=> $request->username,
					'password'	=> $hashedPassword
				]);
				if ($update == 1) {

					$code = 201;
					$response = [
						'message_action'	=> 'success',
						'message'			=> 'Usuário alterado com sucesso!',
						'redirect'			=> route('home')
					];

				} else {

					$code = 409;
					$response = [
						'message_action'	=> 'danger',
						'message'			=> 'Não foi possível editar o usuário!'
					];

				}

			} else {

				$code = 201;
				$response = [
					'message_action'	=> 'danger',
					'message'			=> 'Usuário não localizado!',
					'redirect'			=> route('home')
				];

			}

		}

		return response()->json($response, $code);
	}


	public function trash($id)
	{
		$user = User::where('id', $id);
		if ($user->exists()) {
			$user->delete();
		}
		
		return redirect()->route('home');
	}
}
