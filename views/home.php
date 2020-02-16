<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#" data-id="0">All</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#" data-id="1">Samsung</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#" data-id="2">Apple</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#" data-id="3">Huawei</a></h4>
								</div>
							</div>
						</div><!--/category-products-->



                        <div class="filter-panel">
                            <p><input type="hidden" class="price_range" value="0,1400" /></p>
                            <input type="button" value="FILTER" class="filterBtn filterButton"/>
                        </div>



					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->

						<h2 class="title text-center">Features Items</h2>
                        <div id="products">
                        <?php
                            require_once "config/connection.php";

                            $products = executeQuery("SELECT * FROM proizvod p INNER JOIN proizvod_info pi ON p.id_proizvod = pi.proizvod_id");

                            foreach($products as $p) :
                        ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?= $p->src ?>" alt="<?= $p->alt ?>" />
                                                <h2>$<?= $p->cena ?></h2>
                                                <p><?= $p->nazivProizvod ?></p>
                                                <a href="index.php?page=product-info&id=<?= $p->proizvod_id ?>" class="btn btn-info">More info</a><br/>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
						<!--features_items-->
				</div>
			</div>
		</div>
	</section>