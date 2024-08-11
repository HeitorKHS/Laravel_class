<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Produto;
use DB;

class DashboardController extends Controller
{

    //public function __construct() {
    //    $this->middleware('auth'); toda classe
    //    $this->middleware('auth')->only('index', 'home'); apenas no metodo;
    //    $this->middleware('auth')->excepit(['index', 'contato']) aplica na classe toda, esceto
    //}

    public function index()
    {

        $usuarios = User::all()->count();

        // grafico 1 - usuários
        $usersData = User::Select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total ')
        ])->groupBy('ano')->orderBy('ano', 'asc')->get();

        //preparar arrays
        foreach($usersData as $user)
        {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        //formatar para chartjs 
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);



        //grafico 2 - categorias
        //$catData = Categoria::all();
        $catData = Categoria::with('produtos')->get();

        //preparar array
        foreach($catData as $cat)
        {
            $catNome[] = "'".$cat->nome."'";
           // $catTotal[] = Produto::where('id_categoria', $cat->id)->count();
           $catTotal[] = $cat->produtos->count();
        }

        //formatar para chartjs converter array para string
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        return view('/admin/dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));

    }

}
