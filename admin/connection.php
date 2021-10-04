<?php

// $table = "user";


// INSERT INTO user(id, firstName, middleName,lastName,mobile,email,passwordHash,registeredAt,lastLogin,intro,profile)
// VALUES('1','chrisAdmin','Octavian','TheHacker','555-555-5555','email@email.com','passwordExampleHash','2021-08-05 12:00:00','2021-08-05 11:00:00','intro','profileurl');

// try {
//   $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);

//   // user
//   foreach($db->query("SELECT id FROM user") as $row) {
//     $_SESSION['user_id'] = $row['id'];
//   }
//   foreach($db->query("SELECT firstName FROM user") as $row) {
//     $_SESSION['user_firstName'] = $row['firstName'];
//   }
//   foreach($db->query("SELECT middleName FROM user") as $row) {
//     $_SESSION['user_middleName'] = $row['middleName'];
//   }
//   foreach($db->query("SELECT lastName FROM user") as $row) {
//     $_SESSION['user_lastName'] = $row['lastName'];
//   }
//   foreach($db->query("SELECT mobile FROM user") as $row) {
//     $_SESSION['user_mobile'] = $row['mobile'];
//   }
//   foreach($db->query("SELECT email FROM user") as $row) {
//     $_SESSION['user_email'] = $row['email'];
//   }
//   foreach($db->query("SELECT registeredAt FROM user") as $row) {
//     $_SESSION['user_registeredAt'] = $row['registeredAt'];
//   }
//   foreach($db->query("SELECT lastLogin FROM user") as $row) {
//     $_SESSION['user_lastLogin'] = $row['lastLogin'];
//   }
//   foreach($db->query("SELECT intro FROM user") as $row) {
//     $_SESSION['user_intro'] = $row['intro'];
//   }
//   foreach($db->query("SELECT profile FROM user") as $row) {
//     $_SESSION['user_profile'] = $row['profile'];
//   }
//   // user

//   // post
//   $fetchAllUsersQuery = "SELECT id,authorId,parentId,title,metaTitle,slug,summary,published,createdAt,updatedAt,publishedAt,content FROM post";
//   // $result = mysqli_query($db, $fetchAllUsersQuery);
//   // echo $result;
//   // if (mysqli_num_rows($result) > 0) {
//   //   // output data of each row
//   //   while($row = mysqli_fetch_assoc($result)) {
//   //     echo "id: " . $row["id"];
//   //   }
//   // } else {
//   //   echo "0 results";
//   // }echo "<table style='border: solid 1px black;'>";


//   // . " - authorId: " . $row["authorId"]. " - parentId: " . $row["parentId"]. " - title: " . $row["title"].. " - metaTitle: " . $row["metaTitle"]. " - slug: " . $row["slug"]. " - summary: " . $row["summary"]. " - published: " . $row["published"]. " - createdAt: " . $row["createdAt"]. " - updatedAt: " . $row["updatedAt"]. " - publishedAt: " . $row["publishedAt"]. " - content: " . $row["content"]."<br>"

//   // mysqli_close($db);
//   //post

//   foreach($db->query("SELECT title FROM post") as $row) {
//     $_SESSION['post_title'] = $row['title'];
//   }

//   foreach($db->query("SELECT meta_key FROM post_meta") as $row) {
//     $_SESSION['post_meta_key'] = $row['meta_key'];
//   }

//   foreach($db->query("SELECT content FROM post_comment") as $row) {
//     $_SESSION['post_comment'] = $row['content'];
//   }

//   foreach($db->query("SELECT content FROM category") as $row) {
//     $_SESSION['category'] = $row['content'];
//   }

//   foreach($db->query("SELECT postId FROM post_category") as $row) {
//     $_SESSION['post_category'] = $row['postId'];
//   }

// } catch (PDOException $e) {
//     print "Error!: " . $e->getMessage() . "<br/>";
//     die();
// }




// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();



include_once 'fetchData.php';




?>