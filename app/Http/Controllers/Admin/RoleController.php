<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Model\Permission;
use App\Model\Role;
use App\Traits\RedirectTraits;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use RedirectTraits;
    public function __construct()
    {
        //$this->middleware('can:user.index')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Role::paginate(50);
        $this->setUrl();
        return view('roles.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        if ($role->save()) {
            $role->permissions()->attach($request->permisions);
            if ($request->save == 'save') {
                $url = $this->getUrl(route('adroles.index'));
                return redirect($url)->with('msg', 'Success!');
            } else {
                return redirect()->route('adroles.edit', $role->id);
            }
        } else {
            return redirect()->route('adroles.create')->with('msg', 'Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('item', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::findOrFail($id); 
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        if ($role->save()) {
            $role->permissions()->sync($request->permisions);
            if ($request->save == 'save') {
                $url = $this->getUrl(route('adroles.index'));
                return redirect($url)->with('msg', 'Success!');
            } else {
                return redirect()->route('adroles.edit', $id);
            }
        } else {
            return redirect()->route('adroles.create')->with('msg', 'Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        if ($role->delete()) {
            $url = $this->getUrl(route('adroles.index'));
            return redirect($url)->with('msg', 'Success!');
        }
    }
}
