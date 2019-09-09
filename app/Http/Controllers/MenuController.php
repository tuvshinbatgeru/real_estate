<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = 'sale';
        if($request->type) {
            $type = $request->type;
        }

        $title = trans('app.menus');
        $menus = Menu::where('main_type', $type)->get();
        return view('admin.menu.index', compact('title', 'menus', 'type'));
    }

    public function getMenusByType(Request $request)
    {
        $type = 'sale';
        if($request->type) {
            $type = $request->type;
        }

        $menus = Menu::where('main_type', $type)->get();
        return response()->json([
            'code' => 0,
            'menus' => $menus
        ]);
    }

    public function categories(Request $request) 
    {
        $title = "Ангилалд бүлэг тохируулах";
        $menus = Menu::all();
        return view('admin.menu.categories', compact('title', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = 'sale';
        if($request->type) {
            $type = $request->type;
        }
        return view('admin.menu.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'  => 'required',
            'main_type'  => 'required'
        ];

        $this->validate($request, $rules);

        $duplicated = Menu::where('name', $request->name)->count();
        
        if ($duplicated > 0) {
            return back()->with('error', 'Нэр давхцаж байна!')->withInput();
        }

        $menu = Menu::create([
            'name' => $request->name,
            'main_type' => $request->main_type
        ]);

        return redirect('/dashboard/menus')->with([
            'success' => trans('app.success'),
            'type' => $menu->main_type,
        ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();
        return redirect('/dashboard/menus')->with('success', 'Амжилттай устгалаа.');
    }
}
