<?php 
  require("../../classes/user.php");
  $user = new User();
  
  if (array_key_exists("actionSelect", $_GET)) {
    if (isset($_GET['query']) == null) {
      $result = $user->all()->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
      $searchUsername = $_GET['query'];
      $result = $user->findByUsername($searchUsername)->fetchAll(PDO::FETCH_ASSOC);
    }

    echo json_encode($result);
  }
  
  if (array_key_exists("actionCreate", $_POST)) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user->insert($username, $email, $password);
    echo "Inserted";

    $file = $_FILES['image'];
    if ($_FILES['image']['name'] != "") {
      $fileName = $_FILES['image']['name'];
      $fileTmpName = $_FILES['image']['tmp_name'];
      $fileSize = $_FILES['image']['size'];
      $fileError = $_FILES['image']['error'];
      $fileType = $_FILES['image']['type'];
      $fileExtention = explode('.', $fileName);
      $fileActualExtention = strtolower(end($fileExtention));
      $allowed = array('jpg', 'jpeg', 'png', 'pdf');
      if (in_array($fileActualExtention, $allowed)) {
        if ($fileError === 0) {
          if ($fileSize < 1000000) {
            $fileNameNew = uniqid('', true) . "." .$fileActualExtention;
            $fileDestination = '../../images/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
          }
          else {
            print_r("Your file is too big!");
          }
        }
        else {
          print_r("There was an error uploading your file!");
        }
      } 
      else {
        print_r("You cannot upload files of this type!");
      }
    }
  }
  
  if (array_key_exists("actionView", $_GET)) {
    $id = $_GET['id'];
    $result = $user->find($id);
    $row = $result->fetchObject();
    echo json_encode($row);
  }
  
  if (array_key_exists("actionEdit", $_POST)) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user->update($username, $email, $password, $id);
    echo "Updated";
  }

  if (array_key_exists("actionDelete", $_POST)) {
    $id = $_POST['id'];
    $user->delete($id);
    echo "Deleted";
  }

?>