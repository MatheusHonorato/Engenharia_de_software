<?php

namespace App\Http\Controllers\Emp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use App\Emp;
use App\Curso;
use App\Habilidade;
use App\Atuacao;
use App\Conhecimento;
use App\PerfilEmpresa;
use App\Oportunidade;
use App\OportunidadeCursos;
use App\OportunidadeHabilidades;
use App\OportunidadeAtuacao;
use App\OportunidadeConhecimento;
use App\UserCurso;
use App\UserHabilidade;
use App\UserAtuacao;
use App\UserConhecimento;
use App\Match;
use App\User;
use Mail;

class HomeController extends Controller
{
    
    // - home
    public function index()
    {
        $var = Auth::guard('web_emp')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $emp = Emp::find($id); 
        $name = substr($emp->name, 0, 5); 
        return view('emp.home', compact('emp','name'));
    }

    //PERFIL USUARIO

    // - index
    public function perfilIndex()
    {
        $var = Auth::guard('web_emp')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Emp::find($id); 
        $perfilemp = PerfilEmpresa::where('id_empresa',$id)->first();

        return view('emp.perfil.index', compact('emp','perfilemp'));
    }

    public function perfilIndexUpdate(Request $request)
    {
        $var = Auth::guard('web_emp')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $perfilemp = PerfilEmpresa::where('id_empresa',$id)->first();
        $perfilemp->cnpj = $request->cnpj;
        $perfilemp->telefone = $request->telefone;
        $perfilemp->estado = $request->estado;
        $perfilemp->cidade = $request->cidade;
        $perfilemp->bairro = $request->bairro;
        $perfilemp->logadouro = $request->logadouro;
        $perfilemp->numero = $request->numero;
        $perfilemp->complemento = $request->complemento;

        $perfilemp->facebook = $request->facebook;
        $perfilemp->linkedin = $request->linkedin;
        $perfilemp->instagram = $request->instagram;
        $perfilemp->twitter = $request->twitter;
        $perfilemp->save();

        return redirect()->route('emp.home.perfil.index');
    }

    public function oportunidadesIndex()
    {   
        $var = Auth::guard('web_emp')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $oportunidades = Oportunidade::where('id_empresa', $id)->paginate(3);
        $cursos = Curso::all();
        $habilidades = Habilidade::all();
        $atuacoes = Atuacao::all();
        $conhecimentos = Conhecimento::all();
        return view('emp.oportunidades.index', compact('oportunidades','cursos','habilidades','atuacoes','conhecimentos'));
    }

    public function oportunidadesStore(Request $request)
    {   
        
        $var = Auth::guard('web_emp')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        
        $oportunidade = new Oportunidade;
        $oportunidade->id_empresa = $id;
        $oportunidade->title = $request->title;
        $oportunidade->periodo =0;
        $oportunidade->desc=$request->desc;
        $oportunidade->save();

        $cursos = Curso::all();

        foreach ($cursos as $curso) {
            $id = $curso->id;
            if($request->{$curso->id} == 1){
                $ocurso = new OportunidadeCursos;
                $ocurso->id_oportunidade = $oportunidade->id;
                $ocurso->id_curso = $id;
                $ocurso->save();
            }
        }

        $habilidades = Habilidade::all();

        foreach ($habilidades as $habilidade) {
            $id = $habilidade->id;
            if($request->{$habilidade->id} == 1){
                $ohabilidade = new OportunidadeHabilidades;
                $ohabilidade->id_oportunidade = $oportunidade->id;
                $ohabilidade->id_habilidade = $id;
                $ohabilidade->save();
            }
        }

        $atuacoes = Atuacao::all();

        foreach ($atuacoes as $atuacao) {
            $id = $atuacao->id;
            if($request->{$atuacao->id} == 1){
                $oatuacao = new OportunidadeAtuacao;
                $oatuacao->id_oportunidade = $oportunidade->id;
                $oatuacao->id_atuacao = $id;
                $oatuacao->save();
            }
        }

        $conhecimentos = Conhecimento::all();

        foreach ($conhecimentos as $conhecimento) {
            $id = $conhecimento->id;
            if($request->{$conhecimento->id} == 1){
                $oconhecimento = new OportunidadeConhecimento;
                $oconhecimento->id_oportunidade = $oportunidade->id;
                $oconhecimento->id_conhecimento = $id;
                $oconhecimento->save();
            }
        }

        $ranking = array();

        $users_curso = UserCurso::all();
        $ocursos = OportunidadeCursos::all();

        foreach ($users_curso as $user_curso) {
            $i = 0;
           foreach ($ocursos as $ocurso) {
                if($user_curso->id_curso == $ocurso->id_curso){
                    $ranking[$user_curso->id_aluno] = ++$i;
                    break;
                } else {
                    $ranking[$user_curso->id_aluno] =  0;
                }
            }

        }

        $users_habilidade = UserHabilidade::all();
        $ohabilidades = OportunidadeHabilidades::all();

        foreach ($users_habilidade as $user_habilidade) {
           foreach ($ohabilidades as $ohabilidade) {
                if($user_habilidade->id_habilidade == $ohabilidade->id_habilidade){
                    $ranking[$user_habilidade->id_aluno]++;
                    break;
                } 
            }

        }

       
        $users_atuacao = UserAtuacao::all();
        $oatuacoes = OportunidadeAtuacao::all();

        foreach ($users_atuacao as $user_atuacao) {
           foreach ($oatuacoes as $oatuacao) {
                if($user_atuacao->id_atuacao == $oatuacao->id_atuacao){
                    $ranking[$user_atuacao->id_aluno]++;
                    break;
                } 
            }

        }

        $users_conhecimento = UserConhecimento::all();
        $oconhecimentos = OportunidadeConhecimento::all();

        foreach ($users_conhecimento as $user_conhecimento) {
           foreach ($oconhecimentos as $oconhecimento) {
                if($user_conhecimento->id_conhecimento == $oconhecimento->id_conhecimento){
                    $ranking[$user_conhecimento->id_aluno]++;
                    break;
                } 
            }

        }


        arsort($ranking);
        $alunose = User::all();



        //chave = idaluno
        foreach ($ranking as $chave => $valor) {
            $match = new Match;
            $match->id_aluno = $chave;
            $match->id_oportunidade = $oportunidade->id;
            $match->save();

            foreach($alunose as $alunoe) {
                if($alunoe->id == $chave){
                    $data = array(
                        'name' => $alunoe->name,
                        'email' => $alunoe->email
                    );

                    Mail::send('mail.match', $data, function($message) use ($data) {
                        $message->from('e075e3e51c-6d0d5e@inbox.mailtrap.io');
                        $message->to($data['email']);
                        $message->subject('Integra - Notificação');
                    });
                }
            }
            

        }

        return redirect()->back();
        
    }

    public function matchIndex(Request $request)
    {
        $matches = Match::where('id_oportunidade',$request->id)->paginate(3);
        $alunos = User::all();

        return view('emp.matches.index', compact('matches','alunos'));
    }

}
