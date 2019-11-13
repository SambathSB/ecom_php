<?php
  require("../../classes/user.php");
  $user = new User();
?>

<!DOCTYPE html>
<html>
<!-- head -->
<?php require("../../includes/head.php") ?>

<div class="wrapper">

  <!-- nav -->
  <?php require("../../includes/nav.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddUser">
                <i class="fa fa-plus"></i> Create New
              </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12 col-md-6"></div>
                  <div class="col-sm-12 col-md-6"></div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <table id="result" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    </table>
                    <!-- <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                      <thead>
                        <tr role="row">
                          <th>ID</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="tableCategory">
                        <?php
                          $result = $user->all()->fetchAll(PDO::FETCH_ASSOC);
                          foreach($result as $row) : ?>
                          <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td>
                              <a href="#" class="btn btn-info view-user" user-id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="modalViewUser">
                                <i class="fa fa-eye"></i> View
                              </a>
                              <a href="#" class="btn btn-primary">
                                <i class="fa fa-pen"></i> Edit
                              </a>
                            </td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table> -->
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                      Showing 1 to 10 of 57 entries
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                      <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="example2_previous">
                          <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                        </li>
                        <li class="paginate_button page-item active">
                          <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                        </li>
                        <li class="paginate_button page-item ">
                          <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                        </li>
                        <li class="paginate_button page-item ">
                          <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                        </li>
                        <li class="paginate_button page-item ">
                          <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                        </li>
                        <li class="paginate_button page-item ">
                          <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                        </li>
                        <li class="paginate_button page-item ">
                          <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                        </li>
                        <li class="paginate_button page-item next" id="example2_next">
                          <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- View User -->
<div class="modal fade" id="modalViewUser" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Information User</h4>
        <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form action="" method="POST">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="id">ID</label>
                <input type="text" name="id" id="id" class="form-control" disabled>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" disabled>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" disabled>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" disabled>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Add User -->
<div class="modal fade" id="modalAddUser" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create New User</h4>
        <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="formUser">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
                <span class="text-danger error_username"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
                <span class="text-danger error_email"></span>
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <span class="text-danger error_password"></span>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" create-user="Create" id="btnAddUser" class="btn btn-primary">Create</button>
        <button type="button" class="btn btn-default btnCloseUser" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Edit User -->
<div class="modal fade" id="modalEditUser" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
        <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="formEditUser">
          <div class="row">
            <input type="hidden" name="edit_id" id="edit_id">
            <div class="col-md-6">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="edit_username" id="edit_username" class="form-control">
                <span class="text-danger error_edit_username"></span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="edit_email" id="edit_email" class="form-control">
                <span class="text-danger error_edit_email"></span>
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="edit_password" id="edit_password" class="form-control">
                <span class="text-danger error_edit_password"></span>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" update-user="Update" id="btnEditUser" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-default btnCloseUser" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Category -->
<div class="modal fade" id="modalDelete" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Category</h4>
        <button type="button" id="d_modalClose" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="modal-title">Do you want to delete?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- footer -->
<?php require("../../includes/footer.php") ?>

<script>
  $("document").ready(function() {
    fetchUser()

    function fetchUser() {
      var actionSelect = "Select";
      $.ajax({
        url: "action.php",
        method: "GET",
        data: {actionSelect: actionSelect},
        success: function(data) {
          $('#result').html(data)
        }
      })
    }

    $(function() {
      $(document).on("click", ".view-user", function() {
        var id = $(this).attr('user-id')
        var actionView = $(this).attr("data")
        $.ajax({
          url: "action.php",
          method: "GET",
          data: {actionView: actionView, id: id},
          dataType: "json",
          success: function(data) {
            $("#id").val(data['id'])
            $("#username").val(data['username'])
            $("#email").val(data['email'])
            $("#password").val(data['password'])
          }
        })
      })

      $("#btnAddUser").click(function() {
        var username = $('#formUser').find('input[name="username"]').val()
        var email = $('#formUser').find('input[name="email"]').val()
        var password = $('#formUser').find('input[name="password"]').val()
        var actionCreate = $("#btnAddUser").text()
        errors = []
        if (!username) {
          $(".error_username").html("username cannot be empty")
          errors['username'] = false;
        } else {
          if (!username.match(/^[a-zA-Z0-9\s]{6,12}$/)) {
            $(".error_username").html("username must be 6-12 chars")
            errors['username'] = false;
          } else {
            $(".error_username").html("")
            errors['username'] = true;
          }
        }

        if(!email) {
          $(".error_email").html("email cannot be empty")
          errors['email'] = false;
        } else {
          if (!email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
            $(".error_email").html("email must be a valid email")
            errors['email'] = false;
          } else {
            $(".error_email").html("")
            errors['email'] = true;
          }
        }

        if(!password) {
          $(".error_password").html("password cannot be empty")
          errors['password'] = false;
        } else {
          if (!password.match(/^[a-zA-Z0-9\s]{8,20}$/)) {
            $(".error_password").html("password must be 8-20 chars")
            errors['password'] = false;
          } else {
            $(".error_password").html("")
            errors['password'] = true;
          }
        }
        
        if (errors['username'] && errors['email'] && errors['password']) {
          $('#modalAddUser').modal('toggle')
          $('#formUser').find('input[name="username"]').val('')
          $('#formUser').find('input[name="email"]').val('')
          $('#formUser').find('input[name="password"]').val('')
          $.ajax({
            url: "action.php",
            method: "POST",
            data: {username: username, email: email, password: password, actionCreate: actionCreate},
            success: function(data) {
              fetchUser()
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'User has created successfully!',
                showConfirmButton: false,
                timer: 1500
              })
            }
          })
        }
      })

      $(document).on("click", ".edit-user", function() {
        var id = $(this).attr('user-id')
        var actionView = $(this).attr("data")
        $('#formEditUser').find('input[name="edit_username"]').val("Hi")
        $.ajax({
          url: "action.php",
          method: "GET",
          data: {actionView: actionView, id: id},
          dataType: "json",
          success: function(data) {
            $('#formEditUser').find('input[name="edit_id"]').val(data['id'])
            $('#formEditUser').find('input[name="edit_username"]').val(data['username'])
            $('#formEditUser').find('input[name="edit_email"]').val(data['email'])
          }
        })
      })

      $("#btnEditUser").click(function() {
        var id = $('#formEditUser').find('input[name="edit_id"]').val()
        var username = $('#formEditUser').find('input[name="edit_username"]').val()
        var email = $('#formEditUser').find('input[name="edit_email"]').val()
        var password = $('#formEditUser').find('input[name="edit_password"]').val()
        var actionEdit = $(this).attr('update-user')

        errors = []

        if (!username) {
          $(".error_edit_username").html("username cannot be empty")
          errors['username'] = false;
        } 
        else {
          if (!username.match(/^[a-zA-Z0-9\s]{6,12}$/)) {
            $(".error_edit_username").html("username must be 6-12 chars")
            errors['username'] = false;
          } 
          else {
            $(".error_edit_username").html("")
            errors['username'] = true;
          }
        }

        if(!email) {
          $(".error_edit_email").html("email cannot be empty")
          errors['email'] = false;
        } 
        else {
          if (!email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
            $(".error_edit_email").html("email must be a valid email")
            errors['email'] = false;
          } 
          else {
            $(".error_edit_email").html("")
            errors['email'] = true;
          }
        }

        if(!password) {
          $(".error_edit_password").html("password cannot be empty")
          errors['password'] = false;
        } 
        else {
          if (!password.match(/^[a-zA-Z0-9\s]{8,20}$/)) {
            $(".error_edit_password").html("password must be 8-20 chars")
            errors['password'] = false;
          } 
          else {
            $(".error_edit_password").html("")
            errors['password'] = true;
          }
        }

        if (errors['username'] && errors['email'] && errors['password']) {
          $('#modalEditUser').modal('toggle')
          $('#formEditUser').find('input[name="edit_username"]').val('')
          $('#formEditUser').find('input[name="edit_email"]').val('')
          $('#formEditUser').find('input[name="edit_password"]').val('')
          $.ajax({
            url: "action.php",
            method: "POST",
            data: {username: username, email: email, password: password, actionEdit: actionEdit, id: id},
            success: function(data) {
              fetchUser()
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'User has saved successfully!',
                showConfirmButton: false,
                timer: 1500
              })
            }
          })
        }
      })

      $(document).on("click", ".delete-user", function () {
        var id = $(this).attr('user-id')
        var actionDelete = "Delete"
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "action.php",
              method: "POST",
              data: {actionDelete: actionDelete, id: id},
              success: function(data) {
                fetchUser()
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'User has deleted successfully!',
                  showConfirmButton: false,
                  timer: 1500
                })
              }
            })
            
          }
        })
      })
    })

    

    $(".btnCloseUser").click(function() {
      $(".error_username").html("")
      $(".error_email").html("")
      $(".error_password").html("")

      $(".error_edit_username").html("")
      $(".error_edit_email").html("")
      $(".error_edit_password").html("")
    })

  })
</script>
</html>