<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
      <table border = '1' width = '80%' align = 'center'>
		<?php foreach($query->result() as $row) { ?>	
				<tr align = 'left'>
					<td><h5>รายงานการประชุมครั้งที่<?php echo $row->no;?>/<?php echo $row->year." " ;?><a href="<?php echo site_url('template/ShowDetail/'.$row->report_id);?>" target="_blank"><button width="20%">รายละเอียด</button></a></td>
				</tr>
		<?php } ?>
	</table>
  </section>