<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use Validator;
use Str;


class MenuController extends Controller
{
    //

    public function list($lang = 'ru')
    {
//        $lang = 'ru';
        $menu = Menu::where(['lang' => $lang, 'parent_id' => null])->with('children.children')->orderBy('order', 'asc')->get();
//        dd($menu);
        return view('admin.menu.list')->with('menu',$menu);
    }

    public function order(Request $request)
    {
//        dd($request->menu);
        foreach ($request->menu as $order => $item) {
            $citem = Menu::find($item['id']);
            $citem->order = $order;
            $citem->parent_id = NULL;
            $citem->save();
            if (isset($item['children'])){
                foreach ($item['children'] as $order2 => $item2) {
                    $citem2 = Menu::find($item2['id']);
                    $citem2->order = $order2;
                    $citem2->parent_id = $item['id'];
                    $citem2->save();
                    if (isset($item2['children'])) {
                        foreach ($item2['children'] as $order3 => $item3) {
                            $citem3 = Menu::find($item3['id']);
                            $citem3->order = $order3;
                            $citem3->parent_id = $item2['id'];
                            $citem3->save();
                        }
                    }
                }
            }
        }
        return response()->json(['statusText' => $request->menu,]);
    }

    public function create(Request $request)
    {
        if($request->isMethod('get')){

            return view('admin.menu.create');
        }else{
            $rules = [
                'title' => 'required|unique:menu,title',
                'parent_id' => 'nullable|exists:menu,id',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $menu = new Menu();
            $menu->title = $request->title;
            $menu->subtitle = $request->subtitle ? $request->subtitle : null;
            $menu->body = $request->body ? $request->body : null;
            $menu->path = $request->path ? $request->path : '#';
            $menu->lang = $request->lang;
            $menu->published = $request->publish ? true : false;
            $menu->save();

            $message = 'Добавлено';

//            return redirect()->route('menu.list')->with('message', $message);
            return redirect()->route('menu.list.lang', $request->lang)->with('message', $message);
        }
    }

    public function edit(Request $request, $id)
    {
        if($request->isMethod('get')){
            $menu = Menu::find($id);
            return view('admin.menu.edit')->with('item',$menu);
        }else{
//            dd($request->all());
            $rules = [
                'title' => 'required|unique:menu,title,'.$id,
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

             $menu = Menu::find($id)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle ? $request->subtitle :null,
                'body' => $request->body ? $request->body : null,
                'path' => $request->path ? $request->path : '#',
                'published' => $request->publish ? true : false,

            ]);
            $lang = $request->lang;

            $message = 'Обновлено';

            return redirect()->route('menu.list.lang', $lang)->with('message', $message);

        }
    }

    public function delete($id)
    {
//        dd($id);
        $menu = Menu::find($id);
        $lang = $menu->lang;
        $menu->children()->delete();
        $menu->delete();
        $message = 'Успешно удалено';

        return redirect()->route('menu.list.lang', $lang)->with('message', $message);
    }
}
