<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 padding-right product-info">
                <div class="product-details"><!--product-details-->
                    <?php
                        $id = $_GET['id'];

                        require_once (__DIR__. "/../config/connection.php");
                        require_once (__DIR__. "/../models/products/functions.php");

                        $prod_exec = getProductInfoById($id);
                    ?>
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="<?= $prod_exec->src ?>" alt="<?= $prod_exec->alt ?>" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <h2><?= $prod_exec->nazivProizvod ?></h2>
                            <span>
                                <span>$<?= $prod_exec->cena ?></span>
                                <?php if(isset($_SESSION['user'])) : ?>
                                    <a href="#" id="cart" data-id="<?= $prod_exec->id_proizvod ?>" data-user="<?= $_SESSION['user']->id_korisnik ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                <?php endif; ?>
                            </span>
                            <p><b>Intern memory:</b> <?= $prod_exec->text1 ?> </p>
                            <p><b>CPU:</b> <?= $prod_exec->text2 ?> </p>
                            <p><b>Operating system:</b> <?= $prod_exec->text3 ?> </p>
                            <p><b>Primary camera:</b> <?= $prod_exec->text4 ?> </p>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
            </div>
        </div>
    </div>
</section>