<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
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
            'js/custom.js'
        );
	}


	public function index(Request $request)
	{
        $users = User::all();

		return view('home', [
			'arrCss'	=> $this->arrCss,
            'arrJs'		=> $this->arrJs,
            'request'	=> $request,
            'users'     => $users,
		]);
	}


	public function details(Request $request, $username=NULL)
	{
		$client = new \GuzzleHttp\Client();
		$req = $client->get('https://api.github.com/users/' . $username);
		if ($req->getStatusCode() == 200) {

			$response = $req->getBody()->getContents();

			return view('details', [
				'arrCss'	=> $this->arrCss,
				'arrJs'		=> $this->arrJs,
				'request'	=> $request,
				'response'	=> json_decode($response),
			]);

		} else {

		}
	}
}
