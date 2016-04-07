<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
      <!-- Page Content -->
    
    		<table border = '1' width = '80%' align = 'center'>
						<tr>
							<th>เลขที่</th>
							<th>รายละเอียด</th>
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
							<td width='100'><?php echo $row->no;?></td>
							<td width='1000'><?php echo $row->detail;?></td>
						<?php } ?>
							<td width='200'><?php echo $row->deatailOFterm;?></td>
							<td width='200'><?php echo $row->name;?></td>
							
							<?php if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true && $_SESSION['intype'] == 1) { ?>
							<td><a href="<?php echo site_url('template/editsubagen/'.$row->no.'/'.$row->agenda_id.'/'.$row->section_id); ?>">แก้ไข</a></td>
							<td><a href="<?php echo site_url('template/deletesubagen/'.$row->subagenda_id.'/'.$row->term_id.'/'.$row->responsible_id); ?>">ลบ</a></td>
							<?php } ?>
						</tr>
						<?php $num=$row->no; ?>
						
				<?php } ?>
			</table>
	
  </section>