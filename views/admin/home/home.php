<?php include_once 'views/admin/layouts/header.php' ?>
<div class="container-fluid">
  <div class="block-header">
    <h2>DASHBOARD</h2>
  </div>

  <!-- Widgets -->
  <div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-pink ">
        <div class="icon">
          <i class="material-icons">playlist_add_new_user</i>
        </div>
        <a href="?mod=staff&act=add">
          <div class="content">
            <div class="text">NEW USER</div>
            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
          </div>
        </a>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-cyan ">
        <div class="icon">
          <i class="material-icons">person_add</i>
          
        </div>
        <a href="?mod=customer&act=add">
          <div class="content">
            <div class="text">NEW CUSTOMER</div>
            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-light-green ">
        <div class="icon">
          <i class="material-icons">forum</i>
        </div>
        <a href="?mod=product">
        <div class="content">
          <div class="text">LIST PRODUCT</div>
          <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
        </div>
      </div>
    </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-orange ">
        <div class="icon">
          <i class="material-icons">help</i>
        </div>
        <a href="?mod=sale"><div class="content">
          <div class="text" >SALE</div>
          <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
        </div></a>
      </div>
    </div>
  </div>
  <!-- #END# Widgets -->
</div>
  
<!-- Hiển thị Info User -->
    <!-- CONTENT: -->
  <div class="container"> 
    <div class="portlet light bordered" style="margin-right: 15px;">
        <div class="portlet-body">
        
            <div class="card">
                <div class="content"> 
                 <label style="font-size: 24px; margin-left:150px;margin-top:20px;"> Your Profile:</label>
                
                <!-- Avatar -->
                      <div class="portlet-title">
                          <div class="tools">
                              <a href="javascript:;" class="fullscreen" data-original-title="" title=""> </a>
                          </div>
                      </div><br>
                       <div class="portlet light profile-sidebar-portlet ">
                              <!-- SIDEBAR USERPIC -->
                          <div class="profile-userpic" align="center">
                              <img width="200" height="auto" src="upload/admin/staff/<?php echo $_SESSION['staff_login']['avatar']; ?>" class="img-responsive" style="box-shadow: 5px 5px 5px #666;">               
                          </div>
                      </div><br>

                    <!-- Profile: -->
                    <form id="edit-profile" name="edit-profile" role="form" method="" style="padding: 10px;" >
                        <div class="row" style="margin-left: 150px">
                          <div class="col-md-2">
                                <div class="form-group">
                                    <label>ID </label>
                                    <input type="text" class="form-control" placeholder="ID" value="<?php echo $_SESSION['staff_login']['id']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" value="<?php echo $_SESSION['staff_login']['name']; ?>" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-left: 150px">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Điện thoại </label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Số điện thoại" value="<?php echo $_SESSION['staff_login']['mobile']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Nơi ở hiện tại" value="<?php echo $_SESSION['staff_login']['address']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label>Giới tính</label>
                                    <input type="text" class="form-control" id="gender" name="gender" value="<?php 
                                      switch ($_SESSION['staff_login']['gender']){
                                        case "1": echo "Nữ";break;
                                        case "0": echo "Nam";break;
                                        
                                      }
                                      ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-left: 150px">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <div class="form-control" id="email" name="email" ><?php echo $_SESSION['staff_login']['email']; ?></div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Job</label>
                                    <div  class="form-control" id="job" name="job_id"><?php 
                                      switch ($_SESSION['staff_login']['job_id']){
                                        case "1": echo "Manager";break;
                                        case "2": echo "Saler";break;
                                        case "3": echo "Stocker";break;
                                        case "4": echo "Secterary";break;
                                        case "5": echo "Trannie";break;
                                      }
                                      ?>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
  </div>


    <!-- #END# Task Info -->
  </div>
</div>
<?php include_once 'views/admin/layouts/footer.php'; ?>