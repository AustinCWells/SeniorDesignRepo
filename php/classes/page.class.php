<?php
	class page {
		protected $title;
		protected $description;
		protected $author;
		protected $template;
		protected $templateorder;
		
		public function __construct($i) {
			$this->title = $i['title'];
			$this->description = $i['description'];
			$this->template = $i['template'];
			$this->templateorder = explode(",",file_get_contents("./templates/".$this->template));
			$this->author = "";
			foreach($this->templateorder as $n) {
				if($n == "content") break;
				else include_once("./components/".$n.".php");
			}
		}
		
		function endpage() {
			$initialkey = array_search("content",$this->templateorder) + 1;
			$arraylength = count($this->templateorder);
			for($i = $initialkey; $i<$arraylength; $i++) {
				include_once("./components/".$this->templateorder[$i].".php");
			}
			
		}
	}
?>