<?php
$user = "root";
$password = "";
$host = "localhost";
$database = "blog";
/////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//
// Class for making recursive tables
class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}
//
//
//
/////////////////////////////////////////////////////////////////////////////////////////////////











/////////////////////////////////////////////////////////////////////////////////////////////////











//////////////////////////////////////////FETCH ALL USERS////////////////////////////////////////
//
//
//
try {
  $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  $fetchAllUsersQuery = $db->prepare("SELECT id, firstName, middleName,lastName,mobile,email,passwordHash,registeredAt,lastLogin,intro,profile FROM user");
  $fetchAllUsersQuery->execute();

  // set the resulting array to associative
  $result = $fetchAllUsersQuery->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($fetchAllUsersQuery->fetchAll())) as $k=>$v) {
    // echo 'key: '.$k. '<br>' . 'value: '.$v . '<br>';
    $_SESSION['user_'.$k] = $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
// $db = null;
echo "</table>";

// throw exceptions, when SQL error is caused
$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// prevent emulation of prepared statements
$db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
//
//
//
//////////////////////////////////////////FETCH ALL USERS////////////////////////////////////////











/////////////////////////////////////////////////////////////////////////////////////////////////











//////////////////////////////////////////FETCH ALL POSTS////////////////////////////////////////
//
//
//
try {
  $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  $fetchAllPostsQuery = $db->prepare("SELECT id,authorId,parentId,title,metaTitle,slug,summary,published,createdAt,updatedAt,publishedAt,content FROM post");
  $fetchAllPostsQuery->execute();

  // set the resulting array to associative
  $result = $fetchAllPostsQuery->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($fetchAllPostsQuery->fetchAll())) as $k=>$v) {
    // echo 'key: '.$k. '<br>' . 'value: '.$v . '<br>';
    $_SESSION['post_'.$k] = $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
// $db = null;
echo "</table>";

// throw exceptions, when SQL error is caused
$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// prevent emulation of prepared statements
$db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
//
//
//
//////////////////////////////////////////FETCH ALL POSTS////////////////////////////////////////











/////////////////////////////////////////////////////////////////////////////////////////////////











//////////////////////////////////////////FETCH ALL POST_META////////////////////////////////////////
//
//
//
try {
  $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  $fetchAllPostMetaDataQuery = $db->prepare("SELECT id,authorId,parentId,title,metaTitle,slug,summary,published,createdAt,updatedAt,publishedAt,content FROM post");
  $fetchAllPostMetaDataQuery->execute();

  // set the resulting array to associative
  $result = $fetchAllPostMetaDataQuery->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($fetchAllPostMetaDataQuery->fetchAll())) as $k=>$v) {
    // echo 'key: '.$k. '<br>' . 'value: '.$v . '<br>';
    $_SESSION['post_metadata_'.$k] = $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
// $db = null;
echo "</table>";

// throw exceptions, when SQL error is caused
$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// prevent emulation of prepared statements
$db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
//
//
//
//////////////////////////////////////////FETCH ALL POST_META////////////////////////////////////////











/////////////////////////////////////////////////////////////////////////////////////////////////











//////////////////////////////////////////FETCH ALL POST_COMMENTS////////////////////////////////////////
//
//
//
try {
  $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  $fetchAllPostCommentsQuery = $db->prepare("SELECT id, postId, parentId,title,published,createdAt,publishedAt,content FROM post_comment");
  $fetchAllPostCommentsQuery->execute();

  // set the resulting array to associative
  $result = $fetchAllPostCommentsQuery->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($fetchAllPostCommentsQuery->fetchAll())) as $k=>$v) {
    // echo 'key: '.$k. '<br>' . 'value: '.$v . '<br>';
    $_SESSION['post_comment_'.$k] = $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
// $db = null;
echo "</table>";

// throw exceptions, when SQL error is caused
$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// prevent emulation of prepared statements
$db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
//
//
//
//////////////////////////////////////////FETCH ALL POST_COMMENTS////////////////////////////////////////











/////////////////////////////////////////////////////////////////////////////////////////////////











//////////////////////////////////////////FETCH ALL CATEGORIES////////////////////////////////////////
//
//
//
try {
  $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  $fetchAllPostCategoriesQuery = $db->prepare("SELECT id, parentId,title,metaTitle,slug,content FROM category");
  $fetchAllPostCategoriesQuery->execute();

  // set the resulting array to associative
  $result = $fetchAllPostCategoriesQuery->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($fetchAllPostCategoriesQuery->fetchAll())) as $k=>$v) {
    // echo 'key: '.$k. '<br>' . 'value: '.$v . '<br>';
    $_SESSION['post_category_'.$k] = $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
// $db = null;
echo "</table>";

// throw exceptions, when SQL error is caused
$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// prevent emulation of prepared statements
$db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
//
//
//
//////////////////////////////////////////FETCH ALL CATEGORIES////////////////////////////////////////











/////////////////////////////////////////////////////////////////////////////////////////////////











//////////////////////////////////////////FETCH ALL POST_CATEGORY_IDS////////////////////////////////////////
//
//
//
try {
  $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  $fetchAllPostCategoryIdsQuery = $db->prepare("SELECT postId, categoryId FROM post_category");
  $fetchAllPostCategoryIdsQuery->execute();

  // set the resulting array to associative
  $result = $fetchAllPostCategoryIdsQuery->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($fetchAllPostCategoryIdsQuery->fetchAll())) as $k=>$v) {
    // echo 'key: '.$k. '<br>' . 'value: '.$v . '<br>';
    $_SESSION['post_category_ids_'.$k] = $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
// $db = null;
echo "</table>";

// throw exceptions, when SQL error is caused
$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// prevent emulation of prepared statements
$db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
//
//
//
//////////////////////////////////////////FETCH ALL POST_CATEGORY_IDS////////////////////////////////////////


// echo var_dump($_SESSION);
