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
		$person->hora_inicio = $req->inicio;
		$person->fecha = $req->fecha;
		$person->save();
		return "1";
	}

	public function restPerson($horainicio, $horafin, $calle, $callea, $calleb) {
		header("Access-Control-Allow-Origin: *");
	 	$headers = [
            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
        ];

		$stringPeople = "select sum(hombre) as hombre, sum(ninia) as ninia, sum(mujer) as mujer, sum(anciano) as anciano, sum(ninio) as ninio from category_people where calle_relevamiento like '%$calle%' and calle_lateral_a like '%$callea%' and calle_lateral_b like '%$calleb%' and hora_inicio between '$horainicio' and '$horafin'";

		$stringCars = "select sum(particular) as particular, sum(taxi) as taxi, sum(bicicleta) as bicicleta, sum(motocicleta) as motocicleta, sum(repartidor) as repartidor, sum(publico) as publico from category_cars where calle_relevamiento like '%$calle%' and calle_lateral_a like '%$callea%' and calle_lateral_b like '%$calleb%' and hora_inicio between '$horainicio' and '$horafin'";

		$datosPeople = DB::select(DB::raw($stringPeople));
		$datosCars = DB::select(DB::raw($stringCars));

		$datosTotales = array("hombre" => $datosPeople[0]->hombre != null ? $datosPeople[0]->hombre : 0, 
			"mujer" => $datosPeople[0]->mujer != null ? $datosPeople[0]->mujer : 0,
			"ninia" => $datosPeople[0]->ninia != null ? $datosPeople[0]->ninia : 0,
			"anciano" => $datosPeople[0]->anciano != null ? $datosPeople[0]->anciano : 0,
			"ninio" => $datosPeople[0]->ninio != null ? $datosPeople[0]->ninio : 0,
			"particular" => $datosCars[0]->particular != null ? $datosCars[0]->particular : 0,
			"bicicleta" => $datosCars[0]->bicicleta != null ? $datosCars[0]->bicicleta : 0,
			"motocicleta" => $datosCars[0]->motocicleta != null ? $datosCars[0]->motocicleta : 0,
			"taxi" => $datosCars[0]->taxi != null ? $datosCars[0]->taxi : 0,
			"publico" => $datosCars[0]->publico != null ? $datosCars[0]->publico : 0,
			"repartidor" => $datosCars[0]->repartidor != null ? $datosCars[0]->repartidor : 0);


		return $datosTotales;
	}
}
