<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Emp;
use App\PerfilAluno;
use Auth;
use App\Area;
use App\Categoria;
use App\Admin;
use App\Habilidade;
use App\Curso;

class HomeController extends Controller
{

    //PERFIL USUARIO

    // - index
    public function perfilIndex()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id);  
        return view('admin.perfil.perfil', compact('user'));
    }


    //ÁREAS

    // - index
    public function areasIndex()
    {
        $areas = Area::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.cadastro.areas.areas-index', compact('areas'));
    }

    public function areasExcluir(Request $request)
    {
        $id = $request->id;
        $area = Area::find($id);    
        $area->delete();

        return redirect()->route('admin.home.cadastro.areas.index');
    }

     public function areasCreate()
    {
       
        return view('admin.cadastro.areas.areas-new');
    }

    public function areasStore(Request $request)
    {
        $area = new Area;
        $area->name = $request->area;
        $area->save();

        return redirect()->route('admin.home.cadastro.areas.index');
    }
    //

    //HABILIDADES

    // - index
    public function habilidadesIndex()
    {
        $habilidades = Habilidade::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.cadastro.habilidades.index', compact('habilidades'));
    }

    public function habilidadesExcluir(Request $request)
    {
        $id = $request->id;
        $habilidade = Habilidade::find($id);    
        $habilidade->delete();

        return redirect()->route('admin.home.cadastro.habilidades.index');
    }

     public function habilidadesCreate()
    {
       
        return view('admin.cadastro.habilidades.new');
    }

    public function habilidadesStore(Request $request)
    {
        $habilidade = new Habilidade;
        $habilidade->name = $request->habilidade;
        $habilidade->save();

        return redirect()->route('admin.home.cadastro.habilidades.index');
    }

    //

    //NOTIFICAÇÕES

    // - index
    public function notificacoesIndexAluno()
    {
        $users = User::where('status','=','0')->get();
        return view('admin.notificacoes.notificacoes-aluno', compact('users'));
    }

    public function notificacoesIndexEmp()
    {
        $emps = Emp::where('status','=','0')->get();
        return view('admin.notificacoes.notificacoes-emp', compact('emps'));
    }

    //

    // - excluir
    public function notificacoesExcluirUser(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);    
        $user->delete();

        return redirect()->route('admin.home.notificacoes.aluno');
    }

    public function notificacoesExcluirEmp(Request $request)
    {
        $id = $request->id;
        $emp = Emp::find($id);    
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

        return redirect()->route('admin.home.notificacoes.aluno');
    }

     public function notificacoesAceptEmp(Request $request)
    {
        $id = $request->id;
        $emp = Emp::find($id); 
        $emp->status = 1;   
        $emp->save();

        return redirect()->route('admin.home.notificacoes.emp');
    }
    //

    // CURSOS

    // - index
    public function cursosIndex()
    {
        $cursos = Curso::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.cadastro.cursos.index', compact('cursos'));
    }


    public function categoriasIndexCursos()
    {
        $emps = Emp::where('status','=','0')->get();
        return view('admin.notificacoes-emp', compact('emps'));
    }

}
