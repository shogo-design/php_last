<?php
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
loginCheck();

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM gs_content_table');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    $contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?= head_parts('管理画面') ?>
    <style>
        * {
    margin: 0;
    padding: 0;
}


.container {
    width: 100%;
    height: 100vh;
    background-size: cover;
}

.heading {
    color: #fff;
    font-size: 70px;
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translateX(-50%);
    font-family: 'Josefin Sans', sans-serif;
    text-transform: uppercase;
    letter-spacing: 5px;
    text-align: center;
    white-space: pre-wrap;
}

.heading::after {
    content: '';
    width: 5px;
    height: 55px;
    background-color: #fff;
    position: absolute;
    animation: blinking 1s 3s infinite;
}

@keyframes blinking {
    0% {background-color: #fff}
    50% {background-color: transparent}
    100% {background-color: #fff}
}

.cards-wrapper {
    width: 80%;
    display: flex;
    justify-content: space-evenly;
    position: relative;
    top: 35%;
    left: 50%;
    transform: translateX(-50%);
}

.card {
    width: 280px;
    background-color: #eee;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    transition: transform .5s;
}

@keyframes cardAnim {
    0% {opacity: 0}
    100% {opacity: 1}
}

.card:nth-child(1) {
    animation: cardAnim 0.5s 1s backwards;
}

.card:nth-child(2) {
    animation: cardAnim 1s 1.5s backwards;
}

.card:nth-child(3) {
    animation: cardAnim 0.5s 1s backwards;
}

.card:hover {
    transform: scale(1.1);
}

.image-top {
    width: 100%;
    height: 220px;
    object-fit: cover;
    -webkit-clip-path: polygon(0 0, 100% 0, 100% 73%, 0% 100%);
    clip-path: polygon(0 0, 100% 0, 100% 73%, 0% 100%);
}

.profile-image {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    margin-top: -110px;
    z-index: 10;
    border: 10px solid #eee;
}

.card h1 {
    font-family: 'Ubuntu', sans-serif;
    font-size: 22px;
    color: #555;
    margin: 10px;
}

.job {
    font-family: 'Montserrat', sans-serif;
    color: #777;
    font-weight: 300;
}

.about-me {
    font-family: 'Josefin Sans', sans-serif;
    font-size: 14px;
    width: 90%;
    margin: 15px 0;
    font-style: italic;
    color: #444;
    text-align: center;
}

.card button {
    width: 120px;
    padding: 7px;
    margin: 10px 0;
    background-color: tomato;
    border: none;
    outline: none;
    border-radius: 25px;
    font-family: 'Josefin Sans', sans-serif;
    color: #eee;
    box-shadow: 5px 5px 20px rgba(0, 0, 0, .4);
}

.card:hover button {
    animation: buttonRotation 2s 1s linear;
}

@keyframes buttonRotation {
    0% {transform: scale(1) rotateZ(0)}
    5% {transform: scale(1.2) rotateZ(5deg)}
    10% {transform: scale(1.2) rotateZ(-5deg)}
    15% {transform: scale(1.2) rotateZ(5deg)}
    20% {transform: scale(1.2) rotateZ(-5deg)}
    25% {transform: scale(1.2) rotateZ(5deg)}
    30% {transform: scale(1.2) rotateZ(-5deg)}
    35% {transform: scale(1.2) rotateZ(5deg)}
    40% {transform: scale(1.2) rotateZ(-5deg)}
    45% {transform: scale(1.2) rotateZ(5deg)}
    50% {transform: scale(1.2) rotateZ(-5deg)}
    55% {transform: scale(1.2) rotateZ(5deg)}
    60% {transform: scale(1.2) rotateZ(-5deg)}
    65% {transform: scale(1.2) rotateZ(5deg)}
    70% {transform: scale(1.2) rotateZ(-5deg)}
    75% {transform: scale(1.2) rotateZ(5deg)}
    80% {transform: scale(1.2) rotateZ(-5deg)}
    85% {transform: scale(1.2) rotateZ(5deg)}
    90% {transform: scale(1.2) rotateZ(-5deg)}
    95% {transform: scale(1.2) rotateZ(5deg)}
    100% {transform: scale(1) rotateZ(0)}
}


@media(max-width: 1300px) {
    .heading {
        font-size: 65px;
        width: 80%;
    }

    .cards-wrapper {
        width: 100%;
        top: 32%;
    }

    .image-top {
        height: 200px;
    }
}

@media(max-width: 1000px) {
    .container {
        height: 100%;
    }
    .heading {
        width: 90%;
    }

    .cards-wrapper {
        flex-wrap: wrap;
        padding: 300px 0 200px 0;
    }

    .card {
        margin: 0 30px 50px 30px;
    }
}

@media(max-width: 700px) {
    .heading {
        font-size: 50px;
    }

    .heading::after {
        height: 40px;
    }
}

@media(max-width: 450px) {
    .heading {
        font-size: 40px;
    }

    .heading::after {
        height: 33px;
    }

    .cards-wrapper {
        padding: 250px 0 150px 0;
    }
}
        .navbar{
            background: linear-gradient(to right, #3ab19b, #4cbf91);
        }
        .social-icons {
    width: 150px;
    list-style: none;
    display: flex;
    justify-content: space-evenly;
    margin: 10px 0 20px 0;
    border-top: 1px solid #999;
    padding-top: 20px;
}
    </style>
</head>

<body id="main">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">ホーム</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="post.php">投稿する</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">PF一覧</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">ログアウト</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="card-body">
            <div class="card">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($contents as $content): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php if($content['img']) : ?>
                                <!-- 画像が登録されている場合は↓ -->
                                <img src="../images/<?= $content['img'] ?>" alt="" class="bd-placeholder-img card-img-top" >
                            <?php else : ?>
                                <!-- 画像が登録されていない場合↓ -->
                                <img src="../images/default_image/no_image_logo.png" alt="" class="bd-placeholder-img card-img-top" >
                            <?php endif ?>
                <h3 class="fullname"><?= $content['title'] ?></h3>
                <h3 class="job"><?= $content['job'] ?></h3>
                <p class="card-text"><?= nl2br($content['content']) ?></p>
                 <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">登録日:<?= $content['date'] ?></small>
                                </div>
                                <?php if (!is_null($content['update_time'])): ?>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">更新日:<?= $content['update_time'] ?></small>
                                </div>
                                <?php endif ?>
                                <a href="detail.php?id=<?=$content['id']?>" class="btn btn-outline-info stretched-link"><button type="button">編集する</button></a>
                            </div>
            </div>
                                
                                
                                
                               
                        </div>
                    </div>
                <!-- </a> -->
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>
</html>