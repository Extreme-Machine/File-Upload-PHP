<?php
   if(isset($_FILES['file'])){
      $errors = array();
      $file_name = $_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];
      $ext_tmp = explode('.',$_FILES['file']['name']);
      $file_ext = strtolower(end($ext_tmp));
      
      $extensionsAllowed = array("jpeg","jpg","png","zip","rar");
      
      if(in_array($file_ext,$extensionsAllowed)=== false){
         $errors[]="File Not Allowed!";
      }
      
      // if($file_size > 2097152){
      //    $errors[]='File size must be excately 2 MB';
      // }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp, "../uploads/".$file_name);
         echo $file_name;
         echo $file_size;
         echo "Success";
      }else{
          echo "There seems to be an error!";
      }
   }
?>