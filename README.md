# Hollow Life (HL2:C)

Hollow Life is a online strategy game based in the half life universe, in which the player takes on the role of an ordinary citizen.

## Getting Started

Simply drag and drop the contents of the game into your web root, or into a web directory.

### Prerequisites

What things you need to install the software and how to install them

Any PHP version (Works best with 7)
Any MySQL software (MariaDB, Phpmyadmin, MongoDB)
Bootstrap

## Installing

```
Drop the contents into your web root or into a directory

Configure the MySQL in core/init.php replacing the dummy data with your data.

You're good to go, for developers you will need to look at the API reference.

Simply require_once 'core/init.php'; to any new pages you add.
```

## Documentation

### Efficiently using Validation

* **Instantiate a new instance of the validation class.**
```
	$validate = new Validation();
```

* **Call the check method in the validation class, and pass in an input 
field with the rules that you want to assign to it.**
```
$validation = $validate->check($_POST, array(
    'input_field' => array(
        'required' => true, // Field is required
        'min' => 4, // Minimum of 4 characters
        'max' => 20, // Maximum of 20 characters
        'matches' => 'input_field' // Check if input_field in the table matches data from the form
        'unique' => 'test' // Unique to the table 'test'
    ), 
));
```

* **In order to make use of this functionality, you must use logic to check whether
 or not the validation has actually passed.**
```
if ($validation->passed()) {
    // If the rules pass
} else {
    foreach($validation->errors() as $error){ 
        $error = ucfirst($error);
        echo "<b style='color:red'>{$error}</b><br>";
    }
}

```

### Inserting data to database

* **Instantiate a new instance of the class you want to insert data for.**

```
$class = new Class();
```

* **Get the field post data that you want to send**
```
$foo = $item->getField('foo');
```

* **Using the class you instantiated run the create method, and pass as many array values
as you want.**

```$xslt
$class->create(array(
            'foo' => $foo
        ));
```

And it's that simple, make sure that your fields exactly match your database columns otherwise 
there will be complications.

## Built With

* [Bootstrap](http://www.bootstrap.com/) - The design framework used
* [Git Bash](https://git-for-windows.github.io/) - Git accessibility

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Authors

* **Alex Walton** - *On-going PHP Developer* - [Aeipathy Web Studios](https://facebook.com/AeipathyWebStudios)

See also the list of [contributors](https://github.com/AeipathyWebStudios/HL2-C/contributors) who participated in this project.

## License

In progress

## Acknowledgments

* Hat tip to Code Course for running me through and explaining their methods, I can now extend this functionality with ease.
