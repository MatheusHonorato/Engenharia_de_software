<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Redirect;
use App\PerfilAluno;
use App\Habilidade;
use App\UserHabilidade;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;

        $user = User::find($id);
        if($user->status == '0'){
            Auth::logout();
            return Redirect::route('welcome')->with('message', 'Aguarde aprovação');
        }
        return view('home', compact('user'));
    }


    public function perfilIndex()
    {
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = User::find($id); 
        $perfilaluno = PerfilAluno::where('id_aluno',$id)->first();

        return view('user.perfil.perfil', compact('user','perfilaluno'));
    }


    public function perfilIndexUpdate(Request $request)
    {
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $perfilaluno = PerfilAluno::where('id_aluno',$id)->first();
        $perfilaluno->nascimento = $request->nascimento;
        $perfilaluno->cpf = $request->cpf;
        $perfilaluno->rg = $request->rg;
        $perfilaluno->sexo = $request->sexo;
        $perfilaluno->periodo = $request->periodo;
        $perfilaluno->telefone = $request->telefone;
        $perfilaluno->nacionalidade = $request->nacionalidade;
        $perfilaluno->estado = $request->estado;
        $perfilaluno->cidade = $request->cidade;
        $perfilaluno->bairro = $request->bairro;
        $perfilaluno->logadouro = $request->logadouro;
        $perfilaluno->numero = $request->numero;
        $perfilaluno->complemento = $request->complemento;

        if($request->idiomaptbr!=1)
            $perfilaluno->idiomaptbr = 0;
        if($request->idiomaptbr==1)
            $perfilaluno->idiomaptbr = 1;

        if($request->idiomaingles!=1)
            $perfilaluno->idiomaingles = 0;
        if($request->idiomaingles==1)
            $perfilaluno->idiomaingles = 1;

        if($request->idiomaespanhol!=1)
            $perfilaluno->idiomaespanhol = 0;
        if($request->idiomaespanhol==1)
            $perfilaluno->idiomaespanhol = 1;

        $perfilaluno->lattes = $request->lattes;
        $perfilaluno->facebook = $request->facebook;
        $perfilaluno->linkedin = $request->linkedin;
        $perfilaluno->instagram = $request->instagram;
        $perfilaluno->twitter = $request->twitter;
        $perfilaluno->save();

        return view('user.perfil.perfil', compact('user','perfilaluno'));
    }

    public function atuacaoIndex()
    {
        return view('user.profissional.atuacao');
    }

    public function cursosIndex()
    {
        return view('user.profissional.cursos');
    }

    public function habilidadesIndex()
    {
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $habilidades = Habilidade::all();
        $userhabilidades = UserHabilidade::where('id_aluno',$id)->paginate();
        return view('user.profissional.habilidades', compact('habilidades','userhabilidades'));
    }


    public function habilidadesStore(Request $request)
    {
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $userHabilidades = UserHabilidade::where('id_habilidade',$request->id)->where('id_aluno',$id)->get();
        $cUserHabilidades = count($userHabilidades);
        if($cUserHabilidades==0){
            $userHabilidad = new UserHabilidade;
            $userHabilidad->id_aluno = $id;
            $userHabilidad->id_habilidade = $request->id;
            $userHabilidad->save();
        }
            
        
        return redirect()->route('user.home.habilidades');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }
}
