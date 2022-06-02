<?php
if(!isset($conn)){
	include 'db_connect.php' ;
}
?>
<style>
.appnt-bg{
    background-image: url("assets/dist/css/mainpage/img/bluebg.jpg");
	background-repeat: repeat-y;  
  	background-position: 0% 0%;
  	background-size: 100% 100%;
}
</style>

<div class="d-flex justify-content-center py-5 ">
	<div class="card card-outline card-primary">
		<div class="card-header text-center">
			<span id="date"></span>
		</div>
		<div class="card-body appnt-bg">
			<form action="" id="manage_appointment">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label"> Purpose</label>
							<!-- <textarea name="content" id="" cols="30" rows="2" class="form-control" required></textarea> -->
							<textarea name="content" id="" cols="30" rows="2" class="form-control" required><?php echo isset($content) ? $content : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12 mt-3 mb-3">
						<!-- Date and time -->
						<div class="form-group">
							<label for="" class="control-label">End</label>
							<input type="datetime-local" name="appointment_date" class="form-control form-control-sm" required value="<?php echo isset($app_date) ? $app_date : '' ?>">
						</div>
					</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=appointment_list'">Cancel</button>
				</div>
			</form>

		</div>
		<div class="card-footer justify-content-sm-right d-flex">
			<h3 class="card-title"><strong>Reminder:</strong> No available visits during Saturday, Sunday and Holidays.
			</h3>
		</div>
	</div>
</div>

<script>

	$('#manage_appointment').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_appointment',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.replace('index.php?page=appointment_list')
					},1500)
				}
			}
		})
	})
	
</script>