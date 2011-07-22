<?php defined('SYSPATH') or die('No direct script access.');

include Kohana::find_file('libraries','Highcharts');

class Controller_Graphics extends Controller {

	public function action_index()
	{
		$alunos = ORM::factory('aluno');
		$alunos = $alunos->find_all();
		$bucket= array();
		foreach($alunos as $aluno){
			if($aluno->NU_ANO>1994 AND $aluno->NU_ANO<2005){
			if(array_key_exists($aluno->NU_ANO, $bucket))
				$bucket[$aluno->NU_ANO]++;
			else
				$bucket[$aluno->NU_ANO] = 1;
			}
		}
		ksort($bucket);

		$highchart = new Highcharts(array_values($bucket), array('xAxis' => array('categories' => array_keys($bucket))));
		$graphic = $highchart->graphic();


//		$graphic = "
//		<script type=\"text/javascript\">
//
//	window.addEvent('domready', function() {
//
//        var chart = new Highcharts.Chart({
//
//	        \"credits\": {
//				\"enabled\": \"false\"
//	        },
//            \"chart\": {
//                \"renderTo\": \"graphic_container\",
//                \"type\": \"column\"
//            },
//	        \"colors\": [
//			    \"#00AC00\",
//				\"#EEEE00\"
//	        ],
//	        \"tooltip\": {
//                \"formatter\": function() {
//                    return 'Alunos nascidos neste ano: '+ this.y
//                }
//            },
//            \"title\": {
//                \"text\": \"Alunos por ano de nascimento\"
//            },
//            \"xAxis\": {
//                \"categories\": ".json_encode(array_keys($bucket))."
//            },
//            \"yAxis\": {
//                \"title\": {
//                \"text\": \"Alunos\"
//                },
//	            \"labels\": {
//                    \"formatter\": function() {
//                        return this.value;
//                    }
//	            }
//            },
//            \"series\": [{
//	            \"name\": \"Alunos\",
//				\"data\": ".json_encode(array_values($bucket))."
//			}]
//       });
//
//	});
//
//</script>
//		";

		$view = View::factory('graphics/index')->set('helloworld', 'Alumni Graphics')->set('graphic', $graphic);
		return $this->response->body($view);
	}
	
}

