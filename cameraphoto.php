<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width,initial scale=1">
  <title>Add Team</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style type="text/css">
    .swal2-container.swal2-center>.swal2-popup {
 background:black;
}


  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script>
                (function() {
  // The width and height of the captured photo. We will set the
  // width to the value defined here, but the height will be
  // calculated based on the aspect ratio of the input stream.

  var width = 320;    // We will scale the photo width to this
  var height = 0;     // This will be computed based on the input stream

  // |streaming| indicates whether or not we're currently streaming
  // video from the camera. Obviously, we start at false.

  var streaming = false;

  // The various HTML elements we need to configure or control. These
  // will be set by the startup() function.

  var cameravideo = null;
  var cameracanvas = null;
  var cameraphoto = null;
  var camerastartbutton = null;

  function showViewLiveResultButton() {
    if (window.self !== window.top) {
      // Ensure that if our document is in a frame, we get the user
      // to first open it in its own tab or window. Otherwise, it
      // won't be able to request permission for camera access.
      document.querySelector(".contentarea").remove();
      const button = document.createElement("button");
      button.textContent = "View live result of the example code above";
      document.body.append(button);
      button.addEventListener('click', () => window.open(location.href));
      return true;
    }
    return false;
  }

  function startup() {
    if (showViewLiveResultButton()) { return; }
    cameravideo = document.getElementById('cameravideo');
    cameracanvas = document.getElementById('cameracanvas');
    cameraphoto = document.getElementById('cameraphoto');
    camerastartbutton = document.getElementById('camerastartbutton');

    navigator.mediaDevices.getUserMedia({video: true, audio: false})
    .then(function(stream) {
      cameravideo.srcObject = stream;
      cameravideo.play();
    })
    .catch(function(err) {
      console.log("An error occurred: " + err);
    });

    cameravideo.addEventListener('canplay', function(ev){
      if (!streaming) {
        height = cameravideo.videoHeight / (cameravideo.videoWidth/width);
      
        // Firefox currently has a bug where the height can't be read from
        // the video, so we will make assumptions if this happens.
      
        if (isNaN(height)) {
          height = width / (4/3);
        }
      
        cameravideo.setAttribute('width', width);
        cameravideo.setAttribute('height', height);
        cameracanvas.setAttribute('width', width);
        cameracanvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    camerastartbutton.addEventListener('click', function(ev){
      takepicture();
      ev.preventDefault();
    }, false);
    
    clearphoto();
  }

  // Fill the photo with an indication that none has been
  // captured.

  function clearphoto() {
    var context = cameracanvas.getContext('2d');
    context.fillStyle = "#AAA";
    context.fillRect(0, 0, cameracanvas.width, cameracanvas.height);

    var data = cameracanvas.toDataURL('image/png');
    cameraphoto.setAttribute('src', data);
  }
  
  // Capture a photo by fetching the current contents of the video
  // and drawing it into a canvas, then converting that to a PNG
  // format data URL. By drawing it on an offscreen canvas and then
  // drawing that to the screen, we can change its size and/or apply
  // other changes before drawing it.

  function takepicture() {
    var context = cameracanvas.getContext('2d');
    if (width && height) {
      cameracanvas.width = width;
      cameracanvas.height = height;
      context.drawImage(cameravideo, 0, 0, width, height);
    
      var data = cameracanvas.toDataURL('image/png');
      cameraphoto.setAttribute('src', data);
    } else {
      clearphoto();
    }
  }

  // Set up our event listener to run the startup process
  // once loading is complete.
  window.addEventListener('load', startup, false);
})();


</script>
</head>


<style type="text/css">.swal2-title {
    position: relative;
    max-width: 100%;
    margin: 0;
    padding: 0.8em 1em 0;
    color: white;
    font-size: 1.875em;
    font-weight: 600;
    text-align: center;
    text-transform: none;
    word-wrap: break-word;
}
</style>
<style type="text/css">.cameracontentarea {
    font-size: 16px;
    font-family: "Lucida Grande", "Arial", sans-serif;
    width: 760px;
  }
</style>
<style type="text/css">#camerastartbutton {
    display: block;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    bottom: 32px;
    background-color: rgba(0, 150, 0, 0.5);
    border: 1px solid rgba(255, 255, 255, 0.7);
    box-shadow: 0px 0px 1px 2px rgba(0, 0, 0, 0.2);
    font-size: 14px;
    font-family: "Lucida Grande", "Arial", sans-serif;
    color: rgba(255, 255, 255, 1);
  }
</style>
<style type="text/css">.cameraoutput {
    width: 340px;
    display: inline-block;
    vertical-align: top;
  }
</style>
<style type="text/css">.camera {
    width: 340px;
    display: inline-block;
  }
</style>
<style type="text/css">#cameracanvas {
    display: none;
  }
</style>
<style type="text/css">#cameraphoto {
    border: 1px solid black;
    box-shadow: 2px 2px 3px black;
    width: 320px;
    height: 240px;
  }
</style>
<style type="text/css">#cameravideo {
    border: 1px solid black;
    box-shadow: 2px 2px 3px black;
    width: 320px;
    height: 240px;
  }

</style>









  <div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <form class="sign-up-form form" action="" id="camerascform" method="POST" style="margin-top: 3%;" class="col-sm-10 col-md-4 col-lg-2">
<input type="hidden" name="robotphoto" id="robotphoto" value="">
<input type="hidden" name="pteamid" id="pteamid" value="">
<input type="hidden" name="drivetrain" id="drivetrain" value="">

<div class="cameracontentarea">
<div class="camera">
  <video id="cameravideo" width="320" height="240">Video yok</video>  
    <button id="camerastartbutton">çek</button> 
  </div>
  <canvas id="cameracanvas" width="320" height="240">
  </canvas>
 <div class="cameraoutput">
 <img id="cameraphoto" alt="The screen capture will appear in this box."> 
</div>
<input class="form-input" type="text" name="drivetrain" id="drivetrain" placeholder="Drive Train" required>  
<br>
<input class="form-input" type="number" name="pteamid" id="pteamid" placeholder="Takım Numarasını Girin" required>  
</div>



      <input type="submit" name="" value="Gönder" onclick="PostToMainPage()" class="form-btn primary-default-btn transparent-btn">
      <input type="button" name="" onclick="history.back()" style="background-color: red" class="form-btn primary-default-btn transparent-btn" value="Geri Dön">
    </form>
  </article>
</main>
<!-- ! Footer -->
<footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p>-Vually-<a href="##" target="_blank"
          rel="noopener noreferrer">#Team 6459</a></p>
    </div>

  </div>
</footer>
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
<?php 


 ?>




  function PostToMainPage(){
 
document.getElementById("cameracanvas").style.border = "2px solid";
var dataURL = cameracanvas.toDataURL();
console.log(dataURL);

document.getElementById("robotphoto").value = dataURL;
document.getElementById("camerascform").action = "photosave.php";
document.getElementById("camerascform").submit();


  }


  function save() {
            PostToMainPage();
        }
</script>
</body>

</html>