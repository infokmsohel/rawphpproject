<?php
namespace App\classes;
use App\classes\Database;
class Category
{
    public function insertCategory($data)
      {
          $sql="INSERT INTO categories(
category_name ,category_description,
publication_status ) VALUES('$data[category_name]','$data[category_description]','$data[publication_status]')";

          if(mysqli_query(Database::dbConnection(),$sql))
          {
              $message="Category Insert Successfully";
              return $message;

          }

          else{
              die('Query Problem'.mysqli_error(Database::dbConnection()));
          }

      }

    public function getAllCategoryInfo()
      {
          $sql="SELECT * FROM categories";
          if(mysqli_query(Database::dbConnection(),$sql))
          {
              $queryResult=mysqli_query(Database::dbConnection(),$sql);
              return $queryResult;
          }

          else{
              die('Query Problem'.mysqli_error(Database::dbConnection()));
          }

      }


      public function editCategory($id)
      {
          $sql="SELECT * FROM categories WHERE id='$id'";
          if(mysqli_query(Database::dbConnection(),$sql))
          {
              $queryResult=mysqli_query(Database::dbConnection(),$sql);
              return $queryResult;
          }

          else{
              die('Query Problem'.mysqli_error(Database::dbConnection()));
          }

      }

      public function updateCategoryInfo($data)
      {
          $sql="UPDATE categories SET category_name ='$data[category_name]',category_description 
='$data[category_description]',publication_status='$data[publication_status]' WHERE id='$data[categoryId]'";

          if(mysqli_query(Database::dbConnection(),$sql))
          {
              $message="Category Update Successfully";
              return $message;

          }

          else{
              die('Query Problem'.mysqli_error(Database::dbConnection()));
          }
      }

    public function deleteCategoryById($data){
        $sql="DELETE FROM categories WHERE id='$data';";
        if (  mysqli_query(Database::dbConnection(),$sql)){

            header('location:manage-category.php');
        }else{
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }

      public function allPublishedCategoryInfo()
      {
          $sql="SELECT * FROM categories WHERE 	publication_status=1";
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