<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  <?php 
    $this->load->view('tem/inc_css');
  ?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url()."public/"?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <?php $this->load->view('tem/inc_head_menu.php')?>

  <?php $this->load->view('tem/inc_lift_menu')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" >ตารางวิชาการ departments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">ตารางวิชาการ</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
      <div class="row">
    
        <div class="col-lg-2 hade-show">รหัส</div>
        <div class="col-lg-2 hade-show">ขื่อ</div>
        <div class="col-lg-2 hade-show">ขื่อ</div>
        <div class="col-lg-2 hade-show">ขื่อ</div>
        <div class="col-lg-2 hade-show">แก้ไขข้อมูล</div>
        <div class="col-lg-2 hade-show">ลบข้อมูล</div>
       
      </div>
      <?php foreach($departments as $key=>$value): ?>
        <div class="row">
          <div class="col-lg-2 body-show"><?php echo $value['DEPARTMENT_ID'];?></div>
          <div class="col-lg-2 body-show"><?php echo $value['DEPARTMENT_NAME_TH'];?></div>
          <div class="col-lg-2 body-show"><?php echo $value['DEPARTMENT_NAME_EN'];?></div>
          <div class="col-lg-2 body-show"><?php echo $value['FACUALTY_NAME_TH'];?></div>
          <div class="col-lg-2 body-show">
            <button type="button" class="btn btn-block btn-success" onclick="main.get_edit_departments(
              '<?php echo $value['ID_DEP'];?>',
              '<?php echo $value['DEPARTMENT_ID'];?>',
              '<?php echo $value['DEPARTMENT_NAME_TH'];?>',
              '<?php echo $value['DEPARTMENT_NAME_EN'];?>',
              '<?php echo $value['FACULTY_ID'];?>');">
              แก้ไขข้อมูล
            </button>
          </div>
          <div class="col-lg-2 body-show">
            <button type="button" class="btn btn-block btn-danger" onclick="main.delete_departments('<?php echo $value['ID_DEP'];?>')">ลบข้อมูล</button>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4"> <button type="button" class="btn btn-block btn-outline-primary btn-lg m-3 p-3" onclick="$('#add_personnels').modal('show');">เพิ่มข้อมูล</button></div>
        <div class="col-lg-4"></div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="add_personnels" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">เเก้ไขข้อมูล คณะ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="formGroupExampleInput">DEPARTMENT_ID</label>
          <input type="text" class="form-control"  name="DEPARTMENT_ID" placeholder="ชื่อคณะ">
          <label for="formGroupExampleInput">DEPARTMENT_NAME_TH</label>
          <input type="text" class="form-control"  name="DEPARTMENT_NAME_TH" placeholder="ชื่อคณะ">
          <label for="formGroupExampleInput">DEPARTMENT_NAME_EN</label>
          <input type="text" class="form-control"  name="DEPARTMENT_NAME_EN" placeholder="ชื่อคณะ">
          <label for="formGroupExampleInput">FACULTY_ID</label>
          <select class="form-control" name="FACULTY_ID" >
            <option value="">กรุณาเลือก</option>
            <?php foreach($faculties as $key=>$value): ?>
              <option value="<?php echo $value['FACULTY_ID'];?>"><?php echo $value['FACUALTY_NAME_TH'];?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="main.add_departments();">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_departments" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title exampleModalLongTitle" id="exampleModalLongTitle" >เเก้ไขข้อมูล คณะ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="formGroupExampleInput">DEPARTMENT_ID</label>
          <input type="text" class="form-control"  name="DEPARTMENT_ID" placeholder="ชื่อคณะ">
          <label for="formGroupExampleInput">DEPARTMENT_NAME_TH</label>
          <input type="text" class="form-control"  name="DEPARTMENT_NAME_TH" placeholder="ชื่อคณะ">
          <label for="formGroupExampleInput">DEPARTMENT_NAME_EN</label>
          <input type="text" class="form-control"  name="DEPARTMENT_NAME_EN" placeholder="ชื่อคณะ">
          <label for="formGroupExampleInput">FACULTY_ID</label>
          <select class="form-control" name="FACULTY_ID" >
            <option value="">กรุณาเลือก</option>
            <?php foreach($faculties as $key=>$value): ?>
              <option value="<?php echo $value['FACULTY_ID'];?>"><?php echo $value['FACUALTY_NAME_TH'];?></option>
            <?php endforeach; ?>
          </select>
          <input type="hidden"  name="ID_DEP" placeholder="ชื่อคณะ">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="main.edit_departments();">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ./wrapper -->
<?php $this->load->view('tem/inc_modal_center')?>
<?php $this->load->view('tem/inc_js')?>
<script>
  $( document ).ready(function() {

  });
</script>
</body>
</html>
