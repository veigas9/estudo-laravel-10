<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSuppport;
use App\Models\Suppport;
use Illuminate\Http\Request;
use App\Services\SupportService;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    )
    {
        
    }
    public function index(Request $request)//Injeção de dependencia
    {
        //Me retorna todo support
        $supports = $this->service->getAll($request->filter);
        //dd($supports);

        return view('admin/supports/index', compact('supports'));
    }

    public function show(String $id)
    {
       if( !$support = $this->service->findOne($id)){
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
        //Implementando nosso parttner DTO
        $this->service->new(CreateSupportDTO::makeFromRequest($request));

        // Pega apenas os dados que foram validados
        // $data = $request->validated();
        // $data['status'] = 'a';
        // dd($request->all());
        // Suppport::create($data);
        
        return redirect()->route('supports.index');
    }

/**
 * Undocumented function
 *
 * @param string|integer $id
 * @return void
 */
    public function edit(String $id)
    {        
        if(!$support = $this->service->findOne($id)){
            return back();
        }

        return view('admin/supports.edit', compact('support'));
    }

    
    public function update(StoreUpdateSuppport $request, Suppport $support, string $id)
    {

        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));
        
        if(!$support){
            return back();
        }

        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->sabe
        // Pego apenas os dados que foram validados
        //$support->update($request->validated());

        return redirect()->route('supports.index');
    }

    public function destroy(String $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');

    }


}
