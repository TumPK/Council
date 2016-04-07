
</script>
<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
      <table border = '1' width = '80%' align = 'center'>
		<?php foreach($query->result() as $row) { ?>	
				<tr align = 'left'>
					<td><h5>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('template/inweb3/'.$row->report_id); ?>">รายงานการประชุมครั้งที่ : <?php echo $row->no; ?></a></td></br>
					
					<?php if(isset($_SESSION['sys_login'])&&$_SESSION['sys_login']==true && $_SESSION['intype'] == 1) { ?>
							<td><a href="<?php echo site_url('template/editreport/'.$row->report_id); ?>">แก้ไข</a></td>
							<td><a href="<?php echo site_url('template/deletereport/'.$row->report_id); ?>">ลบ</a></td>
							<?php } ?>
							
				</tr>
		<?php } ?>
	</table>
  </section>