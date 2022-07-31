<?php

namespace App\Http\Controllers;

use App\Models\Scroll;
use Illuminate\Http\Request;

class ScrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $scroll = Scroll::all();
        //  $this->parceCatalog($node,$node->url);
        return view('scroll.index', ['Scrolls' => $scroll]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scroll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $Scroll=Scroll::create([
            
            'formId'=>$request->get('formId'),
            'description'=>$request->get('description'),
            'header'=>$request->get('header'),
            'offer'=>$request->get('offer'),
            'imagepath'=>$request->get('imagepath'),
            'html'=>$request->get('html'),
            'typeScroll'=>$request->get('typeScroll'),
            'name' =>$request->get('name')
        ]); 
        if(!$Scroll){
            return redirect()->back();
        }
            $request->session()->flush('flash massage','Scroll saved');
            return redirect()->route('scroll.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scroll=Scroll::findOrFail($id);
        return view('Scroll.show',[
            'scroll'=>$scroll
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $Scroll=Scroll::findOrFail($id);
        return view('scroll.edit',[
            'scroll'=>$Scroll
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Scroll=Scroll::findOrFail($id);
        $Scroll->fill($request->all());
        if(!$Scroll->save()){
            return redirect()->back()->withErrors('Update Error');
        }
            $request->session()->flush('flush massage','Scroll updated');
            return redirect()->route('scroll.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Scroll=Scroll::findOrFail($id);
        
        if(!$Scroll->delete()){
            return redirect()->back()->withErrors('Delete Error');
        }
            session()->flush('flush massage','Scroll updated');
            return redirect()->back();  
    }
}
