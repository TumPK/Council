<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
      <!-- Page Content -->
    
    		<table border = '1' width = '80%' align = 'center'>
						<tr>
							<th>no</th>
							<th>detail</th>
							<th>งาน</th>
							<th>ผู้รับผิดชอบ</th>
							<th></th>
							<th></th>
						</tr>
						<?php $num=0; ?>
				<?php foreach($query->result() as $row) { ?>	
				
						<tr align = 'left'>
						<?php if($row->no == $num) { ?>
							<td></td>
							<td></td>
						<?php }else{ ?>
							<td><?php echo $row->no;?></td>
							<td><?php echo $row->detail;?></td>
						<?php } ?>
							<td><?php echo $row->deatailOFterm;?></td>
							<td><?php echo $row->name;?></td>
							<?php if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true && $_SESSION['intype'] == 1) { ?>
							<td><a href="<?php echo site_url('template/edit/'.$row->agenda_id); ?>">edit</a></td>
							<td><a href="<?php echo site_url('template/delete/'.$row->agenda_id); ?>">delete</a></td>
							<?php } ?>
						</tr>
						<?php $num=$row->no; ?>
						
				<?php } ?>
			</table>
	
  </section>