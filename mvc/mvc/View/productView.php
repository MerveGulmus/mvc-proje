<!doctype html>
<html lang="en">
<head>
    <title>Ürün Sistemi</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container" style="padding: 30px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Dosya Yükle
                </div>
                <div class="card-body">
                    <?php
                    session_start();
                    if (isset($_SESSION['message'])){ ?>
                        <div class="alert alert-success"> <?php echo $_SESSION['message']; ?></div>
                    <?php unset($_SESSION['message']); } ?>
                    <form action="kaydet" method="post" enctype="multipart/form-data">
                        <input type="file" required class="form-control" name="file"><br>
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Dosya Çıktısı
                </div>
                <div class="card-body">
                    <a href="download/json" id="JSON" class="btn btn-warning btn-sm">JSON</a>
                    <a href="download/xml" id="XML" class="btn btn-warning btn-sm">XML</a>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="card">
            <div class="card-header">Sistemdeki Ürünler
            </div>
            <div class="card-body">
                <table id="example" class="table display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['category']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>


</html>
