<?php
	class page {
		protected $title;
		protected $description;
		protected $template;
		protected $templateorder;
		
		public function __construct($i) {
			$title = $i['title'];
			$description = $i['description'];
			$template = $i['template'];
			$templateorder = explode(",",file_get_contents("./templates/".$template));
			while($n = next($templateorder)) {
				if($n == "content") break;
				else include_once("../components/".$n.".php");
			}
		}
		
		function endpage() {
		
		}
	}
?>