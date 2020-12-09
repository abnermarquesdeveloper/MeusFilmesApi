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

    public function findOne($id){
        $filme = Filme::find($id);

        if($filme){
            $this->array['result'] = $filme;
        }else{
            $this->array['error'] = "ID de filme não encontrado!!!";
        }
        return $this->array;
    }

    public function new(Request $request){
        $name = $request->input('name');
        $genre = $request->input('genre');
        $description = $request->input('description');
        $year = $request->input('year');

        if($name && $genre && $description && $year){
            $filme = new Filme();
            $filme->name = $name;
            $filme->genre = $genre;
            $filme->description = $description;
            $filme->year = $year;
            $filme->save();

            $this->array['result'] = [
                'id'=> $filme->id,
                'name'=> $filme->name,
                'genre'=> $filme->genre,
                'description'=> $filme->description,
                'year'=> $filme->year
            ];
        }else{
            $this->array['error'] = "Campos devem der preenchidos!";
        }
        

        return $this->array;
    }
}
