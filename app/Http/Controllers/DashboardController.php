<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Produto;

class DashboardController extends Controller
{

    public function index(){
        $usuarios = User::all()->count();

        // Gráfico 01 - usuários
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])
        -> groupBy('ano')
        -> orderBy('ano','asc')
        -> get();

        // preparar arrays
        foreach($usersData as $user){
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        // formatar para chartJS
        $userLabel = "'Comparativo de cadastro de usuários'";
        $userAno = implode(',',$ano);
        $userTotal = implode(',',$total);

        //Gráfico 02 - Categorias
        $catData = Categoria::with('produtos')->get();

        // Preparar o array
        foreach($catData as $cat){
            $catNome[]= "'".$cat->nome."'";
            $catTotal[]= $cat->produtos->count();
        }

        // Formatar para ChartJS
        $catLabel = implode(',',$catNome);
        $catTotal = implode(',',$catTotal);

        // return view('admin.dashboard',dd(compact('usuarios','userLabel','userAno','userTotal','catLabel','catTotal')));
        return view('admin.dashboard',compact('usuarios','userLabel','userAno','userTotal','catLabel','catTotal'));
    }
}
