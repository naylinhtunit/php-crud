<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - CRUD</title>
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    
    <?php
        require_once('process.php');
        // $conn = new mysqli('localhost', 'root', '939413', 'php-crud') or die(mysqli_error($conn));

        $result = $conn->query(" SELECT * FROM crud ") or die(mysqli_error($conn));
    ?>
    
    <div class="container">
        <!-- date show -->
        <div class="row g-3 align-items-center my-5">
            <form action="">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Location</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            while($data = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $data['id'] ?></th>
                            <td><?php echo $data['name'] ?></td>
                            <td><?php echo $data['age'] ?></td>
                            <td><?php echo $data['phone'] ?></td>
                            <td><?php echo $data['location'] ?></td>
                            <td>
                                <a href="index.php?edit=<?php echo $data['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                                <a href="process.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </form>
        </div>
        <!-- end data show -->
        <!-- create form -->
        <div class="row g-3 align-items-center my-5">
            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" value="<?php echo $name ?>" class="form-control" id="name">
                </div>
                <div class="form-group mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" name="age" value="<?php echo $age ?>" class="form-control" id="age">
                </div>
                <div class="form-group mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" value="<?php echo $phone ?>" class="form-control" id="phone">
                </div>
                <div class="form-group mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location" value="<?php echo $location ?>" class="form-control" id="location">
                </div>
                <?php if ($update === true) { ?>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                <?php }else{ ?>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <?php } ?>
            </form>
        </div>
        <!-- end create form -->
    </div>
</body>

</html>