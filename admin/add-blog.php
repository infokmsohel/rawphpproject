<?php include 'includes/header.php'; ?>
<?php
use App\classes\Category;
use App\classes\Blog;

$message="";
$category=new Category();
  $queryResultCategory=$category->allPublishedCategoryInfo();

  if(isset($_POST['btn']))
  {
      $blog=new Blog();
      $message=$blog->addBlogInfo($_POST);
  }

?>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <?php echo $message; ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="category_id">
<!--                                        <option>---Select Category Name---</option>-->
<!--                                        <option value="1">Category One</option>-->

                                        <?php while($category=mysqli_fetch_assoc($queryResultCategory)){ ?>
                                        <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name']; ?></option>
                                     <?php } ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Blog Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="blog_title" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea name="short_description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                                <div class="col-sm-9">
                                    <textarea name="long_description" class="form-control textarea"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Blog Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="blog_image"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Publication status</label>
                                <div class="col-sm-9">
                                    <input type="radio" name="publication_status" value="1"> Published
                                    <input type="radio" name="publication_status" value="0"> Unpublished
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" name="btn" class="btn btn-primary btn-block">Save Blog Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






<?php include 'includes/footer.php'; ?>