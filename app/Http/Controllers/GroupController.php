<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Landing;
use App\Models\Scroll;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $groups = Group::all();
        //  $this->parceCatalog($node,$node->url);
        return view('group.index', ['Groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = Group::create([
            'description' => $request->get('description'),
            'name' => $request->get('name'),
            'nameHeader' => $request->get('nameHeader')
        ]);
        if (!$group) {
            return redirect()->back();
        }
        $request->session()->flush('flash massage', 'Group saved');
        return redirect()->route('group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::findOrFail($id);
        $scrolls[]=null;
        if ($group) {
            $landings = Landing::where('groupId', $group)->get();
        }
        if ($landings) {
            $landings = $landings->sortBy('order');
            foreach ($landings as $landing) {
                $scrolls[] = Scroll::find($landing->scrollId);
            }
        }


        return view('group.show', [
            'group' => $group,
            'scrolls' => $scrolls
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
        $group = Group::findOrFail($id);
        return view('group.edit', [
            'group' => $group
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
        $group = Group::findOrFail($id);
        $group->fill($request->all());
        if (!$group->save()) {
            return redirect()->back()->withErrors('Update Error');
        }
        $request->session()->flush('flush massage', 'Group updated');
        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::findOrFail($id);

        if (!$group->delete()) {
            return redirect()->back()->withErrors('Delete Error');
        }
        session()->flush('flush massage', 'Group updated');
        return redirect()->back();
    }
}
