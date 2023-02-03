<?php
$footer = <<<EOM
<head>
<style>
// .green-bg {
//     width: 100%;
//     height: 100%;
//     background: linear-gradient(to right, #3ab19b, #4cbf91);
//     position: absolute;
//     top: 0;
//     left: 0;
//     z-index: 50;
//     transition: width 1.5s cubic-bezier(0.19, 1, 0.22, 1);
// }

// .container.change .green-bg {
//     width: 40%;
// }

// .green-bg button {
//     position: absolute;
//     top: 60%;
//     left: 50%;
//     transform: translateX(-50%);
//     width: 16rem;
//     height: 5rem;
//     background-color: transparent;
//     border: 0.1rem solid #fff;
//     border-radius: 1rem;
//     text-transform: uppercase;
//     letter-spacing: 0.1rem;
//     color: #fff;
//     cursor: pointer;
// }
.text-muted{
    display:flex;
    justify-content:center;
}
</style>
</head>
<footer class="footer mt-auto py-3 bg-light">
<div class="container">
<div class="green-bg">
    <button type="button">新規会員登録</button>
</div>
<span class="text-muted"><a href="admin/login.php">ログイン</a></span>
</div>
</footer>
EOM;
