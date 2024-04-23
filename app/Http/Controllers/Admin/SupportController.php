<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSuppport;
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
       if( !$support = Suppport::find($id)){
            return redirect()->back();
       };
        // dd($support);
       return view('admin/supports/show', compact('support'));       
    }


    /**
     * Cria form para cadastro
     *
     * @return void
     */
    public function create()
    {        
        //dd('aqui');
        return view('admin/supports/create');
    }



    public function store(StoreUpdateSuppport $request, Suppport $suppport )
    {
        // Pega apenas os dados que foram validados
        $data = $request->validated();
        $data['status'] = 'a';
        // dd($request->all());

        Suppport::create($data);
        
        return redirect()->route('supports.index');
    }

/**
 * Undocumented function
 *
 * @param string|integer $id
 * @return void
 */
    public function edit(Suppport $support, string|int $id)
    {        
        if(!$support = $support->where('id', $id)->first()){
            return back();
        }

        return view('admin/supports.edit', compact('support'));
    }

    
    public function update(StoreUpdateSuppport $request, Suppport $support, string $id)
    {
        //dd($id);
        if(!$support = $support->find($id)){
            return back();
        }

        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->sabe

        // Pego apenas os dados que foram validados
        $support->update($request->validated());

        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id)
    {
        if(!$support = Suppport::find($id)->delete()){         
            return back();
        }

        //$support->delete();

        return redirect()->route('supports.index');

    }


}
