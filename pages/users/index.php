<?php
  require("../../classes/user.php");
  $user = new User();
?>

<!DOCTYPE html>
<div>
<!-- head -->
<?php require("../../includes/head.php") ?>
<style>
  .text-danger {
    font-size: 16px;
  }

  .box-image {
    width: 100px;
    height: 100px;
    border: 1px solid #ccc;
    background-image: url("../../images/default_bg.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
    position: relative;
  }

  .box-image input {
    width: 100px;
    height: 100px;
    opacity: 0;
    cursor: pointer;
  }

  .box-delete-image {
    width: 20px;
    height: 20px;
    background-image: url("../../images/button_delete.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
    position: absolute;
    top: -10px;
    right: -10px;
    cursor: pointer;
  }

  .loading-image {
    width: 20px;
    height: 20px;
    background-image: url("../../images/loading.gif");
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
    position: absolute;
    top: 40px;
    left: 40px;
  }

  .editBox-image {
    width: 100px;
    height: 100px;
    border: 1px solid #ccc;
    background-image: url("../../images/default_bg.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
    position: relative;
  }

  .editBox-image input {
    width: 100px;
    height: 100px;
    opacity: 0;
    cursor: pointer;
  }

  .editBox-delete-image {
    width: 20px;
    height: 20px;
    background-image: url("../../images/button_delete.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
    position: absolute;
    top: -10px;
    right: -10px;
    cursor: pointer;
  }

  .editLoading-image {
    width: 20px;
    height: 20px;
    background-image: url("../../images/loading.gif");
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
    position: absolute;
    top: 40px;
    left: 40px;
  }
</style>

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
              <li class="breadcrumb-item"><a href="/a/admin">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
              <div class="card-title">
                <div class="float-left">
                  <h3 class="card-title">User List</h3>
                </div>
              </div>
              
              <div class="float-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddUser">
                  <i class="fa fa-plus"></i> Create New
                </button>
              </div>
            </div>
            
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover dataTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="result">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ./Main content -->
  </div>
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

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Image</label> <br>
                <img id="viewUserImage" src="" alt="" width="100">
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
<div class="modal fade" id="modalAddUser" style="display: none;" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create New User</h4>
        <button type="button" id="modalClose" class="close btnCloseUser" data-dismiss="modal" aria-label="Close">
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

            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                <span class="text-danger error_confirm_password"></span>
              </div>
            </div>

            <div class="">
              <label for="">Image</label>
              <div class="form-group box-image">
                <input type="file" name="image" id="image" class="image" class="form-control">
                <span class="text-danger error_image"></span><br>
              </div>
            </div>
          </div>
        </form>

        
      </div>
      <div class="modal-footer">
        <button type="button" id="btnAddUser" class="btn btn-primary">Create</button>
        <button type="button" class="btn btn-default btnCloseUser" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Edit User -->
<div class="modal fade" id="modalEditUser" style="display: none;" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
        <button type="button" id="modalClose" class="close btnCloseUser" data-dismiss="modal" aria-label="Close">
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

            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="edit_confirm_password" id="edit_confirm_password" class="form-control">
                <span class="text-danger error_edit_confirm_password"></span>
              </div>
            </div>
            
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label for="edit_image">Image</label>
                <input type="file" name="edit_image" id="edit_image" class="form-control">
                <span class="text-danger error_edit_image"></span><br>
                <img id="editUserImage" src="" alt="" width="100">
              </div>
            </div> -->

            <div class="">
              <label for="">Image</label>
              <div class="form-group box-image">
                <input type="file" name="image" id="image" class="image" class="form-control">
                <span class="text-danger error_edit_image"></span><br>
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

<!-- footer -->
<?php require("../../includes/footer.php") ?>

<script>
  $("document").ready(function() {
    fetchUser()

    function fetchUser(query) {
      var actionSelect = "Select";
      $.ajax({
        url: "action.php",
        method: "GET",
        data: {actionSelect: actionSelect, query: query},
        dataType: "json",
        success: function(data) {
          $("#result").html("")
          if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
              $("#result").append(
                "<tr>" +
                  "<td>" + data[i].id + "</td>" +
                  "<td>" + data[i].username + "</td>" +
                  "<td>" + data[i].email + "</td>" +
                  "<td>" + 
                    "<img src='../../images/" + data[i].image + "' width='50'>" +
                  "</td>" +
                  "<td>" + 
                    "<a href='#' class='btn btn-info view-user' data='View' user-id='" + data[i].id + "' data-toggle='modal' data-target='#modalViewUser'>" +
                      "<i class='fa fa-eye'> View</i>" +
                    "</a>" + "  " +
                    "<a href='#' class='btn btn-warning edit-user' data='View' user-id='" + data[i].id + "' data-toggle='modal' data-target='#modalEditUser'>" +
                      "<i class='fa fa-pen'> Edit</i>" +
                    "</a>" + "  " +
                    "<a href='#' class='btn btn-danger delete-user' data='View' user-id='" + data[i].id + "'>" +
                      "<i class='fa fa-trash'> Delete</i>" +
                    "</a>" +
                  "</td>" +
                "</tr>"
              )
            }
          }
          
          $("table").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
          })
        }
      })
    }

    

    $(function() {

      $(document).on("click", ".view-user", function() {
        var id = $(this).attr('user-id')
        var actionView = "View"
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
            $("#viewUserImage").attr("src", "/a/admin/images/" + data['image'])
          }
        })
      })

      function readURLAdd(input) {
        if (input.files && input.files[0]) {
          var deleteIcon = '<div class="box-delete-image"></div>'
          var loading = '<div class="loading-image"></div>'
          $('.box-image').append(loading)
          var reader = new FileReader();
          reader.onload = function (e) {
            $('.box-image').css({"background-image": "url(" + e.target.result + ")"})
            $('.box-image').append(deleteIcon)
            $('.box-image').find('.loading-image').remove()
          }
          reader.readAsDataURL(input.files[0])
        }
      }

      $(".image").change(function(){
        $(".error_image").html("")
        $(".error_edit_image").html("")
        readURLAdd(this);
      });

      $(".box-image").on("click", ".box-delete-image", function() {
        $('.box-image').css({"background-image": "url(../../images/default_bg.png)"})
        $('.box-image').find('.box-delete-image').remove()
      })

      $("#btnAddUser").click(function() {
        var username = $('#formUser').find('input[name="username"]').val()
        var email = $('#formUser').find('input[name="email"]').val()
        var password = $('#formUser').find('input[name="password"]').val()
        var confirmPassword = $('#formUser').find('input[name="confirm_password"]').val()
        var image = ($('input[type=file]')[0].files[0])
        
        var actionCreate = "Create"
        
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
        } 
        else {
          if (!email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
            $(".error_email").html("email must be a valid email")
            errors['email'] = false;
          } 
          else {
            $(".error_email").html("")
            errors['email'] = true;
          }
        }

        if(!password) {
          $(".error_password").html("password cannot be empty")
          errors['password'] = false
          $('#formUser').find('input[name="confirm_password"]').val('')
          $(".error_confirm_password").html("")
        } 
        else {
          if (!password.match(/^[a-zA-Z0-9\s]{8,}$/)) {
            $(".error_password").html("Password must be 8 chars or more for you password")
            errors['password'] = false
            $('#formUser').find('input[name="confirm_password"]').val('')
            $(".error_confirm_password").html("")
          } 
          else {
            $(".error_password").html("")
            errors['password'] = true
            if (!confirmPassword) {
              $(".error_confirm_password").html("Confirm your password")
              $('#formUser').find('input[name="confirm_password"]').val('')
              errors['confirm_password'] = false
            }
            else {
              if (confirmPassword != password) {
                $(".error_confirm_password").html("Those passwords didn't match. Try again.")
                $('#formUser').find('input[name="confirm_password"]').val('')
                errors['confirm_password'] = false
              }
              else {
                $(".error_confirm_password").html("")
                errors['confirm_password'] = true
              }
            }
          }
        }
        
        if (!image) {
          $(".error_image").html("please select image")
          errors['image'] = false
        } 
        else {
          
          var imageName = image.name
          var imageExtension = image.name.split('.').pop().toLowerCase()
          var imageSize = image.size
          if (jQuery.inArray(imageExtension, ['gif', 'jpg', 'png', 'jpeg']) != -1) {
            if (imageSize < 1000000) {
              $(".error_image").html("")
              errors['image'] = true
            }
            else {
              $(".error_image").html("Your file is too big!")
              errors['image'] = false
            }
          }
          else {
            $(".error_image").html("You cannot upload files of this type!")
            errors['image'] = false
          }
        }

        var form = $('#formUser')[0]
        var data = new FormData(form)
        data.append('username', username)
        data.append('email', email)
        data.append('password', password)
        data.append('confirmPassword', confirmPassword)
        data.append('image', image)
        data.append('actionCreate', actionCreate)
        
        if (errors['username'] && errors['email'] && errors['password'] && errors['confirm_password'] && errors['image']) {
          $('#modalAddUser').modal('toggle')
          $('#formUser').find('input[name="username"]').val('')
          $('#formUser').find('input[name="email"]').val('')
          $('#formUser').find('input[name="password"]').val('')
          $('#formUser').find('input[name="confirm_password"]').val('')
          $('#formUser').find('input[name="image"]').val('')
          $('.box-image').find('.box-delete-image').remove()
          $('.box-image').css({"background-image": "url(../../images/default_bg.png)"})

          $.ajax({
            url: "action.php",
            method: "POST",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function(data) {
              $("table").DataTable().destroy()
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
        var deleteIcon = '<div class="box-delete-image"></div>'

        $.ajax({
          url: "action.php",
          method: "GET",
          data: {actionView: actionView, id: id},
          dataType: "json",
          success: function(data) {
            $('#formEditUser').find('input[name="edit_id"]').val(data['id'])
            $('#formEditUser').find('input[name="edit_username"]').val(data['username'])
            $('#formEditUser').find('input[name="edit_email"]').val(data['email'])
            $('.box-image').css({"background-image": "url(../../images/" + data['image'] + ")"})
            // $('#formEditUser').find('input[type="file"]').val(data['image'])
            $('.box-image').append(deleteIcon)
           
            $("#editUserImage").attr("src", "/a/admin/images/" + data['image'])
          }
        })
      })

      $("#btnEditUser").click(function() {
        var id = $('#formEditUser').find('input[name="edit_id"]').val()
        var username = $('#formEditUser').find('input[name="edit_username"]').val()
        var email = $('#formEditUser').find('input[name="edit_email"]').val()
        var password = $('#formEditUser').find('input[name="edit_password"]').val()
        var confirmPassword = $('#formEditUser').find('input[name="edit_confirm_password"]').val()
        var image = $('#formEditUser').find('input[name=image]')[0].files[0]
        var actionEdit = "Edit"
        console.log(image)

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
          errors['password'] = false
          $('#formEditUser').find('input[name="edit_confirm_password"]').val('')
          $(".error_confirm_password").html("")
        } 
        else {
          if (!password.match(/^[a-zA-Z0-9\s]{8,}$/)) {
            $(".error_edit_password").html("Password must be 8 chars or more for you password")
            errors['password'] = false
            $('#formEditUser').find('input[name="edit_confirm_password"]').val('')
            $(".error_edit_confirm_password").html("")
          } 
          else {
            $(".error_edit_password").html("")
            errors['password'] = true
            if (!confirmPassword) {
              $(".error_edit_confirm_password").html("Confirm your password")
              $('#formEditUser').find('input[name="edit_confirm_password"]').val('')
              errors['confirm_password'] = false
            }
            else {
              if (confirmPassword != password) {
                $(".error_edit_confirm_password").html("Those passwords didn't match. Try again.")
                $('#formEditUser').find('input[name="edit_confirm_password"]').val('')
                errors['confirm_password'] = false
              }
              else {
                $(".error_edit_confirm_password").html("")
                errors['confirm_password'] = true
              }
            }
          }
        }

        if (!image) {
          $(".error_edit_image").html("please select image")
          errors['image'] = false
        } 
        else {
          var imageName = image.name
          var imageExtension = image.name.split('.').pop().toLowerCase()
          var imageSize = image.size
          if (jQuery.inArray(imageExtension, ['gif', 'jpg', 'png', 'jpeg']) != -1) {
            if (imageSize < 1000000) {
              $(".error_edit_image").html("")
              errors['image'] = true
            }
            else {
              $(".error_edit_image").html("Your file is too big!")
              errors['image'] = false
            }
          }
          else {
            $(".error_edit_image").html("You cannot upload files of this type!")
            errors['image'] = false
          }
        }

        var form = $('#formEditUser')[0]
        var data = new FormData(form)
        
        data.append('id', id)
        data.append('username', username)
        data.append('email', email)
        data.append('password', password)
        data.append('confirmPassword', confirmPassword)
        data.append('image', image)
        data.append('actionEdit', actionEdit)

        if (errors['username'] && errors['email'] && errors['password'] && errors['confirm_password'] && errors['image']) {
          $('#modalEditUser').modal('toggle')
          $('#formEditUser').find('input[name="edit_username"]').val('')
          $('#formEditUser').find('input[name="edit_email"]').val('')
          $('#formEditUser').find('input[name="edit_password"]').val('')
          $('#formEditUser').find('input[name="edit_confirm_password"]').val('')
          $('#formEditUser').find('input[name="edit_image"]').val('')

          $.ajax({
            url: "action.php",
            method: "POST",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function(data) {
              console.log(data)
              $("table").DataTable().destroy()
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
                $("table").DataTable().destroy()
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

      $("#searchUser").keyup(function() {
        var search = $(this).val()
        if (search) {
          fetchUser(search)
        }
        else {
          fetchUser()
        }
      })
    })

    $(".btnCloseUser").click(function() {
      $(".error_username").html("")
      $(".error_email").html("")
      $(".error_password").html("")
      $(".error_image").html("")

      $(".error_edit_username").html("")
      $(".error_edit_email").html("")
      $(".error_edit_password").html("")

      $('#formUser').find('input[name="image"]').val('')
      $('#formEditUser').find('input[name="edit_image"]').val('')
      $('.box-image').css({"background-image": "url(../../images/default_bg.png)"})
      $('.box-image').find('.box-delete-image').remove()
    })

  })
</script>
</div>