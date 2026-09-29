<?php
include("db.php");
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $pname=$_POST["pname"];
    $category=$_POST["category"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $brand=$_POST["brand"];
    $description=$_POST["description"];
    
    $sql=$conn->prepare("insert into products (pname,category,price,quantity,brand,description) values (?,?,?,?,?,?)");
    $sql->bind_param("ssdiss",$pname,$category,$price,$quantity,$brand,$description);
    if($sql->execute()){
        echo "<script> 
        alert('Product Added Succesfully');
        </script>";
    }
    else{
        echo "Product Not Added";
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
                                <a class="nav-link active" href="insert.php">
                                    ADD
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="update.php">UPDATE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="delete.php">DELETE</a>
                            </li>
                            
                        </ul>
                       <form class="d-flex my-2 my-lg-0" action="logout.php">
    <button 
        type="submit" 
        class="btn btn-primary"
    >
        Logout
    </button>
</form>

<form class="d-flex my-2 my-lg-0 ms-4" action="csv.php">
    <button 
        type="submit" 
        class="btn btn-primary"
    >
        CSV
    </button>
</form>
                    </div>
                </div>
             </nav>
 
        </header>
        <main>
        

        <h1 class="text-center">
                Add Products
            </h1>
            <div
                class="container col-7 mt-5 border rounded shadow"
            >
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Product Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="pname"
                            id=""
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
            
    
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
