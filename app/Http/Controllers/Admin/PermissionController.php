<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionRequest;
use App\Model\Permission;
use App\Traits\RedirectTraits;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    use RedirectTraits;

    public function __construct()
    {
        $this->middleware('can:user.superadmintrator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Permission::paginate(50);
        $this->setUrl();
        return view('permissions.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $item = Permission::findOrFail($id);
        return view('permissions.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $item = Permission::findOrFail($id);
        $data = $request->only(['display_name', 'description']);
        if ($item->update($data)) {
            if ($request->save == 'save') {
                $url = $this->getUrl(route('adpermissions.index'));
                return redirect($url)->with('msg', 'Success!');
            } else {
                return redirect()->route('adpermissions.edit', $id);
            }
        }
        return redirect()->route('adpermissions.edit', $id)->with('msger', 'Error!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
