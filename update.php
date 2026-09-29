<?php
include("db.php");
if(isset($_GET["pid"])){
    $pid=$_GET["pid"];
    $sql=$conn->prepare("select pname,category,price,quantity,brand, description from products where pid=?");
    $sql->bind_param("i",$pid);
    $sql->execute();
    $sql->bind_result($n,$c,$p,$q,$b,$d);
    $sql->fetch();
    $sql->close();
}
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $pname=$_POST["pname"];
    $category=$_POST["category"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $brand=$_POST["brand"];
    $description=$_POST["description"];
    $pid=$_POST["pid"];
    
    $sql=$conn->prepare("update products set pname=?,category=?,price =?,quantity=?,brand =?,description=? where pid =?");
    $sql->bind_param("ssdissi",$pname,$category,$price,$quantity,$brand,$description,$pid);
if($sql->execute()){ 
    echo "<script>
        alert('Product Updated Successfully');
        window.location.href = 'update.php';
    </script>";
    exit();
}
    else{
      echo "<script> 
        alert('Product Not Updated');
        </script>";
    }
    
}
?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
             <nav
                class="navbar navbar-expand-sm navbar-dark bg-dark"
             >
                <div class="container">
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link " href="home.php" aria-current="page"
                                    >Home
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="insert.php">
                                    ADD
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="update.php">UPDATE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="delete.php">DELETE</a>
                            </li>
                            
                        </ul>
                        <form class="d-flex my-2 my-lg-0 " action="logout.php" >
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Logout
                            </button>
                            
                        </form>
                        <form class="d-flex my-2 my-lg-0 ms-4 " action="csv.php" >
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Logout
                            </button>
                            
                        </form>
                    </div>
                </div>
             </nav>
 
        </header>
        <main>
            <?php
    $result=$conn->query("select *from products");
    ?>
    <div
        class="table-responsive"
    >
        <table
            class="table table-primary mt-5"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">BRAND</th>
                    <th scope="col">DESC</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            
            <tbody>
                
                    <?php 
                    
                    while($row=$result->fetch_assoc()){?>
                    <tr class="">
                    <td scope="row"><?php echo $row["pid"]; ?></td>
                    <td><?php echo $row["pname"]; ?></td>
                    <td><?php echo $row["category"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["quantity"]; ?></td>
                    <td><?php echo $row["brand"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td>
            <a 
    href="update.php?pid=<?php echo $row["pid"]; ?>" 
    class="btn btn-primary"
>
    UPDATE
</a>
               
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
   
                    <div
                        class="modal fade"
                        id="updateModal"
                        tabindex="-1"
                        data-bs-backdrop="static"
                        data-bs-keyboard="false"
                        
                        role="dialog"
                        aria-labelledby="modalTitleId"
                        aria-hidden="true"
                    >
                        <div
                            class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                            role="document"
                        >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Update Products
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>
                                </div>
                                <div class="modal-body"> <div
                class="container col-7 mt-5 border rounded shadow"
            >
                <form action="" method="post">
                    <div class="mb-3">
                         <input
                            type="hidden"
                            class="form-control"
                            name="pid"
                            id=""
                            value="<?php echo $pid;?>"
                            >
              
                        <label for="" class="form-label">Product Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="pname"
                            id=""
                            value="<?php echo $n;?>"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <input
                            type="text"
                            class="form-control"
                            name="category"
                            id=""
                            value="<?php echo $c;?>"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input
                            type="number"
                            class="form-control"
                            name="price"
                            id=""
                            value="<?php echo $p;?>"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Quantity</label>
                    <input
                        type="text"
                        class="form-control"
                        name="quantity"
                        id=""
                        value="<?php echo $q;?>"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    
                  </div>
                  
                    <div class="mb-3">
                        <label for="" class="form-label">Brand</label>
                        <input
                            type="text"
                            class="form-control"
                            name="brand"
                            id=""
                            value="<?php echo $b;?>"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <input
                            type="text"
                            class="form-control"
                            name="description"
                            id=""
                            value="<?php echo $d;?>"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
                    </button>
                    
                </form>
            </div>
            </div>
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal"
                                    >
                                        Close
                                    </button>
                                       </div>
                            </div>
                        </div>
                    </div>
                    

                 
              
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        >


    </script>
    <script>

<?php if(isset($_GET["pid"])) { ?>



        const modalElement = document.getElementById("updateModal");

        const modal = new bootstrap.Modal(modalElement);

        modal.show();

    

<?php } ?>

</script>
    </body>
</html>
