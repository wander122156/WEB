<?php

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function closeDBConnection(mysqli $conn): void {
  $conn->close();
}

function getAndPrintPostsFromDB(mysqli $conn, $featured): void {
    $sql = "SELECT * FROM post WHERE featured = $featured";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($post = $result->fetch_assoc()) {
            if ($featured == 1) {
                include "post_preview.php"; // Подключаем файл для основных постов
            } else {
                include "bottom_post_preview.php"; // Подключаем файл для неосновных постов
            }
        }
    } else {
        echo "0 results";
    }
}

function getPostsFromDB(mysqli $conn): void
  {
      global $postId, $row;
      $sql = "SELECT * FROM post WHERE post_id = $postId";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
      } else {
          echo "0 results";
      }
  }
// function getAndPrintPostsFromDB1(mysqli $conn): void {
//     $sql = "SELECT * FROM post WHERE featured = 1";
//     $result = $conn->query($sql);
//     if ($result->num_rows > 0) {
//       while($post = $result->fetch_assoc()) {
//         include "post_preview.php";
//      }
//     } else {
//       echo "0 results";
//     }
//   }

// function getAndPrintPostsFromDB2(mysqli $conn): void {
//     $sql = "SELECT * FROM post WHERE featured = 0";
//     $result = $conn->query($sql);
//     if ($result->num_rows > 0) {
//       while($post = $result->fetch_assoc()) {
//         include "bottom_post_preview.php";
//      }
//     } else {
//       echo "0 results";
//     }
//   }
?>