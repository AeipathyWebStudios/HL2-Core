<?php
    require_once 'core/init.php';

    if(Input::exists()){
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

        if($validation->passed()){
            echo 'Passed';
        }else{
            print_r($validation->errors());
        }
    }
?>

<form action="" method="post">
    <div class="field">
        <label for="username">Username</label>
       <input type="text" name="username" id="username" autocomplete="off" value="<?php echo (Input::get('username')) ?>"/>
    </div>

    <div class="field">
        <label for="password">Password</label>
       <input type="password" name="password" id="password" value=""/>
    </div>

    <div class="field">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" value=""/>
    </div>

    <div class="field">
        <label for="name">Your character name</label>
        <input type="text" name="name" id="name" autocomplete="off" value="<?php echo (Input::get('name')) ?>"/>
    </div>

    <input type="submit" value="Register"/>
</form>