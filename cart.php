<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/user_style.css">
    <style>
        .main{
            margin-top: 90px;
        }
        .container-box{
            margin-top: 16px;
        }
        .checkout{
            width: 100%;
            margin: 0 auto;
        }
        .tong{
            display: block;
            width: 210px;
            margin: 10px auto;
            margin-bottom: 50px;
        }
        .btn-checkout{
            background-color: blueviolet;
            border: none;
            border-radius: 8px;
            font-size: 22px;
            font-weight: 600;
            margin-top: 15px;
            padding: 10px 25px;
            width: 100%;
            color: white;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        }
        .btn-checkout:hover{
            cursor: pointer;
            background-color: #720e9e;
        }
        .main-qr{
            position: fixed;
            top: 0;  left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .6);
            z-index: 1002;
            display: none;
            justify-content: center;
            align-items: center;

        }
        .box-qr{
            width: 50%;
            height: 95%;
            background-color: white;
            text-align: center;
            padding-top: 28px;
            position: relative;
        }
        .img-qr{
            width: 210px;
            height: 210px;
            margin-top: 20px;
            background-color: lavenderblush;
        }
        .box-qr p{
            margin-top: 16px;
        }
        
        .btn-cancel,
        .btn-finish{
            padding: 8px 18px;
            font-size: 18px;
            font-weight: 600;
            color: black;
            border: none;
            border-radius: 8px;
        }
        .btn-finish{
            background-color: #7FFF00;
            margin-left: 5px;
        }
        .btn-finish:hover{
            cursor: pointer;
            background-color: #03C03C;
        }
        .btn-cancel:hover{
            cursor: pointer;
            background-color: orangered;
        }
        .btn-cancel{
            margin-right: 5px;
            background-color: orange;
        }
        .active-qr{
            display: flex;
        }
    </style>
</head>
<body>
    <?php include 'header.php'?>
    <div class="main">
        <h1>Giỏ hàng</h1>
        <div class="container-box">
            <?php
                $user_id = $_SESSION['user_id'];
                $course_cart = mysqli_query($conn,"SELECT cart.id as id_cart, c.id as course_id, image,name,price, number_lessons,number_student FROM `course_cart` as cart INNER JOIN `courses` as c on cart.course_id = c.id  WHERE user_id = '$user_id' ;")or die('query failed');
                while($row = mysqli_fetch_assoc($course_cart)){
            ?>
                 

                    <div class="box" >
                        <a href="detail_course.php?course_id=<?php echo $row['course_id'];?>" >
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
                            <a href="delete_cart.php?id=<?php echo $row['id_cart'];?>">Xoá</a>
                        </div>
                    </div>

            <?php
                }
            ?>
        
        </div>
    </div>
    <div class="checkout">
        <div class="tong">
            <?php
                $user_id = $_SESSION['user_id'];
                $sum_cart = mysqli_query($conn,"SELECT SUM(price) as total_money FROM `course_cart` as cart INNER JOIN `courses` as c on cart.course_id = c.id  WHERE user_id = '$user_id';")or die('query failed');
                $row = mysqli_fetch_assoc($sum_cart);
                ?>
                    <h2>Tổng: <span><?php $total_money = $row['total_money']; echo $total_money;?></span></h2>
            
            <button class="btn-checkout" onclick="onOffQr()">Thanh toán</button>
        </div>
    </div>
    <div class="main-qr" id="main-qr">
        <div class="box-qr">
            <h1>Quét QR để thanh toán</h1>
            <img class="img-qr"></img>
            <p>Ngân hàng <h3>BIDV</h3></p>
            <p>Số tài khoản: <h3>0362889901</h3></p>
            <p>Tên tài khoản: <h3>Vũ Văn Tín</h3></p>
            <p>Số tiền: <h3><?php echo $row['total_money']?></h3></p>
            <button class="btn-cancel" onclick="onOffQr()">Huỷ bỏ</button>
            <a href="checkout.php" class="btn-finish" onclick="onOffQr()">Hoàn tất</a>
        </div>
    </div>
    <script src="js/user.js"></script>

    <?php include 'footer.php'?>
</body>
</html>