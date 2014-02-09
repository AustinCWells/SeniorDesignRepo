<?php
class paginator {
	protected $currentPage;
	protected $total;
	protected $totalpages;
	protected $limit = 15;
	
	function __construct() {
		if(isset($_GET['page'])) $this->currentPage = $_GET['page'];
		else $this->currentPage = 1;
		$this->total = project::getNumProjects();
		$this->totalpages = ceil($this->total/$this->limit);
		$this->draw();
	}
	
	function draw() {
		?>
			<ul class="paginator pagination">
				<li
				    <?php 
					   //Check to see if the left arrow should be active
					   if($this->currentPage == 1) echo ' class="disabled"'; 
				    ?>
				    ><a href="
					  <?php 
						  //If not first page, activate left arrow
						  if($this->currentPage != 1) echo '?page='.($this->currentPage-1).currentURIVars(); 
						  else echo '#';
					  ?>
					  ">&laquo;</a></li>
				<?php
				    //Populate paginator with all the pages
					for($i = 1;$i<=$this->totalpages;$i++) {
						?>
							<li
							    <?php if($this->currentPage == $i) echo ' class="active"'; ?>
							    ><a href="projects.php?page=<?php echo $i.currentURIVars(); ?>">
								<?= $i; ?>
							</a></li>
						<?php
					}
				?>
			<li
			    <?php 
				    //Check to see if right arrow should be active
				    if($this->currentPage == $this->totalpages) echo ' class="disabled"'; 
			    ?>
			    ><a href="
				     <?php 
					   //If not first page, activate left arrow
					   if($this->currentPage != $this->totalpages) echo '?page='.($this->currentPage+1).currentURIVars(); 
					   else echo '#';
				    ?>
			    ">&raquo;</a></li>
			</ul>
		<?php
	}
}
?>