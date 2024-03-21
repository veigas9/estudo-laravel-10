<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suppport;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Suppport $support)//Injeção de dependencia
    {
        //Me retorna todo support
        $supports = $support->all();
        //dd($supports);

        return view('admin/supports/index', compact('supports'));
    }

    public function show(string|int $id)
    {
        $support = Suppport::find($id);
        dd($support);
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(Request $request )
    {
        $data = $request->all();
        $data['status'] = 'a';
        // dd($request->all());

        Suppport::create($data);
        
        return redirect()->route('supports.index');

    }
}
