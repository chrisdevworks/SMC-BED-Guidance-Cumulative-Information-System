<?php include'db_connect.php' ?>
<style>
    th, td{
        font-size:small;
    }
    .dropdown-menu{
        color: #FFFFFF !important;
        background: #117a8b;
    }
/* 
    .dropdown-menu.collapsing {
        display:block;
    } */

    .noti_appnt{
        display: block;
    }
</style>
<div class="col-lg-12" style="overflow:auto; white-space: nowrap" >
	<div class="card card-outline card-primary">
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					
                    <?php if($_SESSION['login_type'] == 1): ?>
					<!-- Admin-->
                    <col width="1%">
					<col width="10%">
					<col width="5%">
					<col width="5%">
                    <col width="50%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
                    <?php else: ?>
					<!-- Student -->
                    <col width="5%">
					<col width="5%">
					<col width="70%">
                    <col width="10%">
					<col width="10%">
					<col width="10%">
                    <?php endif; ?>
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
                        <?php if($_SESSION['login_type'] == 1): ?>
						    <th>Appointment ID</th>
						    <th>Student ID</th>
                        <?php endif; ?>
						<th>Status</th>
						<th>Content</th>
						<!-- <th>Reply</th> -->
						<th>Appointment Date</th>
						<th>Date Created</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                    <?php if($_SESSION['login_type'] == 1): ?>
                        <?php
                        $i = 1;
                        $loginid = $_SESSION["login_id"];

                        $appointment = $conn->query("SELECT * FROM appointment ORDER BY date_created ASC");
                        while($row=$appointment->fetch_assoc()):	
                        ?>
                        <tr>
                            <th class="text-center"><?php echo $i++ ?></th>
                            <td><b class="truncate"><?php echo $row['id'] ?></b></td>
                            <td><b class="truncate"><?php echo $row['student_id'] ?></b></td>
                            <?php
                                if($row['app_status'] == 'Accepted'):
                                ?> 
                                    <td class="text-center"><h6><span id="appstat" class="badge bg-success appstats"><?php echo ucwords($row['app_status']) ?></span></h6></td>
                                <?php   
                                elseif($row['app_status'] == 'Denied'):
                                ?> 
                                    <td class="text-center"><h6><span id="appstat" class="badge bg-danger appstats"><?php echo ucwords($row['app_status']) ?></span></h6></td>
                                <?php 
                                else:
                                ?> 
                                    <td class="text-center"><h6><span id="appstat" class="badge bg-secondary appstats"><?php echo ucwords($row['app_status']) ?></span></h6></td>
                                <?php 
                                endif;
                            ?>
                            <td><b class="truncate"><?php echo ucwords($row['content']) ?></b></td>
                            <!-- <td><b class="truncate"><?php echo ucwords($row['reply']) ?></b></td> -->
                            <td><b><?php echo date("M d, Y <\b\\r> h:i A",strtotime($row['app_date'])) ?></b></td>
                            <td><b><?php echo date("Y-m-d <\b\\r> h:i A",strtotime($row['date_created'])) ?></b></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <!-- <a href="./index.php?page=edit_appointment&id=<?php echo $row['id'] ?>"
                                        class="btn btn-primary btn-flat">
                                        <i class="fas fa-edit"></i>
                                    </a> -->
                                    <!-- <a href="./index.php?page=appointment_reply&id=<?php echo $row['id'] ?>"
                                        class="btn btn-info btn-flat">
                                        <i class="fa-solid fa-comment-dots"></i>
                                    </a> -->
                                    <div class="btn-group dropleft drpdwn">
                                        <button type="button" class="btn btn-info dropdown-toggle drpdwn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-message drpdwn"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right drpdwn">
                                            <button data-id="<?php echo $row['id'] ?>" data-appnt="Accepted" class="dropdown-item badge badge-primary noti_appnt" href="#"><h6>Accept</h6></button>
                                            <button data-id="<?php echo $row['id'] ?>" data-appnt="Denied" class="dropdown-item badge badge-dark noti_appnt" href="#"><h6>Deny</h6></button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-flat delete_appnt"
                                        data-id="<?php echo $row['id'] ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>

                        <?php else: ?>
                        <?php
                        $i = 1;
                        $loginid = $_SESSION["login_id"];

                        $appointment = $conn->query("SELECT id, app_status, content, reply, app_date, date_created FROM appointment WHERE student_id= ".$loginid." ORDER BY date_created ASC");
                        while($row=$appointment->fetch_assoc()):	
                        ?>
                        <tr>
                            <th class="text-center"><?php echo $i++ ?></th>
                            <?php
                                if($row['app_status'] == 'Accepted'):
                                ?> 
                                    <td class="text-center"><h6><span id="appstat" class="badge bg-success appstats"><?php echo ucwords($row['app_status']) ?></span></h6></td>
                                <?php   
                                elseif($row['app_status'] == 'Denied'):
                                ?> 
                                    <td class="text-center"><h6><span id="appstat" class="badge bg-danger appstats"><?php echo ucwords($row['app_status']) ?></span></h6></td>
                                <?php 
                                else:
                                ?> 
                                    <td class="text-center"><h6><span id="appstat" class="badge bg-secondary appstats"><?php echo ucwords($row['app_status']) ?></span></h6></td>
                                <?php 
                                endif;
                            ?>
                            <!-- <td class="text-center"><h5><span id="appstatus" class="badge bg-secondary"><?php echo ucwords($row['app_status']) ?></span></h5></td> -->
                            <td><b class="truncate"><?php echo ucwords($row['content']) ?></b></td>
                            <!-- <td><b class="truncate"><?php echo ucwords($row['reply']) ?></b></td> -->
                            <td><b><?php echo date("M d, Y <\b\\r> h:i A",strtotime($row['app_date'])) ?></b></td>
                            <td><b><?php echo date("Y-m-d <\b\\r> h:i A",strtotime($row['date_created'])) ?></b></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="./index.php?page=edit_appointment&id=<?php echo $row['id'] ?>"
                                        class="btn btn-primary btn-flat">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-flat delete_appnt"
                                        data-id="<?php echo $row['id'] ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>

</style>
<script>
	//Table Pagination
	$(document).ready(function () {
		$('#list').dataTable()
	})


    $('.delete_appnt').click(function () {
			_conf("Are you sure to delete this test taker?", "delete_appnt", [$(this).attr('data-id')]);
	});
	
	function delete_appnt($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_appnt',
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


    $('.noti_appnt').click(function () {
        if(confirm('Are you sure') == true){
            noti_appnt($(this).attr('data-id'), $(this).attr('data-appnt'));
        }
	});
    
    function noti_appnt($id, $val) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=noti_appnt',
			method: 'POST',
			data: {
				id: $id,
                val: $val
			},
			success: function (resp) {
				if (resp == 21) {
					alert_toast("Data successfully updated", 'success')
					setTimeout(function () {
						location.reload()
					}, 300)


				}
			}
		})
	}

	
</script>