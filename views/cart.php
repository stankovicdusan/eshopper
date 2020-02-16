
<section id="cart_items">
    <div class="container">
        <?php
            require_once (__DIR__ . "/../config/connection.php");
            require_once (__DIR__ . "/../models/cart/functions.php");

            $id = $_SESSION['user']->id_korisnik;

            $productsFromCart = getProductsFromCartById($id);
        ?>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Remove</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($productsFromCart as $prod):
                ?>
                    <tr>
                        <td class="cart_product">
                            <img src="<?= $prod->src ?>" alt="<?= $prod->alt ?>" width="60" height="110"/>
                        </td>
                        <td class="cart_description">
                            <h4><?= $prod->nazivProizvod ?></h4>
                        </td>
                        <td class="cart_price">
                            <p>$<?= $prod->cena ?></p>
                        </td>
                        <td class="cart_quantity">
                            <?= $prod->kolicina ?>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                $<?=
                                    $prod->kolicina * $prod->cena
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="index.php?page=delete-cart&id=<?= $prod->id_korpa ?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</section> <!--/#cart_items-->

