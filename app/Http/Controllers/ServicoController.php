<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoRequest;
use App\Models\Servico;


class ServicoController extends Controller
{
    /**
     * Lista os serviços
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $servicos = Servico::simplepaginate(10);


       return view('servicos.index')->with('servicos', $servicos);
    }

    /**
     * Mostra o formulário vazio para a criação
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('servicos.create');
    }

    /**
     * Cria um novo registro no banco de dados
     * @param ServicoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ServicoRequest $request)
    {
      $dados = $request->except('_token');

      Servico::create($dados);

      return redirect()->route('servicos.index')->with('mensagem', 'Serviço criado com sucesso!');
    }

    /**
     * Mostra o formulário preenchdio par alteração
     * @param Servico $servico
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Servico $servico)
    {
        return view('servicos.edit')->with('servico', $servico);
    }

    /**
     * Atualiza um registro no banco de dados
     * @param Servico $servico
     * @param ServicoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Servico $servico, ServicoRequest $request)
    {
       $dados = $request->except('_token', '_method');

       $servico->update($dados);

       return redirect()->route('servicos.index')->with('mensagem', 'Serviço atualizado com sucesso!');

    }
}
