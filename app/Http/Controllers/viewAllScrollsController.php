<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Landing;
use Illuminate\Http\Request;
use App\Models\Scroll;
use finfo;

class viewAllScrollsController extends Controller
{
    public function showAll()
    {
        $scrolls = Scroll::all();
        return view('viewAllScrolls', ['scrolls' => $scrolls]);
    }

    public function Landing(Request $request)
    {

        //finding in current GET-req field with expected nameHeader in Group table and it name(value)
        
        $groups = Group::all();
        $landings = null;
        $expectedGroup = null;
        $scrolls = [];
        $keyArr = [];
        foreach ($_GET as $key => $getFild) {
            $keyArr[$key] = $getFild;
            foreach ($groups as $group) {

                if ($key == $group->nameHeader)
                    if ($getFild == $group->name)
                        $expectedGroup = $group->id;
            }
        }

        if ($expectedGroup) {
            $landings = Landing::where('groupId', $expectedGroup)->get();
        }
        $landings = $landings->sortBy('order');
        foreach ($landings as $landing) {
            $scrolls[] = Scroll::find($landing->scrollId);
        }
        
        //$scrolls = Scroll::all();
        
       // $scrolls=Scroll::all();
        //dd($scrolls);
        return view('landing', ['scrolls' => $scrolls]);
    }
}
