<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;
use App\User;

use ReCaptcha\ReCaptcha;

class MessageController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index($username,$id)
    {
    	return view('message.index');
    }


    public function store(Request $res)
    {

    	$this->validate($res,[
    		'message' => 'required',
    		'g-recaptcha-response' => 'required'

    	],
    	['g-recaptcha-response.required'=>'Captcha is required']);

    	$recaptcha = new ReCaptcha('6Ldv6yEUAAAAACwc-Erul9P1iAMcJqKd5hCQJnD0');

dd($recaptcha);
		$resp = $recaptcha->verify($res->g-recaptcha-response,$res->ip());
		if ($resp->isSuccess()) {
		   
		    $message = new Message();

       		$message->body = $res->message;

       		$message->user_id = auth()->user()->id;

       		$message->save();


		} else {
		    $errors = $resp->getErrorCodes();
		}

		return back();

    }
}
