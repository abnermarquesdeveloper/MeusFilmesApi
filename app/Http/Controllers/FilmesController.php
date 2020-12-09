<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;

class FilmesController extends Controller
{
    private $array = ['error'=>'', 'result'=>[]];

    public function all(){
        $filmes = Filme::all();

        foreach($filmes as $filme){
            $this->array['result'][] = [
                'id'=> $filme->id,
                'name'=> $filme->name,
                'genre'=> $filme->genre,
                'description'=> $filme->description,
                'year'=> $filme->year
            ];
        }
        
        return $this->array;
    }
}
