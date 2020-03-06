<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    //
    public function index() {

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://gestor-eventos-ilb.firebaseio.com/')
        ->create();

        $database   =   $firebase->getDatabase();
        $auth = $firebase->getAuth();
        $user = $auth->createUserWithEmailAndPassword('jay5@gmail.com','123455L');
    } 
    
}
