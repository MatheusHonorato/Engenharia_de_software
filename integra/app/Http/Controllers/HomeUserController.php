<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Redirect;
use App\PerfilAluno;
use App\Habilidade;
use App\UserHabilidade;
use App\Curso;
use App\UserCurso;
use App\Atuacao;
use App\UserAtuacao;
use App\Conhecimento;
use App\UserConhecimento;
use App\Tipo;
use App\Area;
use App\Match;
use App\Emp;
use App\Oportunidade;

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
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $atuacoes = Atuacao::all();
        $useratuacoes = UserAtuacao::where('id_aluno',$id)->paginate(5);
        return view('user.profissional.atuacao',compact('atuacoes','useratuacoes'));
    }

    public function atuacaoStore(Request $request)
    {
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
       
            $userAtuacaod = new UserAtuacao;
            $userAtuacaod->id_aluno = $id;
            $userAtuacaod->id_atuacao = $request->id;
            $userAtuacaod->desc = '';
            $userAtuacaod->save();
    
            
        
        return redirect()->route('user.home.atuacao');
    }

    public function atuacaoUpdate(Request $request)
    {
        $userAtuacao = UserAtuacao::find($request->id);
        $userAtuacao->desc = $request->desc;
        $userAtuacao->save();

        return redirect()->route('user.home.atuacao');
    }

    public function atuacoesExcluir(Request $request)
    {
        
        $uatuacao = UserAtuacao::find($request->id);
        $uatuacao->delete();
        
        return redirect()->route('user.home.atuacao');
    }

    public function cursosIndex()
    {
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $cursos = Curso::all();
        $tipos = Tipo::all();
        $areas = Area::all();
        $usercursos = UserCurso::where('id_aluno',$id)->paginate(5);
        return view('user.profissional.cursos', compact('cursos','usercursos','tipos','areas'));
    }

    public function cursosStore(Request $request)
    {
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $userCursos = UserCurso::where('id_curso',$request->id)->where('id_aluno',$id)->get();
        $cUserCursos = count($userCursos);
        if($cUserCursos==0){
            $userCursod = new UserCurso;
            $userCursod->id_aluno = $id;
            $userCursod->id_curso = $request->id;
            $userCursod->save();

            $curso = Curso::find($request->id);
            $areac = $curso->id_area;
            $area = Area::find($areac);
            $area->amount++;
            $area->save();
        }

            
        return redirect()->route('user.home.cursos');
    }

     public function cursosExcluir(Request $request)
    {
        
        $ucurso = UserCurso::find($request->id);
        $ucurso->delete();
        
        return redirect()->route('user.home.cursos');
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

            $habilidade = Habilidade::find($request->id);
            $habilidade->amount++;
            $habilidade->save();
        }
            
        
        return redirect()->route('user.home.habilidades');
    }

    public function habilidadesExcluir(Request $request)
    {
        $uhabilidade = UserHabilidade::find($request->id);
        $uhabilidade->delete();
        
        return redirect()->route('user.home.habilidades');
    }


    //conhecimentos
     public function conhecimentosIndex()
    {
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $conhecimentos = Conhecimento::where('status',1)->paginate(5);
        $userconhecimentos = UserConhecimento::where('id_aluno',$id)->paginate(5);
        return view('user.profissional.conhecimento', compact('conhecimentos','userconhecimentos'));
    }


    public function conhecimentosStore(Request $request)
    {
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $userConhecimentos = UserConhecimento::where('id_conhecimento',$request->id)->where('id_aluno',$id)->get();
        $cUserConhecimentos = count($userConhecimentos);
        if($cUserConhecimentos==0){
            $userConhecimentod = new UserConhecimento;
            $userConhecimentod->id_aluno = $id;
            $userConhecimentod->id_conhecimento = $request->id;
            $userConhecimentod->save();
        }
            
        
        return redirect()->route('user.home.conhecimentos');
    }

    public function conhecimentosExcluir(Request $request)
    {
        
        $uconhecimento = UserConhecimento::find($request->id);
        $uconhecimento->delete();
        
        return redirect()->route('user.home.conhecimentos');
    }


     public function matchIndex()
    {
        $var = Auth::guard('web')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $matches = Match::where('id_aluno',$id)->paginate(3);
        $empresas = Emp::all();
        $oportunidades = Oportunidade::all();

        return view('user.matches.index', compact('matches','empresas','oportunidades'));
    }

}
