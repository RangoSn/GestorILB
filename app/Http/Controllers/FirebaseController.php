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
        $createPost    =   $database
        ->getReference('blog/posts')
        ->push([
            'title' =>  'Laravel 6',
            'body'  =>  'This is really a cool database that is managed in real time.'

        ]);
            
        echo '<pre>';
        print_r($createPost->getvalue());
        echo '</pre>';
    } 
    
}
