<?php
	class RecordController extends AppController{
		
		public function index(){
			ini_set('memory_limit','256M');
			set_time_limit(0);
			
			$this->setFlash('Listing Record page too slow, try to optimize it.');
			
			$records = $this->Record->find('all');
			
			$this->set('records',$records);
			
			$this->set('title',__('List Record'));
		}


		public function data(){
			$records = $this->Record->getRecords($this->request);
			echo $records;
			exit();		
		}

	}