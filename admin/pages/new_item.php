<?php

require_once 'core/init.php';
include_once 'includes/header.php';

?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Item Admin Options</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-4">
                <?php
                if (Input::exists()) {

                    $validate = new Validation();
                    $validation = $validate->check($_POST, array(
                        'image' => array('required' => true, 'matches' => 'image'),
                        'name' => array('required' => true, 'matches' => 'name'),
                        'weight' => array('required' => true),
                        'price' => array('required' => true),
                        'market_value' => array('required' => true),
                    ));

                    $item = new Item();

                    // Get all input $_POST fields for the item
                    $itemImage = $item->getField('image');
                    $itemName = $item->getField('name');
                    $itemWeight = $item->getField('weight');
                    $itemPrice = $item->getField('price');
                    $itemMarket = $item->getField('market_value');
                    $itemAttack = $item->getField('attack');
                    $itemDefense = $item->getField('defense');
                    $itemAgility = $item->getField('agility');

                    // Logic to check if the form validation has passed
                    if ($validation->passed()) {

                        try {
                            $item->create(array(
                                'image' => $itemImage,
                                'name' => $itemName,
                                'weight' => $itemWeight,
                                'price' => $itemPrice,
                                'market_value' => $itemMarket,
                                'attack' => $itemAttack,
                                'defense' => $itemDefense,
                                'agility' => $itemAgility,
                            ));

                            Session::flash('item_created', '<div class="alert alert-success" role="alert"> <span class="glyphicon glyphicon-add" aria-hidden="true"> Item Added </span> You have successfully added <?php echo Input::get("name") ?> </div>');
                            Redirect::to('index.php');

                        } catch (Exception $e) {
                            die($e->getMessage());
                        }

                    } else {
                        foreach ($validation->errors() as $error) {
                            echo ucfirst($error).'<br>';
                        }
                    }
                }
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Add a New Item
                    </div>
                    <div class="panel-body">
                            <form action="" method="post">

                                <div class="input-group">
                                    <span class="input-group-addon" id="image-icon"><span
                                                class="glyphicon glyphicon-picture" aria-hidden="true"></span></span>
                                    <input type="text" class="form-control" placeholder="Image URL"
                                           aria-describedby="image-icon" name="image" autocomplete="off"
                                           value="<?php echo(Input::get('image')) ?>">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="name-icon"><span
                                                class="glyphicon glyphicon-list" aria-hidden="true"></span></span>
                                    <input type="text" class="form-control" aria-describedby="name-icon"
                                           placeholder="Item name" name="name" autocomplete="off"
                                           value="<?php echo(Input::get('name')) ?>">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="name-icon"><span
                                                class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                    <input type="number" class="form-control" aria-describedby="name-icon"
                                           placeholder="Item weight" name="weight" autocomplete="off"
                                           value="<?php echo(Input::get('weight')) ?>">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="price-icon"><span
                                                class="glyphicon glyphicon-euro" aria-hidden="true"></span></span>
                                    <input type="number" class="form-control" aria-describedby="price-icon"
                                           placeholder="Item price" name="price" autocomplete="off"
                                           value="<?php echo(Input::get('price')) ?>">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="market-value-icon"><span
                                                class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span>
                                    <input type="number" class="form-control" aria-describedby="price-icon"
                                           placeholder="Item market value" name="market_value" autocomplete="off"
                                           value="<?php echo(Input::get('market_value')) ?>">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="attack-icon"><span
                                                class="glyphicon glyphicon-fire" aria-hidden="true"></span></span>
                                    <input type="number" class="form-control" aria-describedby="price-icon"
                                           placeholder="Item attack points" name="attack" autocomplete="off"
                                           value="<?php echo(Input::get('attack')) ?>">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="defense-icon"><span
                                                class="glyphicon glyphicon-tower" aria-hidden="true"></span></span>
                                    <input type="number" class="form-control" aria-describedby="price-icon"
                                           placeholder="Item defense point" name="defense" autocomplete="off"
                                           value="<?php echo(Input::get('defense')) ?>">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="agility-icon"><span
                                                class="glyphicon glyphicon-flash" aria-hidden="true"></span></span>
                                    <input type="number" class="form-control" aria-describedby="agility-icon"
                                           placeholder="Item agility bonus" name="agility" autocomplete="off"
                                           value="<?php echo(Input::get('agility')) ?>">
                                </div>

                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
                                <input class='form-control' type="submit" value="Add Item"/>

                            </form>
                    </div>
                    <div class="panel-footer">
                        Please keep items lore specific
                    </div>
                </div>
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4">

            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4">

            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4">


            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4">


            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4">

            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4">

            </div>
            <!-- /.col-lg-4 -->
        </div>
        <div class="col-lg-4">

            <!-- /.col-lg-4 -->
        </div>
        <div class="col-lg-4">

            <!-- /.col-lg-4 -->
        </div>
    </div>
    <!-- /.row -->
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
