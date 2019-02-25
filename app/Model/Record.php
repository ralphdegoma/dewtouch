<?php
	class Record extends AppModel{
		public $hasMany = array('RecordItem');

		/*
			request data, GET params
		*/
		public function getRecords($request){

			/*get params*/
			$parameters = $request->query;

			/*record instance*/
			$records_ins = $this;

			/*datatables params*/
			$search_query = isset($parameters['search']['value']) ? $parameters['search']['value'] : null;
			$length = isset($parameters['length']) ? $parameters['length'] : 10;
			$start = isset($parameters['start']) ? $parameters['start'] : 10;
			$order = isset($parameters["order"][0]['column']) ? $parameters["order"][0]['column'] : null;
			$ordered = isset($parameters["order"][0]['dir']) ? $parameters["order"][0]['dir'] : "asc";
			
			$oder_by = "id";

			$query = array();

			/* check if search query not empty*/
			if(!empty($search_query)){
				$query["conditions"] = array('Record.name LIKE'=>'%'.$search_query.'%');
			}

			if($order != null){
				$oder_by = $order == 1 ? "name" : "id" ;
				$query["order"] = array("Record.".$oder_by." $ordered");
			}

			/*setting up pagenation*/
			$query["limit"] = $length;
			$query["offset"] = $start;

			$records = $records_ins->find('all', $query);

			return json_encode(array("data" => $records, "draw" => $query, "recordsFiltered" => $this->find('count')));
		}
	}