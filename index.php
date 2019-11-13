<!DOCTYPE html>
<html>
  <!-- head -->
  <?php require("includes/head.php") ?>

  <div class="wrapper">
    
    <!-- nav -->
    <?php require("includes/nav.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                      Add
                    </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div
                  id="example2_wrapper"
                  class="dataTables_wrapper dt-bootstrap4"
                >
                  <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <table
                        id="example2"
                        class="table table-bordered table-hover dataTable"
                        role="grid"
                        aria-describedby="example2_info"
                      >
                        <thead>
                          <tr role="row">
                            <th
                            >
                              ID
                            </th>
                            <th
                            >
                              Type
                            </th>
                            <th
                            >
                              Action
                            </th>
                          </tr>
                        </thead>
                        <tbody id="tableCategory">
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-5">
                      <div
                        class="dataTables_info"
                        id="example2_info"
                        role="status"
                        aria-live="polite"
                      >
                        Showing 1 to 10 of 57 entries
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                      <div
                        class="dataTables_paginate paging_simple_numbers"
                        id="example2_paginate"
                      >
                        <ul class="pagination">
                          <li
                            class="paginate_button page-item previous disabled"
                            id="example2_previous"
                          >
                            <a
                              href="#"
                              aria-controls="example2"
                              data-dt-idx="0"
                              tabindex="0"
                              class="page-link"
                              >Previous</a
                            >
                          </li>
                          <li class="paginate_button page-item active">
                            <a
                              href="#"
                              aria-controls="example2"
                              data-dt-idx="1"
                              tabindex="0"
                              class="page-link"
                              >1</a
                            >
                          </li>
                          <li class="paginate_button page-item ">
                            <a
                              href="#"
                              aria-controls="example2"
                              data-dt-idx="2"
                              tabindex="0"
                              class="page-link"
                              >2</a
                            >
                          </li>
                          <li class="paginate_button page-item ">
                            <a
                              href="#"
                              aria-controls="example2"
                              data-dt-idx="3"
                              tabindex="0"
                              class="page-link"
                              >3</a
                            >
                          </li>
                          <li class="paginate_button page-item ">
                            <a
                              href="#"
                              aria-controls="example2"
                              data-dt-idx="4"
                              tabindex="0"
                              class="page-link"
                              >4</a
                            >
                          </li>
                          <li class="paginate_button page-item ">
                            <a
                              href="#"
                              aria-controls="example2"
                              data-dt-idx="5"
                              tabindex="0"
                              class="page-link"
                              >5</a
                            >
                          </li>
                          <li class="paginate_button page-item ">
                            <a
                              href="#"
                              aria-controls="example2"
                              data-dt-idx="6"
                              tabindex="0"
                              class="page-link"
                              >6</a
                            >
                          </li>
                          <li
                            class="paginate_button page-item next"
                            id="example2_next"
                          >
                            <a
                              href="#"
                              aria-controls="example2"
                              data-dt-idx="7"
                              tabindex="0"
                              class="page-link"
                              >Next</a
                            >
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- ./wrapper -->

  <!-- Add Category -->
  <div class="modal fade" id="modalAdd" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Category</h4>
            <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="type">Type</label>
              <input type="text" name="type" id="type" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnAdd" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
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
  <?php require("includes/footer.php") ?>
</html>
