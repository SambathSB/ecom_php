<?php 
  require("../../classes/user.php");
  $user = new User();
  
  if (array_key_exists("actionSelect", $_GET)) {
    $output = "";
    $result = $user->all()->fetchAll(PDO::FETCH_ASSOC);
    $output .= 
      '
        <thead>
          <tr role="row">
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
      ';
    if (count($result) > 0) {
      foreach($result as $row) {
        $output .= 
        '
        <tbody id="tableCategory">
          <tr>
            <td>' . $row["id"] . '</td>
            <td>' . $row["username"] . '</td>
            <td>' . $row["email"] . '</td>
            <td>
              <a href="#" class="btn btn-info view-user" data="View" user-id="'. $row["id"] . '" data-toggle="modal" data-target="#modalViewUser">
                <i class="fa fa-eye"></i> View
              </a>
              <a href="#" class="btn btn-warning edit-user" data="View" user-id="'. $row["id"] . '" data-toggle="modal" data-target="#modalEditUser">
                <i class="fa fa-pen"></i> Edit
              </a>
              <a href="#" class="btn btn-danger delete-user" data="View" user-id="'. $row["id"] . '">
                <i class="fa fa-trash"></i> Delete
              </a>
            </td>
          </tr>
        </tbody>
        ';
      }
    } else {
      $output .= 
      '
        <tr>
          <td colspan="4">Data not found</td>
        </tr>
      ';
    }
    echo $output;
  }
  
  if (isset($_POST['actionCreate']) == "Create") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user->insert($username, $email, $password);
    echo "Inserted";
  } 
  
  if (isset($_GET['actionView']) == "View") {
    $id = $_GET['id'];
    $result = $user->find($id);
    $row = $result->fetchObject();
    echo json_encode($row);
  }
  
  if (isset($_POST['actionEdit']) == "Update") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user->update($username, $email, $password, $id);
    echo "Updated";
  }

  if (isset($_POST['actionDelete']) == "Delete") {
    $id = $_POST['id'];
    $user->delete($id);
    echo "Deleted";
  }

?>