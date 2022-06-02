<?php
if(!isset($conn)){
	include 'db_connect.php' ;
}
?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_news" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row justify-content-center d-flex">
					<div class="col-md-12">
						<div class="form-group">
							<label for="ntitle" class="control-label">Header</label>
							<input type="text" name="ntitle" class="form-control form-control-sm" required value="<?php echo isset($ntitle) ? $ntitle : '' ?>">
						</div>
						<div class="form-group">
                            <label for="ncontent" class="form-label">Content</label>
							<textarea name="ncontent" id="" cols="30" rows="4" class="form-control" required><?php echo isset($ncontent) ? $ncontent : '' ?></textarea>
                        </div>
						<div class="form-group">
							<label for="nauthor" class="control-label">Author</label>
							<input type="text" name="nauthor" class="form-control form-control-sm" required value="<?php echo isset($nauthor) ? $nauthor : '' ?>">
						</div>
                        <div class="form-group">
                            <label for="formFile" class="form-label">Upload Image</label>
							<input type="file" name="nupload" id="nupload" class="form-control form-control-sm" required value="<?php echo isset($nupload) ? $nupload : '' ?>">
						</div>
					</div>
				</div>
                <hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=user_list'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage_news').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')

		$.ajax({
			url:'ajax.php?action=save_news',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			// success:function(resp){
			// 	if(Response == 1){
			// 		alert_toast('Data successfully saved.',"success");
			// 		setTimeout(function(){
			// 			location.replace('index.php?page=news_list')
			// 		},750)
			// 	}
				
			// }
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.replace('index.php?page=news_list')
					},1500)
				}
			}
		})
	})
</script>