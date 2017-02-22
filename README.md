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

### Documentation

## Efficiently using Validation

```

	$validate = new Validation();
	$validation = $validate->check($_POST, array(
		'input_field' => array(
			'required' => true,
			'min' => 4, // Minimum of 4 characters
			'max' => 20, // Maximum of 20 characters
			'matches' => 'input_field' // input_field value in table data already exists.
			'unique' => 'users' // Unique to the table 'users'
		), 
	));

	if ($validation->passed()) {
		// If the rules pass
	} else {
		foreach($validation->errors() as $error){ 
			$error = ucfirst($error);
			echo "<b style='color:red'>{$error}</b><br>";
		}
		echo '<hr>';
	}
	

```


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
