<div class='container'>
	<div class='row'>
	<h3> Register as a Citizen Today </h3>
	<hr>
	
	<div class='well'>
		<p> Join up as a citizen today, whilst the game is still in beta and recieve 1,000 credits & 10 free loyalty tokens to start your journey. </p>
	</div>
<?php
    require_once 'core/init.php';

    if(Input::exists()) {
        if (Token::check(Input::get('token'))) {
            $validate = new Validation();
            $validation = $validate->check($_POST, array(
                'username' => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 20,
                    'unique' => 'users'
                ),
                'password' => array(
                    'required' => true,
                    'min' => 6,
                ),
                'confirm_password' => array(
                    'required' => true,
                    'matches' => 'password'
                ),
                'name' => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 20,
                    'unique' => 'users'
                ),
            ));

			if ($validation->passed()) {
                $user = new User();
                $salt = Hash::salt(32);

                try {
                    $user->create(array(
						'username' => Input::get('username'),
						'password' => Hash::make(Input::get('password'), $salt),
						'salt' => $salt,
						'name' => Input::get('name'),
						'joined' => date('Y-m-d H:i:s'),
						'group' => 1
					));
					
                    Session::flash('home', '<div class="alert alert-success" role="alert"> Thank you! <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> You have been registered to HL2C, please wait and we will redirect you to your dashboard. </div>');
                    Redirect::to('index.php');
					
                }catch(Exception $e){
                    die($e->getMessage());
                }

            } else {
                foreach($validation->errors() as $error){
					$error = ucfirst($error);
                    echo "<b style='color:red'>{$error}</b><br>";
                }
				echo '<hr>';
            }
		}
	}

?>
		<form action="" method="post">
		
		<div class="input-group">
		  <span class="input-group-addon" id="username-icon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
		  <input type="text" class="form-control" placeholder="Username" aria-describedby="username-icon" name="username" autocomplete="off" value="<?php echo (Input::get('username')) ?>">
		</div>
		
		<div class="input-group">
		  <span class="input-group-addon" id="password-icon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
		  <input type="password" class="form-control" aria-describedby="password-icon" placeholder="Password" name="password" autocomplete="off" value="<?php echo (Input::get('password')) ?>">
		</div>
		
		<div class="input-group">
		  <span class="input-group-addon" id="conf-pass-icon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
		  <input type="password" class="form-control" aria-describedby="conf-pass-icon" placeholder="Confirm Password" name="confirm_password" autocomplete="off">
		</div>
		
		<div class="input-group">
		  <span class="input-group-addon" id="name-icon"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span></span>
		  <input type="text" class="form-control" aria-describedby="name-icon" placeholder="Character Name" type="text" name="name" id="name" autocomplete="off" value="<?php echo (Input::get('name')) ?>">
		</div>
		
		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
		<input class='form-control' type="submit" value="Register"/>
		
		</form>
</div>
</div>
	
