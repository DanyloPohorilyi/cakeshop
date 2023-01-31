<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    public function about()
    {
        return view('main.about');
    }

    public function contact()
    {
        return view('main.contact');
    }

    public function login(){
        return view('main.login');
    }

    public function checkLogin(Request $request)
    {
        $login = $request->input('login');
        $customer = Customer::where('login', $login)->firstOr(function (){
            return null;
        });
        if($customer != null){
            if(strcmp($request->input('password'), $customer->password) == 0){

                $request->session()->put('customer_id', $customer->id);
                return redirect('/');
            }
            else
                return back();
        }
        return back();
    }

    public function registration()
    {
        return view('main.registration');
    }

    public function checkRegistration(Request $request)
    {
        $customer = new Customer();
        $customer->login = $request->input('login');
        $customer->password = $request->input('password');
        $customer->first_name = $request->input('firstName');
        $customer->last_name = $request->input('lastName');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->save();
        $request->session()->put('customer_id', $customer->id);
        return redirect('/');
    }

    public function customer(Request $request, $customer_id)
    {
        $customer = Customer::find($customer_id)->first();
        return view('main.customer', ['customer' => $customer]);
    }
}
