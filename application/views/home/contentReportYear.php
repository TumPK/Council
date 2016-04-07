<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
      <table border = '1' width = '80%' align = 'center'>
		<?php foreach($query->result() as $row) { ?>	
				<tr align = 'left'>
					<td><h5>&nbsp;&nbsp;&nbsp;<a href="">รายงานการประชุมครั้งที่ : <?php echo $row->no."/".$row->year;?></a></td></br>
				</tr>
		<?php } ?>
	</table>
  </section>