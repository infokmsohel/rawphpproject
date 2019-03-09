<?php include 'includes/header.php'; ?>
<?php

use App\classes\Blog;
$queryResult=Blog::getAllBlogInfo();

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
                            <th scope="col">Short Description</th>
                            <th scope="col">Publication Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        <?php while ($result=mysqli_fetch_assoc($queryResult)) { ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $result['category_name']; ?></td>
                            <td><?php echo $result['short_description']; ?></td>
                            <td><?php echo $result['publication_status']; ?></td>
                            <td>
                                <a href="">Edit</a>
                                <a href="">Delete</a>
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
