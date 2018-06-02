<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Emp;
use App\PerfilAluno;
use Auth;
use App\Area;
use App\Tipo;
use App\Admin;
use App\Habilidade;
use App\Curso;

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
        return view('admin.perfil.perfil', compact('user'));
    }



    //ÁREAS

    // - index
    public function areasIndex()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $areas = Area::paginate(5);
        return view('admin.cadastro.areas.index', compact('areas','name'));
    }

    public function areasExcluir(Request $request)
    {
        $id = $request->id;
        $cursos = Curso::where('id_area',$request->id)->count();
        if($cursos == 0) {
            $area = Area::find($id);    
            $area->delete();
            return redirect()->route('admin.home.cadastro.areas.index');
        } 
        return redirect()->route('admin.home.cadastro.areas.index')->with('error', 'Esta área não pode ser excluida pois possui cursos associados');
    }

    public function areasStore(Request $request)
    {
        $this->validate($request, array(
            'name'         => 'required|max:30'
        ));

        $area = new Area;
        $area->name = $request->name;
        $area->save();

        return redirect()->route('admin.home.cadastro.areas.index')->with('error', 'Por favor insira um nome');
    }

    public function areasUpdate(Request $request)
    {
        $this->validate($request, array(
            'name'         => 'required|max:30'
        ));
        
        $area = Area::find($request->id);
        $area->name = $request->name;
        $area->save();

        return redirect()->route('admin.home.cadastro.areas.index')->with('error', 'Por favor insira um nome');
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

        $habilidades = Habilidade::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.cadastro.habilidades.index', compact('habilidades','name'));
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
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 
       
        return view('admin.cadastro.habilidades.new', compact('name'));
    }

    public function habilidadesStore(Request $request)
    {
        $habilidade = new Habilidade;
        $habilidade->name = $request->habilidade;
        $habilidade->save();

        return redirect()->route('admin.home.cadastro.habilidades.index');
    }

    public function habilidadesUpdate(Request $request)
    {
        $habilidade = Habilidade::find($request->id);
        $habilidade->name = $request->name;
        $habilidade->save();

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

    // CATEGORIAS

    public function categoriasIndex()
    {   
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $tipos = Tipo::paginate(5);

        return view('admin.cadastro.categorias.index', compact('name','tipos'));
    }

    public function categoriasCreate()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        return view('admin.cadastro.categorias.new', compact('name'));
    }

    public function categoriasStore(Request $request)
    {
        $tipo = new Tipo;
        $tipo->name = $request->categoria;
        $tipo->save();

        return redirect()->route('admin.home.cadastro.categorias.index');
    }

    public function categoriasUpdate(Request $request)
    {
        $tipo = Tipo::find($request->id);
        $tipo->name = $request->name;
        $tipo->save();

        return redirect()->route('admin.home.cadastro.categorias.index');
    }

    public function categoriasExcluir(Request $request)
    {
        $id = $request->id;
        $tipo = Tipo::find($id);    
        $tipo->delete();

        return redirect()->route('admin.home.cadastro.categorias.index');
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
        $areas = Area::all();
        $tipos = Tipo::all();
        return view('admin.cadastro.cursos.index', compact('cursos','name','areas','tipos'));
    }

    public function cursosCreate()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $tipos = Tipo::all();
        $areas = Area::all();

        return view('admin.cadastro.cursos.new', compact('name','areas','tipos'));
    }

    public function cursosStore(Request $request)
    {
        $curso = new Curso;
        $curso->name = $request->name;
        $curso->id_area = $request->area;
        $curso->id_tipo = $request->tipo;
        $curso->save();

        return redirect()->route('admin.home.cadastro.cursos.index');
    }

    public function cursosExcluir(Request $request)
    {
        $id = $request->id;
        $curso = Curso::find($id);    
        $curso->delete();

        return redirect()->route('admin.home.cadastro.cursos.index');
    }

    //

    public function categoriasIndexCursos()
    {
        $var = Auth::guard('web_admin')->user()->makeVisible('attribute')->toArray();

        $id = $var['id'];

        $user = Admin::find($id); 
        $name = substr($user->name, 0, 5); 

        $emps = Emp::where('status','=','0')->get();
        return view('admin.notificacoes-emp', compact('emps','name'));
    }

}
