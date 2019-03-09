<?php include 'includes/header.php'; ?>
<?php
use App\classes\Category;
$message="";

if(isset($_POST['btn']))
{
    $category=new Category();
    $message=$category->insertCategory($_POST);
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
                                    <input type="text" name="category_name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                                <div class="col-sm-9">
                                    <textarea name="category_description" class="form-control"></textarea>
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
                                    <button type="submit" name="btn" class="btn btn-primary btn-block">Save Category Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






<?php include 'includes/footer.php'; ?>