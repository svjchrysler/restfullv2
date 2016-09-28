<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CategoryCar;

use App\CategoryPerson;
use Excel;

use DB;

class CarController extends Controller
{
	public function  store(Request $req) {
		$car = new CategoryCar();
		$car->nombre_encuestador = $req->nombre;
		$car->particular = $req->particular;
		$car->bicicleta = $req->bicicleta;
		$car->motocicleta = $req->motocicleta;
		$car->taxi = $req->taxi;
		$car->publico = $req->publico;
		$car->repartidor = $req->repartidor;
		$car->calle_relevamiento = $req->relevamiento;
		$car->calle_lateral_a = $req->lateral_a;
		$car->calle_lateral_b = $req->lateral_b;
		$car->temperatura = $req->temperatura;
		$car->condiciones = $req->condiciones;
		$car->hora_inicio = $req->inicio;
		$car->hora_fin = $req->fin;
		$car->fecha = $req->fecha;
		$car->nota = $req->nota;
		$car->save();
		return "1";
	}

	public function downloadExcel($nombre, $category) {
		if($category == 1) {
			$nombrecar = "Datos Vehiculos ". $nombre;
			
			Excel::create($nombrecar, function($excel) use($nombre){

		    return 	$excel->sheet('Excel sheet', function($sheet) use($nombre){
			    		$dataCar = CategoryCar::All();
			    		$sheet->fromArray($dataCar);
			        	$sheet->setOrientation('landscape');

			    	});

				})->export('xls');
			}
			else {
				$nombreperson = "Datos Personas ". $nombre;
				Excel::create($nombreperson, function($excel) use($nombre) {

			    return $excel->sheet('Excel sheet', function($sheet) use($nombre){
			    		$dataPeople = CategoryPerson::All();
			    		$sheet->fromArray($dataPeople);
			        	$sheet->setOrientation('landscape');

			    	});

				})->export('xls');
			}	 
		}

	public function buscar(Request $req) {
		$dataCar = CategoryCar::orwhere('nombre_encuestador', 'like', '%'.$req->nombre.'%')
								->orderBy('nombre_encuestador', 'asc')
								->get();

		$dataPeople = CategoryPerson::orwhere('nombre_encuestador', 'like', '%'.$req->nombre.'%')
								->orderBy('nombre_encuestador', 'asc')
								->get();

		$data = array();
		array_push($data, $dataCar);
		array_push($data, $dataPeople);

		return view('welcome')->with('data', $data);
	}

	public function datos() {
		/*$data = DB::table('category_cars')->orderBy('fecha')->get();
		//$data = CategoryCar::All()->orderBy('id');
		return view('welcome')->with('data', $data);*/

		return view('welcome');
	}

	

}
