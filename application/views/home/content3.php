<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
    
    		<table border = '3' width = '80%' align = 'center'>
						<tr align = 'left'>
							<th>วาระที่</th>
							<th>เรื่อง</th>
						</tr>
				<?php foreach($query->result() as $row) { ?>	
				
						<tr align = 'left'>
							<td><a href="<?php echo site_url('template/inweb4/'.$row->agenda_id); ?>"><?php echo $row->no;?></a></td>
							<td><a href="<?php echo site_url('template/inweb4/'.$row->agenda_id); ?>"><?php echo $row->detail;?></a></td>
						</tr>
						
				<?php } ?>
			</table>
	
  </section>