<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertBaristaBtn'])) {

	$query = insertBarista($pdo, Barista_Name: $_POST['Barista_Name'], Barista_Specialty: $_POST['Barista_Specialty'], );

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editBaristaBtn'])) {
	$query = insertBarista($pdo, Barista_Name: $_POST['Barista_Name'], Barista_Specialty: $_POST['Barista_Specialty'], $_GET['Barista_ID']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}




if (isset($_POST['deleteBaristaBtn'])) {
	$query = deleteBarista($pdo, Barista_ID: $_GET['Barista_ID']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




if (isset($_POST['insertBaristaBtn'])) {
	$query = insertCoffee($pdo, $_POST['Coffee_Menu'], $_POST['Coffee_cost'], $_GET['Barista_ID']);

	if ($query) {
		header("Location: ../viewprojects.php?web_dev_id=" .$_GET['Barista_ID']);
	}
	else {
		echo "Insertion failed";
	}
}




if (isset($_POST['editCoffeeBtn'])) {
	$query = updateCoffee($pdo, $_POST['Coffee_Menu'], $_POST['Coffee_cost'], $_GET['Coffee_ID']);

	if ($query) {
		header("Location: ../viewprojects.php?web_dev_id=" .$_GET['Barista_ID']);
	}
	else {
		echo "Update failed";
	}

}




if (isset($_POST['deleteCoffeeBtn'])) {
	$query = deleteCoffee($pdo, $_GET['Coffee_ID']);

	if ($query) {
		header("Location: ../viewprojects.php?web_dev_id=" .$_GET['Barista_ID']);
	}
	else {
		echo "Deletion failed";
	}
}




?>
