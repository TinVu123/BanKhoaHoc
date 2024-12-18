<?php
include 'config.php';
session_start();
// $user_id = $_SESSION['user_id'];
// if(!isset($user_id)){
//     header('Location:login.php');
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/user_style.css">
</head>
<body>
    <?php include 'header.php'?>
    <div class="main">
        <div class="banner"> </div>
        <h1>Tất cả khoá học</h1>
        <div class="container-box">
            <?php
                $select_courses = mysqli_query($conn,"SELECT * FROM `courses`") or die('query failed');
                while($row = mysqli_fetch_assoc($select_courses)){

                    ?>
                    <div class="box" >
                        <a href="detail_course.php?course_id=<?php echo $row['id'];?>" >
                            <img src="uploaded_img/<?php echo $row['image']?>" alt="">
                            <div class="info">
                                <h3 class="title info-card"><?php echo $row['name']?></h3>
                                <p  class="info-card">Giá: <span  class="price info-card"><?php echo $row['price']?></span></p>
                                <p class="info-card">Số bài: <span><?php echo $row['number_lessons']?></span></p>
                                <p class="info-card">Học viên: <span><?php echo $row['number_student']?></span></p>
                            </div>
                        </a>
                        <?php
                        ?>
                        <div class="btn-add">
                            <?php 
                                if(isset($_SESSION['user_id'])){
                                    ?>
                            <a href="add_to_card.php?course_id=<?php echo $row['id'];?>">Thêm</a>

                                <?php
                            }else{
                                ?>
                            <a href="login.php">Thêm</a>
                                <?php
                            }
                                ?>
                        </div>
                    </div>
                    

            <?php
            
        }
            ?>
            
            
            
            
        </div>
    </div>
    
    <?php include 'footer.php'?>
</body>
</html>