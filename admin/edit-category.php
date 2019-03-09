<?php include 'includes/header.php'; ?>
<?php
use App\classes\Category;
$message="";

   $category=new Category();
   $id=$_GET['id'];
   $queryResultCategory=$category->editCategory($id);
   $category=mysqli_fetch_assoc($queryResultCategory);

if(isset($_POST['btn']))
{
    $category=new Category();
   $message=$category->updateCategoryInfo($_POST);
   header('Location:manage-category.php');
}
?>
    <div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <?php echo $message; ?>
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo $category['category_name']; ?>" name="category_name" class="form-control"/>
                                <input type="hidden" name="categoryId" value="<?php echo $category['id']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                            <div class="col-sm-9">
                                <textarea name="category_description" class="form-control"><?php echo $category['category_description']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Publication status</label>
                            <div class="col-sm-9">
                                <input type="radio" name="publication_status" value="1"<?php echo $category['publication_status']==1?'checked':'' ?>> Published
                                <input type="radio" name="publication_status" value="0" <?php echo $category['publication_status']==0?'checked':'' ?>> Unpublished
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" name="btn" class="btn btn-info btn-block">Update Category Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






<?php include 'includes/footer.php'; ?>