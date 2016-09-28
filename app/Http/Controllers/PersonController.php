<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CategoryPerson;

use DB;

class PersonController extends Controller
{
	public function store(Request $req) {
		$person = new CategoryPerson();
		$person->nombre_encuestador = $req->nombre;
		$person->hombre = $req->hombre;
		$person->ninia = $req->ninia;
		$person->mujer = $req->mujer;
		$person->anciano = $req->anciano;
		$person->calle_relevamiento = $req->relevamiento;
		$person->calle_lateral_a = $req->lateral_a;
		$person->calle_lateral_b = $req->lateral_b;
		$person->temperatura = $req->temperatura;
		$person->condiciones = $req->condiciones;
		$person->hora_inicio = $req->inicio;
		$person->hora_fin = $req->fin;
		$person->fecha = $req->fecha;
		$person->nota = $req->nota; 
		$person->save();
		return "1";
	}

	public function restPerson($horainicio, $horafin, $calle, $callea, $calleb) {
		header("Access-Control-Allow-Origin: *");
	 	$headers = [
            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
        ];

        //Funciona
      //   $datosPeople = DB::table('category_people')
						// // ->where('hora_inicio', '>=', $horainicio)
						// // ->where('hora_inicio', '<=', $horafin)
    		// 			->whereBetween('hora_inicio', [$horainicio, $horafin])
						// ->where('calle_relevamiento', 'like', '%'.$calle.'%')		
						// ->where('calle_lateral_a', 'like', '%'.$callea.'%')
						// ->where('calle_lateral_b', 'like', '%'.$calleb.'%')	
						// ->select(DB::raw('sum(hombre) as hombre'), 
						// 	DB::raw('sum(ninia) as ninia'), 
						// 	DB::raw('sum(mujer) as mujer'), 
						// 	DB::raw('sum(anciano) as anciano'))
						// ->get();

		// $datosPeople = DB::table('category_people')
		// 				->where('hora_inicio', 'like', '%'.$horainicio.'%')
		// 				->orWhere('hora_inicio', 'like', '%'.$horafin.'%')
		// 				->orWhere('calle_relevamiento', 'like', '%'.$calle.'%')			
		// 				->select(DB::raw('sum(hombre) as hombre'), 
		// 					DB::raw('sum(ninia) as ninia'), 
		// 					DB::raw('sum(mujer) as mujer'), 
		// 					DB::raw('sum(anciano) as anciano'))
		// 				->get();

		// $datosPeopleDos = DB::table('category_people')
		// 				->where('hora_inicio', 'like', '%'.$horafin.'%')				
		// 				->select(DB::raw('sum(hombre) as hombre'), 
		// 					DB::raw('sum(ninia) as ninia'), 
		// 					DB::raw('sum(mujer) as mujer'), 
		// 					DB::raw('sum(anciano) as anciano'))
		// 				->get();


		//Funciona

		// $datosCars = DB::table('category_cars')
		// 				// ->where('hora_inicio', '>=', $horainicio)
		// 				// ->where('hora_inicio', '<=', $horafin)
		// 				->whereBetween('hora_inicio', [$horainicio, $horafin])
		// 				->where('calle_relevamiento', 'like', '%'.$calle.'%')		
		// 				->where('calle_lateral_a', 'like', '%'.$callea.'%')
		// 				->where('calle_lateral_b', 'like', '%'.$calleb.'%')
		// 				->select(DB::raw('sum(particular) as particular'),
		// 						DB::raw('sum(bicicleta) as bicicleta'),
		// 						DB::raw('sum(motocicleta) as motocicleta'),
		// 						DB::raw('sum(taxi) as taxi'),
		// 						DB::raw('sum(publico) as publico'),
		// 						DB::raw('sum(repartidor) as repartidor'))
		// 				->get();

		// $datosCars = DB::table('category_cars')
		// 				->where('hora_inicio', 'like', '%'.$horainicio.'%')
		// 				->orWhere('hora_inicio', 'like', '%'.$horafin.'%')
		// 				->orWhere('calle_relevamiento', 'like', '%'.$calle.'%')
		// 				->select(DB::raw('sum(particular) as particular'),
		// 						DB::raw('sum(bicicleta) as bicicleta'),
		// 						DB::raw('sum(motocicleta) as motocicleta'),
		// 						DB::raw('sum(taxi) as taxi'),
		// 						DB::raw('sum(publico) as publico'),
		// 						DB::raw('sum(repartidor) as repartidor'))
		// 				->get();

		// $datosCarsDos = DB::table('category_cars')
		// 				->where('hora_inicio', 'like', '%'.$horafin.'%')		
		// 				->select(DB::raw('sum(particular) as particular'),
		// 						DB::raw('sum(bicicleta) as bicicleta'),
		// 						DB::raw('sum(motocicleta) as motocicleta'),
		// 						DB::raw('sum(taxi) as taxi'),
		// 						DB::raw('sum(publico) as publico'),
		// 						DB::raw('sum(repartidor) as repartidor'))
		// 				->get();


		// $datosTotales = array("hombre" => $datosPeople[0]->hombre + $datosPeopleDos[0]->hombre, 
		// 					"mujer" => $datosPeople[0]->mujer + $datosPeopleDos[0]->mujer,
		// 					"ninia" => $datosPeople[0]->ninia + $datosPeopleDos[0]->ninia,
		// 					"anciano" => $datosPeople[0]->anciano + $datosPeopleDos[0]->anciano,
		// 					"particular" => $datosCars[0]->particular + $datosCarsDos[0]->particular,
		// 					"bicicleta" => $datosCars[0]->bicicleta + $datosCarsDos[0]->bicicleta,
		// 					"motocicleta" => $datosCars[0]->motocicleta + $datosCarsDos[0]->motocicleta,
		// 					"taxi" => $datosCars[0]->taxi + $datosCarsDos[0]->taxi,
		// 					"publico" => $datosCars[0]->publico + $datosCarsDos[0]->publico,
		// 					"repartidor" => $datosCars[0]->repartidor + $datosCarsDos[0]->repartidor);

       
		// $string = "select * from category_people where calle_relevamiento like '%$calle%' and calle_lateral_a like '%$callea%' and calle_lateral_b like '%$calleb%' and hora_inicio >= '$horainicio' and hora_inicio <= '$horafin'";

		$stringPeople = "select sum(hombre) as hombre, sum(ninia) as ninia, sum(mujer) as mujer, sum(anciano) as anciano from category_people where calle_relevamiento like '%$calle%' and calle_lateral_a like '%$callea%' and calle_lateral_b like '%$calleb%' and hora_inicio between '$horainicio' and '$horafin'";

		$stringCars = "select sum(particular) as particular, sum(taxi) as taxi, sum(bicicleta) as bicicleta, sum(motocicleta) as motocicleta, sum(repartidor) as repartidor, sum(publico) as publico from category_cars where calle_relevamiento like '%$calle%' and calle_lateral_a like '%$callea%' and calle_lateral_b like '%$calleb%' and hora_inicio between '$horainicio' and '$horafin'";

		$datosPeople = DB::select(DB::raw($stringPeople));
		$datosCars = DB::select(DB::raw($stringCars));

		$datosTotales = array("hombre" => $datosPeople[0]->hombre != null ? $datosPeople[0]->hombre : 0, 
			"mujer" => $datosPeople[0]->mujer != null ? $datosPeople[0]->mujer : 0,
			"ninia" => $datosPeople[0]->ninia != null ? $datosPeople[0]->ninia : 0,
			"anciano" => $datosPeople[0]->anciano != null ? $datosPeople[0]->anciano : 0,
			"particular" => $datosCars[0]->particular != null ? $datosCars[0]->particular : 0,
			"bicicleta" => $datosCars[0]->bicicleta != null ? $datosCars[0]->bicicleta : 0,
			"motocicleta" => $datosCars[0]->motocicleta != null ? $datosCars[0]->motocicleta : 0,
			"taxi" => $datosCars[0]->taxi != null ? $datosCars[0]->taxi : 0,
			"publico" => $datosCars[0]->publico != null ? $datosCars[0]->publico : 0,
			"repartidor" => $datosCars[0]->repartidor != null ? $datosCars[0]->repartidor : 0);


		return $datosTotales;
	}
}
