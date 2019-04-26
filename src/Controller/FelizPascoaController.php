<?php

namespace Drupal\feliz_pascoa\Controller;

class FelizPascoaController {
	public function felizpascoa(){
		return array(
			'#title' => 'Feliz Páscoa!',
			'#markup' => 'Feliz páscoa!!!!!'

		);
	}

	public function contagem(){

			$diaAtual = date ("Y/m/d");

			$diaPascoa = date ("2020/04/12");

			//converte os dias para timestamp
			$d1 = strtotime($diaAtual);
			$d2 = strtotime($diaPascoa);

			//diferença em segudos das duas datas divididas pelo número de segundos que o dia possui
			//resulta o número de dias entre as duas datas.
			$diasTotais = ($d2-$d1)/86400;

			if($diasTotais !== 0){
				$resultado = "Faltam $diasTotais dias para a Páscoa!";
			}
			else{
				$resultado = "Feliz Páscoa";
			}

		return[
			'#title' => 'Contador',
			'#markup' => $resultado
		];

}
}