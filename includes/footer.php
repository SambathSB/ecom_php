<footer class="main-footer">
  <strong
    >Copyright &copy; 2014-2019
    <a href="http://adminlte.io">AdminLTE.io</a>.</strong
  >
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.0-beta.2
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/jquery.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge("uibutton", $.ui.button)
  </script>
  

  
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/bootstrap.bundle.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/Chart.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/sparkline.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/jquery.vmap.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/jquery.vmap.world.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/jquery.knob.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/moment.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/daterangepicker.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/summernote-bs4.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/jquery.overlayScrollbars.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/fastclick.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/adminlte.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/dashboard.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/demo.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/sweetalert2.all.minjs"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/sweetalert2.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/jquery.dataTables.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/a/admin/js/dropzone.js"></script>
  
  
  <script>
    $(document).ready(function() {
      $("#btnAdd").click(function() {  
        var type = $("#type").val()
        $.ajax({
          url: "http://localhost:8000/api/category",
          method: "POST",
          data: {type: type},
          success: function() {
            $("#modalClose").click()
            $("#type").val("")
            init()
          }
        })
      })

      function init() {
        $.ajax({
                      type: "GET",
                      url: "http://localhost:8000/api/category",
                      success: function(response) {
                          var tableBody = $("#tableCategory")
                          for (var i = 0; i < response.data.length; i++) {
                              tableBody.append(
                                  "<tr>" +
                                  "<td>" +
                                  response.data[i].id +
                                  "</td>" +
                                  "<td>" +
                                  response.data[i].type +
                                  "</td>" +
                                  "<td>" +
                                  "<a href='#' class='updateCategory btn btn-info' catID='" +
                                  response.data[i].id +
                                  "' catType='" +
                                  response.data[i].type +
                                  "'>Edit</a>" +
                                  "<a href='#' class='deleteCategory btn btn-danger ml-2' catID='" +
                                  response.data[i].id +
                                  "'>Delete</a>" +
                                  "</td>" +
                                  "</tr>")
                                  }

                          $(".deleteCategory").click(function() {
                              var catID = $(this).attr("catID")
                              
                              $("#modalDelete").modal("show")
                              
                              $("#btnDelete").click(function() {
                                
                                alert(catID)
                                  // $.ajax({
                                  //     type: "DELETE",
                                  //     url:
                                  //         "$("#modalDelete").modal("show")" +
                                  //         catID,
                                  //     success: function(response) {
                                  //         $("#d_modalClose").click()
                                  //         init()
                                  //     }
                                  // })
                              })
                              return false
                          })

                          $(".updateCategory").click(function() {
                              var catID = $(this).attr("catID")
                              var catType = $(this).attr("catType")
                              $("#modalUpdate").modal("show")
                              $("#updateType").val(catType)
                              $("#modalUpdateCategory").click(function() {
                                  var updateType = $("#updateType").val()
                                  alert(1)
                                  // $.ajax({
                                  //     url:
                                  //         "http://localhost:8000/api/category/" +
                                  //         catID,
                                  //     method: "PUT",
                                  //     data: {type: updateType},
                                  //     dataType: 'JSON',
                                  //     success: function(response) {
                                  //         init()
                                  //         $("#u_closeCategory").click()
                                  //     },
                                  //     error: function(error) {
                                  //         alert(error)
                                  //     }
                                  // })
                              })
                          })
                      }
                  })
                  
      }
      init();
    });
  </script>

</body>
