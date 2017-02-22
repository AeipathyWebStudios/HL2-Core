<?php

require_once 'core/init.php';

 if(Input::exists()) {
        if (Token::check(Input::get('token'))) {
            $validate = new Validation();
            $validation = $validate->check($_POST, array(
                'image' => array(
                    'required' => true,
                    'unique' => 'items'
                ),
                'name' => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 35,
                ),
                'weight' => array(
                    'required' => true,
                ),
                'price' => array(
                    'required' => true,
                ),
				'market_value' => array(
                    'required' => true,
                ),
            ));

            if ($validation->passed()) {
                $item = new Item();

                try {
                    $item->create(array(
						'image' => Input::get('image'),
						'name' => Input::get('name'),
						'weight' => Input::get('weight'),
						'price' => Input::get('price'),
						'market_value' => Input::get('market_value'),
						'attack' => Input::get('attack'),
						'defense' => Input::get('defense'),
						'agility' => Input::get('agility')
					));
					
                    Session::flash('item_created', '<div class="well"><div class="alert alert-success" role="alert"> Item Created </div></div>');
                    Redirect::to('index.php');
					
                }catch(Exception $e){
                    die($e->getMessage());
                }

            } else {
                foreach($validation->errors() as $error){
                    echo "<div class='well'><div class='alert alert-danger' role='alert'>{$error}</div></div>";
                }
            }
        }
    }

?>


<div class='well'>
	<form action="" method="post">
	
	<div class="input-group">
	  <span class="input-group-addon" id="image-icon"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></span>
	  <input type="text" class="form-control" placeholder="Image URL" aria-describedby="image-icon" name="image" autocomplete="off" value="<?php echo (Input::get('image')) ?>">
	</div>
	
	<div class="input-group">
	  <span class="input-group-addon" id="name-icon"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></span>
	  <input type="text" class="form-control" aria-describedby="name-icon" placeholder="Item name" name="name" autocomplete="off" value="<?php echo (Input::get('name')) ?>">
	</div>
	
	<div class="input-group">
	  <span class="input-group-addon" id="name-icon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
	  <input type="number" class="form-control" aria-describedby="name-icon" placeholder="Item weight" name="weight" autocomplete="off" value="<?php echo (Input::get('weight')) ?>">
	</div>
	
	<div class="input-group">
	  <span class="input-group-addon" id="price-icon"><span class="glyphicon glyphicon-euro" aria-hidden="true"></span></span>
	  <input type="number" class="form-control" aria-describedby="price-icon" placeholder="Item price" name="price" autocomplete="off" value="<?php echo (Input::get('price')) ?>">
	</div>
		
	<div class="input-group">
	  <span class="input-group-addon" id="market-value-icon"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span>
	  <input type="number" class="form-control" aria-describedby="price-icon" placeholder="Item market value" name="market_value" autocomplete="off" value="<?php echo (Input::get('market_value')) ?>">
	</div>
	
	<div class="input-group">
	  <span class="input-group-addon" id="attack-icon"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span></span>
	  <input type="number" class="form-control" aria-describedby="price-icon" placeholder="Item attack points" name="attack" autocomplete="off" value="<?php echo (Input::get('attack')) ?>">
	</div>
	
	<div class="input-group">
	  <span class="input-group-addon" id="defense-icon"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span></span>
	  <input type="number" class="form-control" aria-describedby="price-icon" placeholder="Item defense point" name="defense" autocomplete="off" value="<?php echo (Input::get('defense')) ?>">
	</div>
	
	<div class="input-group">
	  <span class="input-group-addon" id="agility-icon"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span></span>
	  <input type="number" class="form-control" aria-describedby="agility-icon" placeholder="Item agility bonus" name="agility" autocomplete="off" value="<?php echo (Input::get('agility')) ?>">
	</div>
	

	
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
	<input class='form-control' type="submit" value="Register"/>
	
	</form>
</div>

