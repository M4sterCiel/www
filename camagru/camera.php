<?php include 'view/header.php';
session_start();
if (!$_SESSION['logd_on'])
    header('Location: /camagru/index.php');
?>
	<script type="text/javascript" src="js/camera.js"></script>
<body>
    <div id="calque" class="calque-div">
        <a href="#"><img class="layer-img" src="/camagru/img/pitcher.png" alt="pitcher" onclick="layer(this)"></a>
        <a href="#"><img class="layer-img" src="/camagru/img/flowers.png" alt="flowers" onclick="layer(this)"></a>
        <a href="#"><img class="layer-img" src="/camagru/img/linux.png" alt="linux" onclick="layer(this)"></a>
    </div>
    <div class="cam-div">
        <div id="gallery-cam" class="gallery-cam-div">
            <div id="main" style='height:150px;width:150px;margin:auto;display:inline'>
            <canvas id="cvs" width="1280" height="720"></canvas>
            </div>
        </div>
        <div id="source-cam-div" class="sourcevid">
            <video id="sourcevid" autoplay="true"  style='display:inline'></video>
        </div>
    </div>
    <br>
<button id="cam-btn" disabled>Take a pic!</button>
<form action="/action_page.php">
  Select a file: <input type="file" name="myFile" value="Browse..."><br><br>
  <input type="submit">
</form>
<textarea id='tar' style='width:50%;height:200px;'></textarea>
</body>
 