<?php
include "db.php";
session_start();
if(isset($_GET["pid"])){
   $pid=$_GET["pid"];
    
    $sql=$conn->prepare("delete from products where pid=?");
    $sql->bind_param("i",$pid);
    if($sql->execute()){
        echo "<script> 
        alert('Product Deleted Succesfully');
        window.location.href='delete.php';
        </script>";
        exit();
    }
    else{
        echo "Product Not Deleted";
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
                                <a class="nav-link" href="update.php">UPDATE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="delete.php">DELETE</a>
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
                    <td><a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="delete.php?pid=<?php echo $row["pid"]; ?>"
                        role="button"
                        
                        >DELETE</a
                    >
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div></main>
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
