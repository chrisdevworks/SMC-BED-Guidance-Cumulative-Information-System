<?php include('db_connect.php') ?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Students</span>
        <span class="info-box-number">
          <?php echo $conn->query("SELECT * FROM users where type = 3")->num_rows; ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-poll-h"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Test</span>
        <span class="info-box-number">
          <?php echo $conn->query("SELECT * FROM survey_set")->num_rows; ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>

<?php else: ?>

  <style>
    div.slide {
      display: none;
    }
    .md-tabs .nav-item .nav-link.active~.slide{
      border-bottom: 10px blue solid;
      display: block!important;
    }

    a {
        color: inherit; 
        text-decoration:none; 
        cursor:pointer;  
    }

    [aria-expanded=true]{
      cursor:default;
    }

  </style>


<div class="pcoded-content">
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="cover-profile">
                <div class="profile-bg-img">
                  <!-- <img class="profile-bg-img img-fluid" src="https://my.smciligan.edu.ph/assets/images/user-profile/bg-img1.jpg" style="background-size: cover"> -->
                  <div class="card-block user-info">
                    <div class="col-md-12">
                      <div class="media-left">
                        <!-- <a href="#" class="profile-image"><img class="user-img img-radius" src="/assets/img/C10-0911.JPG" style="width: auto;height:128px;border-radius:10%"> </a> -->
                      </div>
                      <div class="media-body row">
                        <div class="col-lg-12">
                          <div class="user-title d-flex flex-column">
                            <h2><?php echo $_SESSION['login_name'] ?></h2>
                            <h5 class="mb-5">STEM</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="tab-header card d-flex flex-column shadow  ">
                <ul class="nav nav-tabs md-tabs tab-timeline justify-content-between border-0" role="tablist" id="mytab">
                  <li class="nav-item col-lg-4 p-0">
                    <a class="nav-link p-4 border-0 text-center active" data-toggle="tab" href="#personal" role="tab"
                      aria-expanded="false">Personal Info</a>
                    <div class="slide bg-primary border border-primary"></div>
                  </li>
                  <li class="nav-item col-lg-4 p-0">
                    <a class="nav-link p-4 border-0 text-center" data-toggle="tab" href="#educational" role="tab"
                      aria-expanded="false">Educational Details </a>
                    <div class="slide bg-primary border border-primary"></div>

                  </li>
                  <li class="nav-item col-lg-4 p-0">
                    <a class="nav-link p-4 border-0 text-center" data-toggle="tab" href="#family" role="tab" aria-expanded="false">Family
                      Details</a>
                    <div class="slide bg-primary border border-primary"></div>
                  </li>
                </ul>
              </div>
              <div class="tab-content shadow">

                <!-- PERSONAL -->

                <div class="tab-pane active" id="personal" role="tabpanel" aria-expanded="true">
                  <div class="card">
                    <div class="card-header border-0 d-flex">
                      <h5 class="card-header-text">About Me</h5>
                      <button id="edit-btn" type="button"
                        class="btn btn-sm btn-primary ml-auto">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                      </button>
                    </div>
                    <div class="card-block">
                      <div class="view-info" style="">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="general-info">
                              <div class="row">
                                <div class="col-lg-12 col-xl-6">
                                  <div class="table-responsive">
                                    <table class="table m-0">
                                      <tbody>
                                        <tr>
                                          <th scope="row">Full Name</th>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Gender</th>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">School-ID</th>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Address</th>
                                          <td></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                  <div class="table-responsive">
                                    <table class="table">
                                      <tbody>
                                        <tr>
                                          <th scope="row">Birth Date</th>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Civil Status</th>
                                          <td id="civilstat"></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Religion</th>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Contact No.</th>
                                          <td></td>
                                        </tr>
                                        
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <form class="personalCRUD" action="">
                        <div class="edit-info" style="display: none;">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="general-info">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <table class="table">
                                      <tbody>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" class="form-control" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Full Name" name="fname"
                                                value="" placeholder="Full Name" required>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <select class="form-control form-control-primary" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Gender" name="gender">
                                                <option value="Male" selected="">Male</option>
                                                <option value="Female">Female</option>
                                              </select>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" class="form-control form-control-primary"
                                                data-toggle="tooltip" data-placement="top"
                                                data-original-title="SMC ID" name="smcid"
                                                value="" placeholder="SMC ID">
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <textarea class="form-control form-control-primary" name="paddress"
                                                placeholder="Permanent Address" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Permanent Address"
                                                required=""></textarea>
                                            </div>
                                          </td>
                                        </tr>
                                        
                                      </tbody>
                                    </table>
                                  </div>
                                  <div class="col-lg-6">
                                    <table class="table">
                                      <tbody>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <input type="date" class="form-control form-control-primary"
                                                data-toggle="tooltip" data-placement="top"
                                                data-original-title="Birth Date" id="date" name="bday"
                                                placeholder="Birthday" value=""
                                                onfocus="if (!window.__cfRLUnblockHandlers) return false; (this.type='date')"
                                                required="">
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <select class="form-control form-control-primary" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Civil Status"
                                                name="civilstat">
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="widow">Widow</option>
                                              </select>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <select class="form-control form-control-primary" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Religion" name="religion">
                                                <option value="Roman Catholic" selected="">Roman Catholic</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Seventh Day Adventist">Seventh Day Adventist</option>
                                                <option value="Baptist">Baptist</option>
                                                <option value="Mormons">Mormons</option>
                                                <option value="Iglesia ni Kristo">Iglesia ni Kristo</option>
                                                <option value="Protestant">Protestant</option>
                                                <option value="Born Again">Born Again</option>
                                                <option value="Jehova`s Witness">Jehova`s Witness</option>
                                                <option value="IFI">IFI</option>
                                                <option value="Evangelism">Evangelism</option>
                                                <option value="Christian Alliance">Christian Alliance</option>
                                              </select>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <input type="tel" id="cphone" class="form-control" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Contact" name="cphone"
                                                value="" placeholder="09XXXXXYYYY" pattern="[0-9]{11}" required>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                <div class="text-center mb-4">
                                  <button class="btn btn-primary waves-effect waves-light m-r-20">Save</button>
                                  <a href="#!" id="edit-cancel" class="btn btn-danger waves-effect">Cancel</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <input type="hidden" name="_token" value="ngkpbM3vRxXpmB74CxlxQ7sv2bNya6YQp4vKiRMq">
                      </form>
                    </div>
                  </div>
                </div>

                <!-- EDUCATIONAL -->

                <div class="tab-pane" id="educational" role="tabpanel" aria-expanded="false">
                  <div class="card">
                    <div class="card-header border-0 d-flex ">
                      <h5 class="card-header-text ">My Educational Details</h5>
                      <button id="edit-btn-educ" type="button"
                        class="btn btn-sm btn-primary ml-auto">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                      </button>
                    </div>
                    <div class="card-block">
                      <div class="view-info-educ">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="general-info">
                              <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                  <div class="table-responsive">
                                    <table class="table m-0">
                                      <tbody>
                                        <tr>
                                          <th scope="row">Grade Level</th>
                                          <td>Grade 12</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Strand</th>
                                          <td>STEM</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <form class="educCRUD" method="POST"
                        action="https://my.smciligan.edu.ph/user-profile/updateEducationDetails/C10-0911">
                        <div class="edit-info-educ" style="display: none;">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="general-info">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <table class="table">
                                      <tbody>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <select class="form-control form-control-primary" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Gradelevel" name="Gradelevel">
                                                <option value="k1" selected="Kinder 1">Kinder 1</option>
                                                <option value="k2" >Kinder 2</option>
                                                <option value="g1" >Grade 1</option>
                                                <option value="g2" >Grade 2</option>
                                                <option value="g3" >Grade 3</option>
                                                <option value="g4" >Grade 4</option>
                                                <option value="g5" >Grade 5</option>
                                                <option value="g6" >Grade 6</option>
                                                <option value="g7" >Grade 7</option>
                                                <option value="g8" >Grade 8</option>
                                                <option value="g9" >Grade 9</option>
                                                <option value="g10">Grade 10</option>
                                                <option value="g11">Grade 11</option>
                                                <option value="g12">Grade 12</option>
                                              </select>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <select class="form-control form-control-primary" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Strand"
                                                name="Strand">
                                                <option value="None" selected="None">None</option>
                                                <option value="STEM" >STEM</option>
                                                <option value="ABM" >ABM</option>
                                                <option value="HUMSS" >HUMSS</option>
                                              </select>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                <div class="text-center mb-4">
                                  <button type="submit" name="educCRUD"
                                    class="btn btn-primary waves-effect waves-light m-r-20">Save</button>
                                  <a href="#!" id="edit-cancel-educ" class="btn btn-danger waves-effect">Cancel</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <input type="hidden" name="_token" value="ngkpbM3vRxXpmB74CxlxQ7sv2bNya6YQp4vKiRMq">
                      </form>
                    </div>
                  </div>
                </div>

                <!-- FAMILY -->

                <div class="tab-pane" id="family" role="tabpanel" aria-expanded="false">
                  <div class="card">
                    <div class="card-header border-0 d-flex">
                      <h5 class="card-header-text">My Family Details</h5>
                      <button id="edit-btn-fam" type="button"
                        class="btn btn-sm btn-primary ml-auto">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                      </button>
                    </div>
                    <div class="card-block">
                      <div class="view-info-fam">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="general-info">
                              <div class="row">
                                <div class="col-lg-12 col-xl-6">
                                  <div class="table-responsive">
                                    <table class="table m-0">
                                      <tbody>
                                        <tr>
                                          <th scope="row">Mother's Name</th>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Father's Name</th>
                                          <td></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                  <div class="table-responsive">
                                    <table class="table">
                                      <tbody>
                                        <tr>
                                          <th scope="row">Parents Address</th>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Parents Contact No.</th>
                                          <td></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <form class="famCRUD" method="POST"
                        action="https://my.smciligan.edu.ph/user-profile/updateFamilyDetails/C10-0911">
                        <div class="edit-info-fam" style="display: none;">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="general-info">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <table class="table">
                                      <tbody>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" class="form-control" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Mother's Name" name="mother"
                                                value="" placeholder="Mother's Name" required>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" class="form-control" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Father's Name" name="father"
                                                value="" placeholder="Father's Name"
                                                required>
                                            </div>
                                          </td>
                                        </tr>

                                      </tbody>
                                    </table>
                                  </div>
                                  <div class="col-lg-6">
                                    <table class="table">
                                      <tbody>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" class="form-control" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Parent's Address"
                                                name="pa_addr" value="" placeholder="Parent's Address" required>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="input-group">
                                              <input type="text" class="form-control" data-toggle="tooltip"
                                                data-placement="top" data-original-title="Parents's Contact No."
                                                name="pa_cont" value="" placeholder="Parents's Contact No." required>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                <div class="text-center mb-4">
                                  <button type="submit" name="famCRUD"
                                    class="btn btn-primary waves-effect waves-light m-r-20">Save</button>
                                  <a href="#!" id="edit-cancel-fam" class="btn btn-danger waves-effect">Cancel</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <input type="hidden" name="_token" value="ngkpbM3vRxXpmB74CxlxQ7sv2bNya6YQp4vKiRMq">
                      </form>
                    </div>
                  </div>
                </div>

                <!-- END -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endif; ?>

<script>
  
  $('#personalCRUD').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_personal',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					// setTimeout(function(){
					// 	location.replace('index.php?page=home')
					// },1500)
				}
			}
		})
	})

  $(document).ready(function(){
      $("#edit-btn").click(function(){
        $(".edit-info").toggle();
        $(".view-info").toggle();
      });


      $("#edit-btn-educ").click(function(){
        $(".view-info-educ").toggle();
        $(".edit-info-educ").toggle();
      });

      $("#edit-btn-fam").click(function(){
        $(".edit-info-fam").toggle();
        $(".view-info-fam").toggle();
      });

    });
   
  </script>