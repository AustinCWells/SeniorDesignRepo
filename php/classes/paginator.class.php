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
				<?php
					for($i = 1;$i<=$this->totalpages;$i++) {
						?>
							<li><a href="projects.php?page=<?= $i; ?>">
								<?= $i; ?>
							</a></li>
						<?php
					}
				?>
			</ul>
		<?php
	}
}
?>