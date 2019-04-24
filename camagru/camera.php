<?php include 'view/header.php'; ?>

	<script type="text/javascript" src="js/camera.js"></script>
<body>
    <div>
        
    </div>
    <div class="sourcevid">
        <video id="sourcevid" autoplay="true"  style='display:inline'></video>
    </div>
    <div id="main" style='height:150px;width:150px;margin:auto;display:inline'>
        <canvas id="cvs" height='150' width='150'></canvas>
    </div>
<button onclick='clone()' style='height:50px;width:80px;margin:auto'>photo</button>
<br>
<br>
<textarea id='tar' style='width:50%;height:200px;'></textarea>
</body>
 