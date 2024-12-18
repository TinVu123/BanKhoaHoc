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
        @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" );

        *{
            margin: 0;
            padding: 0;
            font-family: roboto;
            /* font-size: 18px; */
            box-sizing: border-box;
            text-decoration: none;
        }
        .logo{
            font-size: 30px;
            font-weight: 600;
            color: lightskyblue;
        }
        .header{
            background-color: white;
            height: 56px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 20px;
            padding-right: 20px;
            border-bottom: 1px solid #B8B8B8;
            position: fixed;
            z-index: 1000;
            top: 0; right: 0; left: 0;
        }
        .search{
            width: 30%;
            height: 42px;
        }
        .search input{
            width: 100%;
            height: 100%;
            border-radius: 20px;
            border: 1.5px solid #B8B8B8;
            padding-left: 40px;
        }
        .search {
            display:flex;
            flex-direction:row;
            position: relative;
        }
        .search button{
            position: absolute;
            padding: 10px;
            font-size: 16px;
            border: none;
            margin: 2px;
            color: #B8B8B8;
            background-color: white;
            top: 0; left: 0; bottom: 0;
            border-radius: 20px 0px 0px 20px;
        }
       
        .my-course{
            display: none;
            position: absolute;
            background-color: lightblue;
            top: 66px;
            right: 50px;
            width: 400px;
            padding: 10px;
            margin-top: 10px;
            border-radius: 10px 10px 10px 10px;

        }
        .active-my-course{
            display: block;
        }
        .item {
            display: flex;
            margin-bottom: 20px;
        }
        .item img{
            width: 140px;
            height: 90px;
            margin-right:  10px;
        }
        .header #user-info {
            position: absolute;
            top: 66px;
            right: 20px;
            width: 15rem;
            padding: 10px;
            border-radius: 8px;
            border: #333333 1px solid;
            background-color: whitesmoke;
            margin-right: 10px;
            display: none;


        }
        #user-info.active-user{
            display: block;
        }

        .user-icon i{
            padding: 14px;
        }
        .btn-my-course{
            border: none;
            background-color: white;
            font-size: 18px;
        }
        i{
            font-size: 19px;
        }

        .fa-cart-shopping{
            position: relative;
        }

        .number-cart{
            position: absolute;
            top: 4px;right: 4px;
            
            font-size: 14px;
        }
        
    </style>
</head>
<body>
    <div class="header">
            <a class="logo" href="home.php">
                Bán khoá học
            </a>
      
       
    </div>
    </div>
    <script src="js/user.js"></script>
</body>
</html>