<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
      <table border = '3' width = '80%' align = 'center'>
		<tr align = 'left'>
					<th>ID</th>
					<th>ชื่อ</th>
					<th>นามสกุล</th>
					
					<th>เบอร์โทร</th>
					<th>หน่วยงาน</th>
					<th>สถานะ</th>
					<th></th>
					<th></th>
				</tr>
		<?php foreach($query->result() as $row) { ?>	
				<tr align = 'left'>
					<td><?php echo $row->staff_id;?></td>
					<td width='1000'><?php echo $row->lname;?></td>
					<td width='1000'><?php echo $row->fname;?></td>
					
					<td><?php echo $row->tel;?></td>
					<td width='1500'><?php echo $row->namesec;?></td>
					<td width='1000'><?php echo $row->name;?></td>
					<td><a href="<?php echo site_url('template/edituser/'.$row->staff_id);?>">แก้ไข</a></td>
					<td><a href="<?php echo site_url('template/deleteuser/'.$row->staff_id);?>">ลบ</a></td>
				</tr>
		<?php } ?>
	</table>
	
	<?php
	if($Prev_Page)
	{
	echo "<a href ='".site_url('template/user')."/".$Prev_Page."'><< Back</a> ";
	}

	for($i=1; $i<=$Num_Pages; $i++){
	if($i != $id)
	{
		echo "[ <a href='".site_url('template/user')."/".$i."'>".$i."</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
	}
	if($id!=$Num_Pages)
	{
	echo " <a href ='".site_url('template/user')."/".$Next_Page."'>Next>></a> ";
	}
	?>
	
</section>