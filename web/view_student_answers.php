<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<div class="card-header">
				<h3 class="card-title"><b>Test Report</b></h3>
				<div class="card-tools">
					<button onclick="window.print()" class="btn btn-flat btn-sm bg-gradient-success" type="button" id="print"><i
							class="fa fa-print"></i> Print</button>
				</div>
			</div>
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<!-- <col width="5%"> -->
					<col width="35%">
					<col width="35%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<!-- <th class="text-center">#</th> -->
						<th>Questions</th>
						<th>Answers</th>
						<th>Date Created</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					// $question = $conn->query("SELECT Q.type as Q_type, Q.question as question, Q.frm_option as frm_option, A.id as Answer_id, S.title as Survey_Title, A.date_created as dateC FROM answers A INNER JOIN survey_set S ON S.id = A.survey_id INNER JOIN questions Q ON Q.id = A.question_id WHERE A.survey_id = ".$_GET['id']." AND A.user_id = ".$_GET['users']."");
					$answer = $conn->query("SELECT A.answer as answer, A.user_id, A.survey_id, Q.type as Qtype, Q.question as question, Q.frm_option as Qfrm, A.id, S.title as Survey_Title, A.date_created as dateC, Q.order_by as OD FROM answers A INNER JOIN survey_set S ON S.id = A.survey_id INNER JOIN questions Q ON Q.id = A.question_id WHERE A.survey_id = ".$_GET['id']." AND A.user_id = ".$_GET['users']." ORDER BY abs(OD) ASC");
					
					while($row= $answer->fetch_assoc()):
					?>
					<tr>
					<!-- foreach(json_decode($row['frm_option']) as $k => $v): -->

						<!-- <th class="text-center"><?php echo $i++ ?></th> -->
						<td><b><?php echo ucwords($row['question']) ?></b></td>
						<td><b>
							<?php 
								
								$arr = json_decode('['.$row['Qfrm'].']',true);
								$s = $row['answer'];
								foreach($arr as $item) { //foreach element in $arr
									$uses = $item[$s]; //etc
									echo $uses;
								}

							?>
						</b></td>
						<td><b><?php echo date("M d, Y",strtotime($row['dateC'])) ?></b></td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$('#print').click(function(){
		start_load()
		var nw = window.open("print_report.php?id=<?php echo $id ?>","_blank","width=800,height=600")
			nw.print()
			setTimeout(function(){
				nw.close()
				end_load()
			},2500)
	})
</script>