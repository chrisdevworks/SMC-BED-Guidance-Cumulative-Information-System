<?php include'db_connect.php' ?>
<div class="col-lg-12" style="overflow:auto; white-space: nowrap" >
	<div class="card card-outline card-primary">
		<div class="card-body">
			<table class="table table-hover table-bordered" id="takers">
				<colgroup>
					<col width="5%">
					<col width="20%">
					<col width="35%">
					<col width="10%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Survey Title</th>
						<th>Name</th>
						<th>Date Created</th>
						<th>View</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					// $qry = $conn->query("SELECT * FROM survey_set order by date(start_date) asc,date(end_date) asc ");
					// $qry = $conn->query("SELECT * FROM answers where survey_id = {$_GET['id']} order by date(date_created)")->num_rows;
					$qry = $conn->query("SELECT  S.id as Survey_id, U.id as U_id, A.id as Answer_id, S.title as Survey_Title, concat(lastname,', ',firstname,' ',middlename) as name, A.date_created as dateC FROM answers A INNER JOIN users U ON U.id = A.user_id INNER JOIN survey_set S ON S.id = A.survey_id WHERE survey_id = ".$_GET['id']." GROUP BY U.id");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo $row['Survey_Title'] ?></b></td>
						<td><b><?php echo ucwords($row['name']) ?></b></td>
						<td><b><?php echo date("M d, Y",strtotime($row['dateC'])) ?></b></td>
						<td class="text-center">
							<div class="btn-group">
								<a href="./index.php?page=view_student_answers&id=<?php echo $row['Survey_id'] ?>&users=<?php echo $row['U_id'] ?>"
									class="btn btn-primary btn-flat">
									<i class="fas fa-eye"></i>
								</a>
								<button type="button" class="btn btn-danger btn-flat delete_takers"
									data-id="<?php echo $row['U_id'] ?>">
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
	$(document).ready(function () {
		$('#takers').dataTable();
	})

	$('.delete_takers').click(function () {
			_conf("Are you sure to delete this test taker?", "delete_takers", [$(this).attr('data-id')]);
	});
	
	function delete_takers($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_takers',
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