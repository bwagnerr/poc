<?php


class Highcharts{

	var $graphic = array();
	var $highchart;

	private function options($options = null){
		$options = array(
						'credits' => array('enabled' => 'false'),
		                'colors' => array('#00AC00','#EEEE00'),
						'chart' => array('renderTo' => 'graphics_container', 'type' => 'column'),
						'tooltip' => array('formatter' => 'function(){return "O valor do eixo y e "+this.y}'),
						'title' => array('text' => 'Grafico'),
						'xAxis' => array('title' => array('text' => 'Eixo X'), 'categories' => array(1,2,3,4,5)),
						'yAxis' => array('title' => array('text' => 'Eixo Y', 'labels' => array('formatter' => 'function(){return this.value}'))),
						'series' => array(array('name' => 'Serie 1', 'data' => array(10,20,30)))
		);
		return $options;
	}


	public function __construct($data, $options){

			$this->highchart = "<script type=\"text/javascript\">window.addEvent('domready', function() {var chart = new Highcharts.Chart(";
			if($options === null)
				$options = $this->options();
			else{
				$options['series'] = array('name' => 'Seriex', 'data' => $data);
				$options = array_merge($this->options(), $options);
			}
			$final_options = $options;
			
			$this->highchart .= json_encode($final_options);
			$this->highchart .= ");});</script>";
	}

	public function graphic(){
		return $this->highchart;
	}
}
?>