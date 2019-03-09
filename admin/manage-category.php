<?php include 'includes/header.php'; ?>
<?php
use App\classes\Category;
$category=new Category();
$queryResult=$category->getAllCategoryInfo();
if (isset($_GET['delete'])){
    $id=$_GET['id'];
    Category::deleteCategoryById($id);
}
?>
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">SL NO</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">Publication Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;  ?>
                        <?php while($category=mysqli_fetch_assoc($queryResult)) {?>

                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $category['category_name']; ?></td>
                            <td><?php echo $category['category_description']; ?></td>
                            <td><?php echo $category['publication_status']==1?'Published':'Unpublished';?></td>
                            <td>
                                <a href="edit-category.php?id=<?php echo $category['id']; ?>">Edit</a>
                                <a href="?delete=true&id=<?php echo $category['id']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
