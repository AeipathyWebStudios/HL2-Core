<?php

require_once 'core/init.php';


if(Input::exists()){
    if(Token::check(Input::get('token'))){
        $validate = new Validation();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true),
        ));

        if($validation->passed()){
            $user = new User();
            $login = $user->login(Input::get('username'), Input::get('password'));
        }else{
            foreach($validation->errors() as $error){
                echo $error.'<br>';
            }
        }


    }
}
?>

<div class='well'>
<form action="" method="post">
	
	<div class="input-group">
	  <span class="input-group-addon" id="username-icon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
	  <input type="text" class="form-control" placeholder="Username" aria-describedby="username-icon" name="username" autocomplete="off" value="<?php echo (Input::get('username')) ?>">
	</div>
	
	<div class="input-group">
	  <span class="input-group-addon" id="password-icon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
	  <input type="password" class="form-control" aria-describedby="password-icon" placeholder="Password" name="password" autocomplete="off" value="<?php echo (Input::get('password')) ?>">
	</div>
	
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
	<input class='form-control' type="submit" value="Login "/>

</form>
</div>