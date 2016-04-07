<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
		<?php  foreach($query2->result() as $row) { ?>	
			<br><br><br><br><br><br>ยินดีต้อนรับ คุณ <?php echo $row->fname." ".$row->lname;?>	
		<?php } ?>
  </section>