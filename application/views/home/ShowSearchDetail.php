

<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
      <table border = '1' width = '80%' align = 'center'>
	<?php 
		$i=0;
		foreach($query->result() as $row) { 
			if($i==0){
				echo '<tr><td colspan="2">รายงานการประชุมครั้งที่&nbsp;'.$row->no."/".$row->year."&nbsp;".$row->date.'</td><td></td></tr>';
				$i++;
			}
	?>
				<tr align = 'left' >
					<td width="200px">&nbsp;&nbsp;&nbsp;<?php echo "วาระการประชุมที่&nbsp;".$row->noagenda; ?><br>	
					<td><?php echo $row->agendadetail;?></td>	
				</tr>
				<tr align = 'left'  >
					<td width="200px">&nbsp;&nbsp;&nbsp;<?php echo "วาระการประชุมที่&nbsp;".$row->nosubagen; ?><br>	
					<td><?php echo $row->subagendadetail;?></td>	
				</tr>
	<?php } ?>


	</table>
	
  </section>