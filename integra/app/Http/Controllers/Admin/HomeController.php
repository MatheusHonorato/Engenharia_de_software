<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Emp;
use App\PerfilAluno;
use App\PerfilEmpresa;
use Auth;
use App\Area;
use App\Tipo;
use App\Admin;
use App\Habilidade;
use App\Curso;
use App\Match;
use App\Atuacao;
use App\Conhecimento;
use Mail;

class HomeController extends Controller
{

    // - home
    public function index()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 
        return view('admin.home', compact('user','name'));
    }

    //PERFIL USUARIO

    // - index
    public function perfilIndex()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 
        return view('admin.perfil.perfil', compact('user','name'));
    }



    //ÁREAS

    // - index
    public function areasIndex()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $areas = Area::where('status',1)->paginate(5);
        return view('admin.cadastro.areas.index', compact('areas','name'));
    }

    public function areasExcluir(Request $request)
    {
        $id = $request->id;
        $cursos = Curso::where('id_area',$request->id)->where('status',1)->count();
        if($cursos == 0) {
            $area = Area::find($id);    
            $area->status=0;
            $area->save();
            return redirect()->route('admin.home.cadastro.areas.index')->with('success', 'Área removida com sucesso!');
        } 
        return redirect()->route('admin.home.cadastro.areas.index')->with('message', 'Esta área não pode ser excluida pois possui cursos associados');
    }


    public function areasStore(Request $request)
    {   
        if(strlen($request->name) != 0) {
            $area = new Area;
            $area->name = $request->name;
            $area->amount = 0;
            $area->status = 1;
            $area->save();

            return redirect()->route('admin.home.cadastro.areas.index')->with('success', 'Área cadastrada com sucesso!');
        }

       return redirect()->route('admin.home.cadastro.areas.index')->with('message', 'Insira um nome!');
    }

    public function areasUpdate(Request $request)
    {
        $this->validate($request, array(
            'name'         => 'required|max:30'
        ));
        
        $area = Area::find($request->id);
        $area->name = $request->name;
        $area->save();

        return redirect()->route('admin.home.cadastro.areas.index')->with('success', 'Área atualizada com sucesso!');
    }
    //

    //HABILIDADES

    // - index
    public function habilidadesIndex()
    {   
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $habilidades = Habilidade::where('status',1)->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.cadastro.habilidades.index', compact('habilidades','name'));
    }

    public function habilidadesExcluir(Request $request)
    {
        $id = $request->id;
        $habilidade = Habilidade::find($id);    
        $habilidade->status = 0;
        $habilidade->save();

        return redirect()->route('admin.home.cadastro.habilidades.index');
    }

    public function habilidadesStore(Request $request)
    {
        if($request->name != '') {
            $habilidade = new Habilidade;
            $habilidade->name = $request->name;
            $habilidade->amount = 0;
            $habilidade->status = 1;
            $habilidade->save();
            return redirect()->route('admin.home.cadastro.habilidades.index')->with('success', 'Habilidade cadastrada com sucesso!');
        }

        return redirect()->route('admin.home.cadastro.habilidades.index')->with('error', 'Por favor insira um nome!');
    }

    public function habilidadesUpdate(Request $request)
    {
        if($request->name != '') {
            $habilidade = Habilidade::find($request->id);
            $habilidade->name = $request->name;
            $habilidade->save();
            return redirect()->route('admin.home.cadastro.habilidades.index')->with('success', 'Habilidade atualizada com sucesso!');

        }

        return redirect()->route('admin.home.cadastro.habilidades.index');
    }

    //

    //NOTIFICAÇÕES

    // - index
    public function notificacoesIndexAluno()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $users = User::where('status','=','0')->get();

        return view('admin.notificacoes.notificacoes-aluno', compact('users','name'));
    }

    public function notificacoesIndexEmp()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $emps = Emp::where('status','=','0')->get();
        return view('admin.notificacoes.notificacoes-emp', compact('emps','name'));
    }

    //

    // - excluir
    public function notificacoesExcluirUser(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);    

        $data = array(
            'name' => $user->name,
            'email' => $user->email,
            'var' => 'infelismente não foi aceito, entre em contato com o responsavel'
        );

        Mail::send('mail.mail', $data, function($message) use ($data) {
            $message->from('e075e3e51c-6d0d5e@inbox.mailtrap.io');
            $message->to($data['email']);
            $message->subject('Integra - Notificação');
        });

        $user->delete();

        return redirect()->route('admin.home.notificacoes.aluno');
    }

    public function notificacoesExcluirEmp(Request $request)
    {
        $id = $request->id;
        $emp = Emp::find($id);    

        $data = array(
            'name' => $emp->name,
            'email' => $emp->email,
            'var' => 'infelismente não foi aceito, entre em contato com o responsavel'
        );

        Mail::send('mail.mail', $data, function($message) use ($data) {
            $message->from('e075e3e51c-6d0d5e@inbox.mailtrap.io');
            $message->to($data['email']);
            $message->subject('Integra - Notificação');
        });

        $emp->delete();

        return redirect()->route('admin.home.notificacoes.emp');
    }

    // aceitar
    public function notificacoesAceptUser(Request $request)
    {
        $id = $request->id;
        $user = User::find($id); 
        $user->status = 1;   
        $user->save();

        $perfilaluno = new PerfilAluno;
        $perfilaluno->id_aluno = $id;
        $perfilaluno->save();

        $data = array(
            'name' => $user->name,
            'email' => $user->email,
            'var' => 'acaba de ser aceito!'
        );

        Mail::send('mail.mail', $data, function($message) use ($data) {
            $message->from('e075e3e51c-6d0d5e@inbox.mailtrap.io');
            $message->to($data['email']);
            $message->subject('Integra - Notificação');
        });

        return redirect()->route('admin.home.notificacoes.aluno');
    }

     public function notificacoesAceptEmp(Request $request)
    {
        $id = $request->id;
        $emp = Emp::find($id); 
        $emp->status = 1;   
        $emp->save();

        $perfilempresa = new PerfilEmpresa;
        $perfilempresa->id_empresa = $id;
        $perfilempresa->save();

        $data = array(
            'name' => $emp->name,
            'email' => $emp->email,
            'var' => 'acaba de ser aceito!'
        );

        Mail::send('mail.mail', $data, function($message) use ($data) {
            $message->from('e075e3e51c-6d0d5e@inbox.mailtrap.io');
            $message->to($data['email']);
            $message->subject('Integra - Notificação');
        });

        return redirect()->route('admin.home.notificacoes.emp');
    }
    //

    // CATEGORIAS

    public function categoriasIndex()
    {   
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $tipos = Tipo::where('status',1)->paginate(5);

        return view('admin.cadastro.categorias.index', compact('name','tipos'));
    }

    public function categoriasStore(Request $request)
    {
        if($request->name != '') {
            $tipo = new Tipo;
            $tipo->name = $request->name;
            $tipo->status = 1;
            $tipo->save();
        }

        return redirect()->route('admin.home.cadastro.categorias.index');
    }

    public function categoriasUpdate(Request $request)
    {
        $tipo = Tipo::find($request->id);
        $tipo->name = $request->name;
        $tipo->save();

        return redirect()->route('admin.home.cadastro.categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function categoriasExcluir(Request $request)
    {   
        $cursos = Curso::where('id_tipo',$request->id)->count();
        if($cursos == 0) {
            $tipo = Tipo::find($request->id);    
            $tipo->status = 0;
            $tipo->save();
            return redirect()->route('admin.home.cadastro.categorias.index')->with('success', 'Categoria removida com sucesso!');
        } 

        return redirect()->route('admin.home.cadastro.categorias.index')->with('error', 'Esta categoria não pode ser excluida pois possui cursos associados');
    }

    //

    // CURSOS

    // - index
    public function cursosIndex()

    {   $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $cursos = Curso::paginate(5);
        $areas = Area::where('status',1)->get();
        $tipos = Tipo::where('status',1)->get();
        return view('admin.cadastro.cursos.index', compact('cursos','name','areas','tipos'));
    }

    public function cursosCreate()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $tipos = Tipo::where('status',1)->get();
        $areas = Area::where('status',1)->get();

        return view('admin.cadastro.cursos.new', compact('name','areas','tipos'));
    }

    public function cursosStore(Request $request)
    {
        if($request->name != '') {
            $curso = new Curso;
            $curso->name = $request->name;
            $curso->id_area = $request->area;
            $curso->id_tipo = $request->tipo;
            $curso->status = 1;
            $curso->save();
            return redirect()->route('admin.home.cadastro.cursos.index')->with('success', 'Curso cadastrado com sucesso!');
        }
        return redirect()->route('admin.home.cadastro.cursos.index')->with('message', 'Insira um nome'); 
    }

    public function cursosUpdate(Request $request)
    {
        if($request->name != '') {
            $curso = Curso::find($request->id);
            $curso->name = $request->name;
            $curso->id_area = $request->area;
            $curso->id_tipo = $request->tipo;
            $curso->save();
            return redirect()->route('admin.home.cadastro.cursos.index')->with('success', 'Curso atualizado com sucesso!');
        }
        return redirect()->route('admin.home.cadastro.cursos.index')->with('message', 'Insira um nome');
    }

    public function cursosExcluir(Request $request)
    {
        $id = $request->id;
        $curso = Curso::find($id);    
        $curso->status = 0;
        $curso->save();

        return redirect()->route('admin.home.cadastro.cursos.index');
    }

    //

    //conhecimentos

    public function conhecimentosIndex()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $conhecimentos = Conhecimento::where('status',1)->paginate(5);
        return view('admin.cadastro.conhecimento.index', compact('conhecimentos','name'));
    }

    public function conhecimentosStore(Request $request)
    {
        if($request->name != '') {
            $conhecimento = new Conhecimento;
            $conhecimento->name = $request->name;
            $conhecimento->status = 1;
            $conhecimento->amount = 0;
            $conhecimento->save();

            return redirect()->back()->with('success', 'Conhecimento cadastrado com sucesso!');
        }
        
        return redirect()->back()->with('error', 'Por favor preencha o campo de nome');
    }


    public function conhecimentosExcluir(Request $request)
    {   
        $conhecimento = Conhecimento::find($request->id);
        $conhecimento->status = 0;
        $conhecimento->save();

        return redirect()->back();
    }

    public function conhecimentosUpdate(Request $request)
    {
        if($request->name != '') {
            $conhecimento = Conhecimento::find($request->id);
            $conhecimento->name = $request->name;
            $conhecimento->save();
            return redirect()->back()->with('success', 'Conhecimento atualizado com sucesso!');
        }
        return redirect()->back()->with('error', 'Por favor preencha o campo de nome');
    }

    //atuacoes

    public function atuacoesIndex()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $atuacoes = Atuacao::where('status',1)->paginate(5);
        return view('admin.cadastro.atuacao.index', compact('atuacoes','name'));
    }

    public function atuacoesStore(Request $request)
    {
        if($request->name != '') {
            $atuacao = new Atuacao;
            $atuacao->name = $request->name;
            $atuacao->descricao = $request->desc;
            $atuacao->status = 1;
            $atuacao->save();

            return redirect()->back()->with('success', 'Atuação criada com sucesso!');
        }

        return redirect()->route('admin.home.cadastro.atuacoes.index')->with('error', 'Por favor preencha o campo de nome');
    }

    public function atuacoesExcluir(Request $request)
    {   
        $atuacao = Atuacao::find($request->id);
        $atuacao->status = 0;
        $atuacao->save();

        return redirect()->route('admin.home.cadastro.atuacoes.index');
    }

     public function atuacoesUpdate(Request $request)
    {   
        if($request->name != '') {
            $atuacao = Atuacao::find($request->id);
            $atuacao->name = $request->name;
            $atuacao->descricao = $request->descricao;
            $atuacao->save();
            return redirect()->route('admin.home.cadastro.atuacoes.index')->with('success', 'Atuação atualizada com sucesso!');
        }

        return redirect()->route('admin.home.cadastro.atuacoes.index')->with('error', 'Por favor preencha o campo de nome');
    }

    //

    //estatísticas

    public function estatisticasIndex()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 
        $userAmount = User::count();
        $empAmount = Emp::count();
        $matchAmount = Match::count();

        $habilidades = Habilidade::all();
        $countHabilidades = count($habilidades);

        $areas = Area::all();
        $countAreas = count($areas);

        return view('admin.estatisticas.index', compact('name','userAmount','empAmount','matchAmount','habilidades','countHabilidades','areas','countAreas'));
    }

    public function matchIndex()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();
        $id = $var['id'];
        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 
        $matches = Match::paginate(3);
        $alunos = User::all();

        return view('admin.matchs.index', compact('name','matches','alunos'));
    }

}
