<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function login(Request $request) {
        
        //Validando os campos
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $authOK = Auth::guard('admin')->attempt($credentials, $request->remember);

        if($authOK) {
            return redirect()->intended(route('admin.dashboard')); //intended -> permite que ao logar no sistema atravez de alguma rota digitada na url, possa acessa diretamente a rota especificada ao invez de ir para o dashboard.
        } 
        
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function index() {
        return view("auth.admin-login");
    }
}
