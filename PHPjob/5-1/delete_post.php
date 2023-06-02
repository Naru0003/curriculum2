<?php
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();

$id = $_GET['id'];

if (empty($id)) {
    header("Location: bookList.php");
    exit;
}
$sql = "DELETE FROM books WHERE id = :id";
$pdo = connect();

try {
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  header("Location: bookList.php");
  exit;
} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  die();
}