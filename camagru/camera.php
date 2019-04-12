<?php include 'header.php'; ?>

	<script type="text/javascript" src="camera.js"></script>
<body>
    <video id="sourcevid" height='400' width='400' autoplay="true"  style='display:inline'></video>
    <div id="main" style='height:150px;width:150px;margin:auto;display:inline'>
    <canvas id="cvs" height='150' width='150'></canvas>
    </div>
<button onclick='clone()' style='height:50px;width:80px;margin:auto'>photo</button>
<textarea id='tar' style='width:50%;height:200px;'></textarea>
</body>
 