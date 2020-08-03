<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Auth;

class LoginController extends Controller
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
		return view('login', [
			'arrCss'	=> $this->arrCss,
			'arrJs'		=> $this->arrJs,
		]);
	}


	public function authenticate(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'email'		=> 'required|email',
				'password'	=> 'required',
			],
			[
				'required'	=> 'Campos obrigatórios',
				'email'		=> 'Informe um e-mail válido',
			]
        );

        if ($validator->fails()) {
			
			$code = 409;
			$response = $validator->messages();

		} else {

			$hashedPassword = md5($request->password);

			$credentials = array(
				'email'		=> $request->email,
				'password'	=> $hashedPassword,
			);

			if (Auth::attempt($credentials)) {

				$user = User::where('email', $request->email);
				if ($user->exists()) {

					$row = $user->first();

					# cria a sessão
					$request->session()->put('users_id', $row->id);
					$request->session()->put('users_username', $row->username);
					$request->session()->put('users_email', $row->email);
					$request->session()->put('users_phone', $row->phone);

					$code = 200;
					$response = [
						'message_action'	=> 'success',
						'message'			=> 'Login efetuado com sucesso!',
						'redirect'			=> route('home'),
					];

				} else {

					$code = 200;
					$response = [
						'message_action'	=> 'success',
						'message'			=> 'Seu cadastro já foi finalizado!<br>Você será redicionado para o painel de acesso das empresas.',
						'redirect'			=> route('control.login'),
					];

				}

			} else {

				$code = 409;
				$response = [
					'message_action'	=> 'danger',
					'message'			=> 'Dados inválidos!'
				];

			}

		}

		return response()->json($response, $code);
	}


	public function logout(Request $request)
	{
		Auth::logout();

		$request->session()->flush();
		$request->session()->regenerate();

		return redirect()->route('login');
	}
}
