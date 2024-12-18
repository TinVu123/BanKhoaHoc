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
    <style>
        *{
            color: black;
        }
        .main21{
            margin-top: 18px;
            width: 100%;
            display: flex
        }
        .video-title{
            width:75% ;
            height: 629px;
            overflow: auto;

        }
        .video{
            height: 550px;
            background-color: black;
        }
        .video-item{
            width: 100%;
            height: 100%;
            margin: 0 auto;
        }
        .list-video{
            width: 25%;
            height: 699px;
            overflow: auto;


        }
        .list-video a{
            display: block;
            padding: 3px;
            background-color: #F1F1F1;

            margin-left: 0px;
            border-bottom: 1px solid lightgrey;
        }
        .footer-next-video{
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 50px;
            background-color: lightgray;
            color: white;
            text-align: center;
        }
        .title{
            padding: 8px;
            font-size: 24px;
            font-weight: 500;
        }
        .btn-next{
            display: inline-block;
            width: auto;
            margin-top: 10px;
            margin-left: 40px;
            padding: 6px 14px;
            font-size: 16px;
            background-color: lightcoral;
            border-radius: 16px;
        }
        .btn-pre{
            display: inline-block;
            width: auto;
            margin-top: 10px;
            margin-right: 40px;
            padding: 6px 14px;
            font-size: 16px;
            background-color: lightsalmon;
            border-radius: 16px;
        }
        .title-item{
            padding: 3px;
            padding-left: 12px;
            font-size: 17px;
            font-weight: 500;
        }
        .duration{
            padding: 2px;
            font-size: 15px;
            padding-left: 12px;
            color: gray;

        }
  
    </style>
</head>
<body>
    <?php include 'header_study.php'?>
    <div class="main21">
        <div class="video-title">
            <div class="video">
                <?php
                $course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
                if ($course_id > 0) {
                    $sql = '';
                    if(isset($_GET['video_id'])){
                        $video_id = intval($_GET['video_id']);
                        $sql = "SELECT video, title FROM `course_videos` WHERE course_id = $course_id AND id = '$video_id';";
                    }
                    else{
                        $sql = "SELECT video, title FROM `course_videos` WHERE course_id = $course_id limit 1";
                    }
                    $fetch_video = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($fetch_video) > 0) {
                        while ($row = mysqli_fetch_assoc($fetch_video)) {
                            ?>
                            <video src="uploaded_video/<?php echo htmlspecialchars($row['video']); ?>" controls class="video-item"></video>
                            <p class="title"><?php echo htmlspecialchars($row['title']); ?></p>
                            <?php
                        }
                    }
                } 
                ?>
            </div>
        </div>

        <div class="list-video">
            <?php
                $course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
                if ($course_id > 0) {
                    $sql = "SELECT * FROM `course_videos` WHERE course_id = $course_id";
                    $fetch_video = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($fetch_video) > 0) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($fetch_video)) {?>
                            <a href="study.php?course_id=<?php echo $course_id;?>&video_id=<?php echo $row['id'];?>" class="link-video">
                                 <p class="title-item">Bài <?php $i+=1; echo ($i) . ". " . htmlspecialchars($row['title']); ?>
                                 </p>
                                <p class="duration"><?php echo $row['duration'];?></p>
                            </a>
            <?php
                        }
                    } 
                }
            ?>
        </div>
    </div>
    
    <div class="footer-next-video">
        <a class="btn-pre">Bài trước</a>
        <a class="btn-next">Bài tiếp theo</a>
    </div>
</body>
</html>