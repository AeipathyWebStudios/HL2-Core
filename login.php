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

            if($login){
                Redirect::to('index.php');
            }else{
                echo 'Logging in failed';
            }
        }else{
            foreach($validation->errors() as $error){
                echo $error.'<br>';
            }
        }
    }
}
?>

<div class='well'>


	<div class="middlePage">
	<div class="page-header">
	  <h1 class="logo">HL2:Core <small>Welcome back citizen</small></h1>
	</div>

	<div class="panel panel-info">
	  <div class="panel-heading">
		<h3 class="panel-title">Please Sign In</h3>
	  </div>
	  <div class="panel-body">
	  
	  <div class="row">
	  
	<div class="col-md-5" >
	<h3> Social Connectivity under construction </h3>
	</div>

		<div class="col-md-7" style="border-left:1px solid #ccc;height:160px">
	<form action="" method="post" class="form-horizontal" >
	<fieldset>

	  <input id="textinput" name="username" type="text" placeholder="Enter User Name" class="form-control input-md" autocomplete="off" value="<?php echo (Input::get('username')) ?>">
	  <input id="textinput" name="password" type="password" placeholder="Enter Password" class="form-control input-md" autocomplete="off" value="<?php echo (Input::get('password')) ?>">
	  <div class="spacing"><a href="#"><small> Forgot Password?</small></a><br/></div>
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
        <input class='form-control' type="submit" value="Login "/>


	</fieldset>
	</form>
	</div>
		
	</div>
		
	</div>
	</div>

</form>
</div>