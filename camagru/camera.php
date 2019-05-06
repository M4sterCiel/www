<?php include 'view/header.php';
session_start();
if (!$_SESSION['logd_on'])
    header('Location: /camagru/index.php');
?>
	<script type="text/javascript" src="js/camera.js"></script>
<body>
    <div id="calque" class="calque-div">
        <a href="#"><img class="layer-img" src="/camagru/img/pitcher.png" alt="pitcher" onclick="layer(this)"></a>
        <a href="#"><img class="layer-img" src="/camagru/img/linux.png" alt="linux" onclick="layer(this)"></a>
        <a href="#"><img class="layer-img" src="/camagru/img/android.png" alt="android" onclick="layer(this)"></a>
        <a href="#"><img class="layer-img" src="/camagru/img/apple.png" alt="apple" onclick="layer(this)"></a>
        <a href="#"><img class="layer-img" src="/camagru/img/windows.png" alt="windows" onclick="layer(this)"></a>
    </div>
    <div class="cam-div">
        <div id="gallery-cam" class="gallery-cam-div">
            <canvas id="cvs" width="800" height="600"></canvas>
            </div>
        </div>
        <div id="source-cam-div" class="sourcevid" name="selected">
            <video id="sourcevid" autoplay="true"  style='display:inline'></video>
        </div>
    </div>
    <br>
<button id="cam-btn" disabled>Take a pic!</button>
<form id="myForm">
    Choose a picture. Max 5Mo. <br>
    <input onchange="upload(this.files)" id="file" type="file" name="myFile" value="" accept="image/png, image/jpeg" style="margin-bottom: 3%;">
</form>
<br><br>
</body>
 