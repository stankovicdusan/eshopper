<?php

if(isset($_SESSION['user'])){
    if($_SESSION['user']->uloga_id != 2){
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}

?>

<div class="container">
    <div class="row">
        <div>
            <div class="col-sm-9">
                <ul class="nav navbar-nav">
                    <li><a href="#" class="productsClick text-dark">Products</a></li>
                    <li><a href="#" class="categoriesClick text-dark">Categories</a></li>
                    <li><a href="#" class="usersClick text-dark">Users</a></li>
                </ul>
            </div>
        </div>

        <div class="products">
            <div class="content">
                <div class="container-fluid">
                    <div class="col-sm-8 links">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-hover productsTable">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Alt</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Change</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody id="contentProd">
                                    <?php
                                    require_once (__DIR__ . "/../config/connection.php");
                                    require_once (__DIR__ . "/../models/products/functions.php");

                                    $products = allProductsWithCat();
                                    $count = 1;
                                    foreach($products as $p) :
                                        ?>
                                        <tr>
                                            <th><?= $count++ ?></th>
                                            <td><img src="<?= $p->src ?>" alt="<?= $p->alt ?>" width="60" height="110"/></td>
                                            <td><?= $p->alt ?></td>
                                            <td><?= $p->nazivProizvod ?></td>
                                            <td>$<?= $p->cena ?></td>
                                            <td><?= $p->naziv ?></td>
                                            <td><a href="#" class="change-prod" data-id="<?= $p->id_proizvod ?>" data-toggle="modal" data-target="#myModal">Change</a></td>
                                            <td><a href="#" class="delete-prod" data-id="<?= $p->id_proizvod ?>">Delete</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title" id="form-heading-prod">Add product</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <form id="forma" action="models/products/insert-product.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" id="hdnIdProd"/>

                                    <div class="input-field">
                                        <input type="file" name="imageProd" id="imageP" class="validate"/>
                                    </div>

                                    <div class="input-field">
                                        <input type="text" id="altProd" name="altProd" placeholder="Enter alt" class="validate">
                                    </div>

                                    <div class="input-field">
                                        <input type="text" id="nameProd" name="nameProd" placeholder="Enter name" class="validate">
                                    </div>

                                    <div class="input-field">
                                        <input type="text" id="priceProd" name="priceProd" placeholder="Enter price" class="validate">
                                    </div>

                                    <div class="input-field">
                                        <select id="roleOptionProd" name="categoryOption">
                                            <option value="0">Choose category</option>
                                            <option value="1">Samsung</option>
                                            <option value="2">Apple</option>
                                            <option value="3">Huawei</option>
                                        </select>
                                    </div>

                                    <div class="input-field buttonSave">
                                        <input type="submit" value="Save" name="btnSave" id="btnSaveProd" class="btn btn-info"/>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <!-- Trigger the modal with a button -->
                    <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Insert product</h4>
                                </div>
                                <div class="modal-body">

                                    <form id="forma" action="models/products/change-product.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="hdnChange" id="hdnIdProdChange"/>

                                        <div class="input-field">
                                            <input type="file" name="imageProdChange" id="imagePChange" class="validate"/>
                                        </div>

                                        <div class="input-field">
                                            <input type="text" id="altProdChange" name="altProdChange" placeholder="Enter alt" class="validate">
                                        </div>

                                        <div class="input-field">
                                            <input type="text" id="nameProdChange" name="nameProdChange" placeholder="Enter name" class="validate">
                                        </div>

                                        <div class="input-field">
                                            <input type="text" id="priceProdChange" name="priceProdChange" placeholder="Enter price" class="validate">
                                        </div>

                                        <div class="input-field">
                                            <select id="roleOptionProdChange" name="categoryOptionChange">
                                                <option value="0">Choose category</option>
                                                <option value="1">Samsung</option>
                                                <option value="2">Apple</option>
                                                <option value="3">Huawei</option>
                                            </select>
                                        </div>

                                        <div class="input-field buttonSave">
                                            <input type="submit" value="Save" name="btnSaveChange" id="btnSaveProdChange" class="btn btn-info"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="categories">
            <div class="content">
                <div class="container-fluid">
                    <div class="col-sm-8 links">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Href</th>
                                        <th scope="col">Change</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody id="contentCat">
                                    <?php
                                    require_once (__DIR__ . "/../config/connection.php");
                                    require_once (__DIR__ . "/../models/categories/functions.php");

                                    $categories = getCategories();
                                    $count = 1;
                                    foreach($categories as $cat) :
                                        ?>
                                        <tr>
                                            <th><?= $count++ ?></th>
                                            <td><?= $cat->naziv ?></td>
                                            <td><?= $cat->putanja ?></td>
                                            <td><a href="#" class="change-cat" data-id="<?= $cat->id_marka ?>">Change</a></td>
                                            <td><a href="#" class="delete-cat" data-id="<?= $cat->id_marka ?>">Delete</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title" id="form-heading-cat">Add category</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <form id="forma">
                                    <input type="hidden" id="hdnIdCat"/>

                                    <div class="input-field">
                                        <input type="text" id="nameCat" placeholder="Enter name" class="validate">
                                    </div>

                                    <div class="input-field">
                                        <input type="text" id="linkCat" placeholder="Enter href" class="validate">
                                    </div>

                                    <div class="input-field buttonSave">
                                        <input type="button" value="Save" id="btnSaveCat" class="btn btn-info"/>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="users">
            <div class="content">
                <div class="container-fluid">
                        <div class="col-sm-8 links">
                            <div class="card">
                                <div class="card-body table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Change</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody id="contentUsers">
                                            <?php
                                                require_once (__DIR__ . "/../config/connection.php");
                                                require_once (__DIR__ . "/../models/users/functions.php");

                                                $user = getUserByRole();
                                                $count = 1;
                                                foreach($user as $u) :
                                            ?>
                                                <tr>
                                                    <th><?= $count++ ?></th>
                                                    <td><?= $u->ime ?></td>
                                                    <td><?= $u->email ?></td>
                                                    <td><?= $u->naziv ?></td>
                                                    <td><a href="#" class="change-user" data-id="<?= $u->id_korisnik ?>">Change</a></td>
                                                    <td><a href="#" class="delete-user" data-id="<?= $u->id_korisnik ?>">Delete</a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header card-header-warning">
                                        <h4 class="card-title" id="form-heading">Add user</h4>
                                    </div>
                                    <div class="card-body table-responsive">
                                            <form id="forma">
                                                <input type="hidden" id="hdnId" name="id"/>

                                                <div class="input-field">
                                                    <input type="text" id="name" placeholder="Enter name" class="validate">
                                                </div>

                                                <div class="input-field">
                                                    <input type="text" id="username" placeholder="Enter username" class="validate">
                                                </div>

                                                <div class="input-field">
                                                    <input type="text" id="email" placeholder="Enter email" class="validate">
                                                </div>

                                                <div class="input-field">
                                                    <input type="text" id="password" placeholder="Enter password" class="validate">
                                                </div>

                                                <div class="input-field">
                                                    <select id="roleOption">
                                                        <option value="0">Choose role</option>
                                                        <option value="1">korisnik</option>
                                                        <option value="2">administrator</option>
                                                    </select>
                                                </div>

                                                <div class="input-field buttonSave">
                                                    <input type="button" value="Save" id="btnSave" class="btn btn-info"/>
                                                </div>
                                            </form>
                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
