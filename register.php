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

                    Session::flash('home', 'You have been registered to HL2C');
                    Redirect::to('index.php');

                }catch(Exception $e){
                    die($e->getMessage());
                }

            } else {
                foreach($validation->errors() as $error){
                    echo $error.'<br>';
                }
            }
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

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
    <input type="submit" value="Register"/>
</form>