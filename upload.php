<?php
  if (isset($_POST['add'])) {
    $file = $_FILES['image'];
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
          $fileDestination = 'images/' . $fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          echo "Upload";
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
?>