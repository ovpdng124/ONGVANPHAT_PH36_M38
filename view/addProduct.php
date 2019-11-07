<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <link rel="stylesheet" href="view/bootstrap4/css/bootstrap.min.css">
    <script src="view/bootstrap4/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center">Create a new product</h1>
    <form action="" method="post">
        <div class="row">
            <button type="submit" class="container my-1 btn btn-primary" name="action" value="index"><b>Show list product</b></button>
        </div>
    </form>
    <form action="" method="post">
        <div class="row">
            <label class="font-weight-bold col-form-label col-2">Code: </label>
            <input type="text" class="my-1 col-10 form-control" name="code"
                   value="<?php if (!empty($dataForm)) echo $dataForm['code']; ?>" placeholder="Code" required>
            <label class="font-weight-bold col-form-label col-2">Name: </label>
            <input type="text" class="my-1 col-10 form-control" name="name"
                   value="<?php if (!empty($dataForm)) echo $dataForm['name']; ?>" placeholder="Name" required>
            <label class="font-weight-bold col-form-label col-2">Description: </label>
            <input type="text" class="my-1 col-10 form-control" name="description"
                   value="<?php if (!empty($dataForm)) echo $dataForm['description']; ?>" placeholder="Description">
            <label class="font-weight-bold col-form-label col-2">Price: </label>
            <input type="number" class="my-1 col-10 form-control" name="price"
                   value="<?php if (!empty($dataForm)) echo $dataForm['price'];; ?>"
                   placeholder="Price" required>
            <button type="submit" class="col-2  container my-1 btn btn-primary" name="action" value="addProduct"><b>Add
                    new product</b></button>
        </div>
    </form>

</div>
</body>
</html>