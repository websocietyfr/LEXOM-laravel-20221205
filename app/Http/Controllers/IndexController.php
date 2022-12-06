<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request, PaymentService $cb){
        dump($cb);
        $cb->incrementBalence();
        dump($cb);
        PaymentService::increment();
        dd($cb);
        dd($request);
        return 'page Index';
    }

    public function contact(){
        return 'page Contact';
    }

    public function cgv() {
        return 'page CGV';
    }

    public function annonce($id = null) {
        if($id){
            return 'Annonce n°'.$id;
        }
        return 'RE-BIENVENUE SUR LE CONTROLLER INDEX FONCTION ANNONCE';
    }
}
