<?php
if(!isset($conn)){
	include 'db_connect.php' ;
}
?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="50%">
					<col width="10%">
					<col width="5%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Title</th>
						<th>Content</th>
						<th>File</th>
						<th>Date Uploaded</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
                    $newsfeed = $conn->query("SELECT * FROM newsfeed ORDER BY dateposted ASC");
                    while($row=$newsfeed->fetch_assoc()):	
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['title']) ?></b></td>
						<td><b class="truncate"><?php echo $row['content'] ?></b></td>
						<td><b class="truncate"><?php echo $row['uploads'] ?></b></td>
						<td><b><?php echo date("M d, Y",strtotime($row['dateposted'])) ?></b></td>
						<td class="text-center">
							<div class="btn-group">
								<a href="./index.php?page=edit_news&id=<?php echo $row['id'] ?>"
									class="btn btn-primary btn-flat">
									<i class="fas fa-edit"></i>
								</a>
								<button type="button" class="btn btn-danger btn-flat delete_news"
									data-id="<?php echo $row['id'] ?>">
									<i class="fas fa-trash"></i>
								</button>
							</div>
						</td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	//Table Pagination
	$(document).ready(function () {
		$('#list').dataTable()
	})
	
	$('.delete_news').click(function () {
			_conf("Are you sure to delete this survey?", "delete_news", [$(this).attr('data-id')])
	})

	function delete_news($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_news',
			method: 'POST',
			data: {
				id: $id
			},
			success: function (resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function () {
						location.reload()
					}, 1500)

				}
			}
		})
	}

	
</script>