<?php
namespace App\classes;
use App\classes\Database;
class Blog
{
    public function addBlogInfo($data)
  {
      $imageName=$_FILES['blog_image']['name'];
      $directory='../assets/images/';
      $imageUrl=$directory.$imageName;

      $fileType= pathinfo($imageUrl,PATHINFO_EXTENSION);
      $fileSize=$_FILES['blog_image']['size'];
      $check=getimagesize($_FILES['blog_image']['tmp_name']);

      if ($check){

          if (file_exists($imageUrl)){
              die('file already exist');
          }else{

              if ($fileSize>1048576){
                  die('Please select image less than 1 mb');
              }else{
                  if ($fileType !='jpg' && $fileType !='png'){
                      die('please select jpg or png image');
                  }else{
                      move_uploaded_file($_FILES['blog_image']['tmp_name'],$imageUrl);

                      $sql="INSERT INTO blogs(category_id, blog_title, short_description, long_description, blog_image, publication_status) VALUES('$data[category_id]','$data[blog_title]','$data[short_description]','$data[long_description]', '$imageUrl', '$data[publication_status]')";

                      if(mysqli_query(Database::dbConnection(),$sql))
                      {
                          $message="Blog Information Inserted Successfully";
                          return $message;

                      }

                      else{
                          die('Query Problem'.mysqli_error(Database::dbConnection()));
                      }
                  }
              }
          }

      }else{
          die('please select a valid image');
      }
  }

    public function getAllBlogInfo()
    {
        $sql="SELECT b.*,c.category_name FROM blogs as b, categories as c WHERE b.category_id=c.id";
        if(mysqli_query(Database::dbConnection(),$sql))
        {
            $queryResult=mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
        }
        else{
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
}