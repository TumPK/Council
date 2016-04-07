<div id="body" class="width">
	
      <!-- Page Content -->
    
    		<table border = '1' width = '80%' align = 'center'>
						<tr>
							<th>วัน</th>
							<th>วาระ</th>
							<th>วาระย่อย</th>
							<th>รายละเอียด</th>
							<th>งาน</th>
							<th>ผู้รับผิดชอบ</th>
							<th></th>
							<th></th>
						</tr>
						<?php $num=0; ?>
				<?php foreach($query->result() as $row) { ?>	
						
						<tr align = 'left'>
						
						<?php if($row->no2 == $num) { ?>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						<?php }else{ ?>
						<td width='1500'><?php echo $row->date;?></td>
						<td width='1500'><?php echo $row->no1;?></td>
							<td width='1500'><?php echo $row->no2;?></td>
							<td width='4000'><?php echo $row->detail;?></td>
						<?php } ?>
							<td width='1500'><?php echo $row->deatailOFterm;?></td>
							<td width='1500'><?php echo $row->name;?></td>
							
						</tr>
						<?php $num=$row->no2; ?>
						
				<?php } ?>
			</table>
			<p align="rigth">
	<?php
	if($Prev_Page)
	{
	echo "<a href ='".site_url('template/reportuser')."/".$Prev_Page."'><< Back</a> ";
	}

	for($i=1; $i<=$Num_Pages; $i++){
	if($i != $id)
	{
		echo "[ <a href='".site_url('template/reportuser')."/".$i."'>".$i."</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
	}
	if($id!=$Num_Pages)
	{
	echo " <a href ='".site_url('template/reportuser')."/".$Next_Page."'>Next>></a> ";
	}
	?>
	</p>
  
  <div class="clear"></div>
  </div>