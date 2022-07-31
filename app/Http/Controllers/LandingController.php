<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Landing;
use App\Models\Scroll;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landings = Landing::all();
        //  $this->parceCatalog($node,$node->url);
        return view('landing.index', [
            'landings' => $landings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scrolls = Scroll::all();
        $groups = Group::all();
        return view('landing.create', [
            'groups' => $groups,
            'scrolls' => $scrolls,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $groupId = Group:: where('name', $request->get('groupId'))->first()->id;
        //dd($request);
        $scrollId = Scroll::NametoId( $request->get('scrollId'));
       // dd($groupId,$scrollId,$request->get('groupId',$request->get('scrollId')));
        $landings = Landing::create([
            'scrollId' => $scrollId,
            'order' => $request->get('order'),
            'groupId' => $groupId
        ]);
        if (!$landings) {
            return redirect()->back();
        }
        $request->session()->flush('flash massage', 'Landing saved');
        return redirect()->route('landing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $landing = Landing::findOrFail($id);
        $scrollName=Scroll::findOrFail($landing->scrollId)->name;
        $groupName=Group::findOrFail($landing->groupId)->name;
        return view('landing.show', [
            'landing' => $landing,
            'scrollName' => $scrollName,
            'groupName' => $groupName,
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
        $landing = Landing::findOrFail($id);
        $scrollName=Scroll::findOrFail($landing->scrollId)->name;
        $groupName=Group::findOrFail($landing->groupId)->name;
        $scrolls=Scroll::all();
        $groups=Group::all();
        return view('landing.edit', [
            'landing' => $landing,
            'scrollName' => $scrollName,
            'groupName' => $groupName,
            'scrolls' => $scrolls,
            'groups' => $groups,
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
        $updatedRequest=$request->all();
        //dd($updatedRequest);
        $landings = Landing::findOrFail($id);//dd($request->get('scrollId'));
        $updscrollId = Scroll::NametoId( $request->get('scrollId'));
        $updatedRequest['scrollId'] = $updscrollId;
        $updgroupId = Group:: where('name', $request->get('groupId'))->first()->id;
        $updatedRequest['groupId'] = $updgroupId;
        $landings->fill($updatedRequest);
        if (!$landings->save()) {
            return redirect()->back()->withErrors('Update Error');
        }
        $request->session()->flush('flush massage', 'landings updated');
        return redirect()->route('landing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $landings = Landing::findOrFail($id);

        if (!$landings->delete()) {
            return redirect()->back()->withErrors('Delete Error');
        }
        session()->flush('flush massage', 'Landings updated');
        return redirect()->back();
    }
}
