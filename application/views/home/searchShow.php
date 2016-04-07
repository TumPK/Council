<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
      <table border = '1' width = '80%' align = 'center'>
		<?php foreach($query3->result() as $row) { ?>	
				<tr align = 'left'>
					<td><h5><a href="<?php echo site_url('template/inweb2/'.$row->year);?>">รายงานการประชุมปีที่ : <?php echo $row->year;?></a></td>
				</tr>
		<?php } ?>
	</table>
  </section>