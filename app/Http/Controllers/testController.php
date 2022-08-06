<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function testFoo()
    {
        
        $array=[
            'w4'=>'scrol1',
            'w2'=>'scrol2',
            'w3'=>'scrol3',
        ];
        //dd($array);
        return view('s1',[
            'array'=>$array,
        ]);
    }

    public function phpInfo(){
        echo phpinfo();

    }

    public function tFoo(){
      //  dd($_GET);
        return view('tt');
    }
}
