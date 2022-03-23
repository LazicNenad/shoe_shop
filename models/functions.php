<?php
function getAll($tableName)
{
	global $conn;

	$query = "SELECT * FROM $tableName";

	$res = $conn->query($query)->fetchAll();
	return $res;
}

function insertUser($firstName, $lastName, $email, $mdPassword, $idRole)
{
	global $conn;

	$query = "INSERT INTO users(firstName, lastName, email, password, idRole) VALUES (:firstName, :lastName, :email, :password, :idRole)";

	$prepare = $conn->prepare($query);

	$prepare->bindParam(':firstName', $firstName);
	$prepare->bindParam(':lastName', $lastName);
	$prepare->bindParam(':email', $email);
	$prepare->bindParam(':password', $mdPassword);
	$prepare->bindParam(':idRole', $idRole);

	$result = $prepare->execute();
	return $result;
}

function checkLogin($email, $mdPassword)
{
	global $conn;

	$query = "SELECT * FROM users u JOIN roles r ON u.idRole = r.idRole WHERE u.email = :email AND u.password = :password";

	$prepare = $conn->prepare($query);
	$prepare->bindParam(":email", $email);
	$prepare->bindParam(":password", $mdPassword);
	$prepare->execute();

	$result = $prepare->fetch();
	return $result;
}

function getProductById($idProduct)
{
	global $conn;

	$query = "SELECT p.name AS ProductName, p.price, p.oldPrice, p.image, c.name AS CatName, b.name AS BrandName FROM products p JOIN category c JOIN brand b ON p.idCat = c.idCat AND p.idBrand = b.idBrand WHERE idProduct = :id";

	$prepare = $conn->prepare($query);

	$prepare->bindParam(":id", $idProduct);
	$prepare->execute();

	$result = $prepare->fetch();
	return $result;
}

function getProductsSearch($searchData)
{
	global $conn;

	$query = "SELECT * FROM products WHERE name LIKE '%:searchData%'";
	$prepare = $conn->prepare($query);

	$prepare->bindParam(":searchData", $searchData);
	$prepare->execute();

	$result = $prepare->fetchAll();
	return $result;
}

function deleteItem($id)
{
	global $conn;

	$query = "DELETE FROM `products` WHERE idProduct = :id";

	$prepare = $conn->prepare($query);
	$prepare->bindParam(':id', $id);

	$result = $prepare->execute();
	return $result;
}

function uploadProduct($productName, $productPrice, $productOldPrice, $filePath, $productCategory, $productBrand)
{
	global $conn;

	$query = "INSERT INTO `products`(`idProduct`, `name`, `price`, `oldPrice`, `image`, `idCat`, `idBrand`) VALUES (NULL,:productName,:productPrice,:productOldPrice,:filePath,:productCategory,:productBrand)";

	$prepare = $conn->prepare($query);

	$prepare->bindParam(':productName', $productName);
	$prepare->bindParam(':productPrice', $productPrice);
	$prepare->bindParam(':productOldPrice', $productOldPrice);
	$prepare->bindParam(':filePath', $filePath);
	$prepare->bindParam(':productCategory', $productCategory);
	$prepare->bindParam(':productBrand', $productBrand);

	$result = $prepare->execute();
	return $result;
}

function totalProducts()
{
	global $conn;

	$query = "SELECT COUNT(`idProduct`) AS totalProducts FROM products";
	$result = $conn->query($query)->fetch();
	return $result;
}

function totalUsers()
{
	global $conn;

	$query = "SELECT COUNT(*) AS totalUsers FROM users";
	$result = $conn->query($query)->fetch();
	return $result;
}

function totalAdmins()
{
	global $conn;

	$query = "SELECT COUNT(idRole) AS totalAdmins FROM users WHERE idRole='1'";
	$result = $conn->query($query)->fetch();
	return $result;
}

function getAllProducts($limit)
{
	global $conn;
	$l = $limit * 4;
	$query = "SELECT p.idProduct, p.name, p.price, p.date, p.image, c.name AS ProductCategory, b.name AS ProductBrand FROM products p JOIN category c ON p.idCat = c.idCat JOIN brand b ON p.idBrand = b.idBrand LIMIT $l,4";
	$result = $conn->query($query)->fetchAll();
	return $result;
}

function getAllUsers()
{
	global $conn;

	$query = "SELECT u.idUser, u.firstName, u.lastName, u.email, u.date, r.name FROM users u JOIN roles r ON u.idRole = r.idRole";

	$result = $conn->query($query)->fetchAll();
	return $result;
}

function deleteUser($id)
{
	global $conn;

	$query = "DELETE FROM `users` WHERE idUser = :id";

	$prepare = $conn->prepare($query);
	$prepare->bindParam(':id', $id);

	$result = $prepare->execute();
	return $result;
}

function insertMessage($first_name, $last_name, $emailMessage, $taMessage)
{
	global $conn;

	$query = "INSERT INTO `message`(`idMessage`, `name`, `lastName`, `email`, `message`) VALUES (NULL,:first_name,:last_name,:emailMessage,:taMessage)";

	$prepare = $conn->prepare($query);
	$prepare->bindParam(':first_name', $first_name);
	$prepare->bindParam(':last_name', $last_name);
	$prepare->bindParam(':emailMessage', $emailMessage);
	$prepare->bindParam(':taMessage', $taMessage);

	$result = $prepare->execute();
	return $result;
}

function getAllMessages()
{
	global $conn;

	$query = "SELECT * FROM message";
	$result = $conn->query($query)->fetchAll();
	return $result;
}

function deleteMessage($id)
{
	global $conn;

	$query = "DELETE FROM `message` WHERE idMessage = :id";

	$prepare = $conn->prepare($query);
	$prepare->bindParam(':id', $id);

	$result = $prepare->execute();
	return $result;
}

function getCountProducts()
{
	global $conn;

	$query = "SELECT COUNT(*) AS numberPages FROM products";
	$result = $conn->query($query)->fetch();
	return $result;
}

function getAllLimit($limit)
{
	global $conn;

	$l = $limit * 6;
	$query = "SELECT * FROM products LIMIT $l,6";
	$result = $conn->query($query)->fetchAll();
	return $result;
}

function insertBrand($brandName)
{
	global $conn;

	$query = "INSERT INTO `brand`(`idBrand`, `name`) VALUES (NULL,:brand)";

	$prepare = $conn->prepare($query);

	$prepare->bindParam(":brand", $brandName);

	$result = $prepare->execute();
	return $result;
}

function deletedBrand($id)
{
	global $conn;

	$query = "DELETE FROM `brand` WHERE idBrand = :id";

	$prepare = $conn->prepare($query);
	$prepare->bindParam(':id', $id);

	$result = $prepare->execute();
	return $result;
}
