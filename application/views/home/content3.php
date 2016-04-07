
<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
    
    		<table border = '3' width = '80%' align = 'center'>
						<tr align = 'left'>
							<th>วาระที่</th>
							<th>เรื่อง</th>
							<th></th>
							<th></th>
						</tr>
				<?php foreach($query->result() as $row) { ?>	
				
						<tr align = 'left'>
							<td><a href="<?php echo site_url('template/inweb4/'.$row->agenda_id); ?>"><?php echo $row->no;?></a></td>
							<td><a href="<?php echo site_url('template/inweb4/'.$row->agenda_id); ?>"><?php echo $row->detail;?></a></td>
							<?php if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true && $_SESSION['intype'] == 1) { ?>
							<td><a href="<?php echo site_url('template/editagen/'.$row->agenda_id); ?>">แก้ไข</a></td>
							<td><a href="<?php echo site_url('template/deleteagen/'.$row->agenda_id); ?>">ลบ</a></td>
							<?php } ?>
						</tr>
						
				<?php } ?>
			</table>
	
  </section>