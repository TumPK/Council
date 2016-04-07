   <!-- Page Content -->
    <div class="container">
          <table border = '1' width = '80%' align = 'center'></br>
          	<tr>
				<th>No</th>
				<th>Year</th>
				<th>agenda_id</th>
				<th>term_id</th>
				<th>describe</th>
				<th>result</th>
				<th>on-going</th>
				<th>date</th>
				
			</tr>
			<?php foreach($query->result() as $row) { ?>	
				<tr>
					<td><?php echo $row->no;?></td>
					<td><?php echo $row->year;?></td>
					<td><?php echo $row->agenda_id;?></td>
					<td><?php echo $row->term_id;?></td>
					<td><?php echo $row->describe;?></td>
					<td><?php echo $row->result;?></td>
					<td><?php echo $row->on_going;?></td>
					
					<td><?php echo $row->date; ?></td>
					
					
				</tr>
			<?php } ?>
		</table>
		<a href="<?php echo site_url('template/view'); ?>"><button>กลับหน้าหลัก</button></a>
	</div>