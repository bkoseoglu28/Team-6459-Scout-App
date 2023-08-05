<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width,initial scale=1">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
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
        /**
     * sends a request to the specified url from a form. this will change the window location.
     * @param {string} path the path to send the post request to
     * @param {object} params the parameters to add to the url
     * @param {string} [method=post] the method to use on the form
     */
    var currentcolor = 'blue';
    function post(path, params, method='post') {
    
      // The rest of this code assumes you are not using a library.
      // It can be made less verbose if you use one.
      const form = document.createElement('form');
      form.method = method;
      form.action = path;
    
      for (const key in params) {
        if (params.hasOwnProperty(key)) {
          const hiddenField = document.createElement('input');
          hiddenField.type = 'hidden';
          hiddenField.name = key;
          hiddenField.value = params[key];
    
          form.appendChild(hiddenField);
        }
      }
    
      document.body.appendChild(form);
      form.submit();
    }
    
        // Variables for referencing the canvas and 2dcanvas context
        var canvas,ctx;
    
        // Variables to keep track of the mouse position and left-button status 
        var mouseX,mouseY,mouseDown=0;
    
        // Variables to keep track of the touch position
        var touchX,touchY;
    
        // Draws a dot at a specific position on the supplied canvas name
        // Parameters are: A canvas context, the x position, the y position, the size of the dot
        function drawDot(ctx,x,y,size) {
            // Let's use black by setting RGB values to 0, and 255 alpha (completely opaque)
            r=0; g=0; b=255; a=255;
    
            // Select a fill style
    
            if (currentcolor == 'red'){
          ctx.fillStyle = "rgba("+255+","+0+","+0+","+(a/255)+")";
        }else{
           ctx.fillStyle = "rgba("+r+","+g+","+b+","+(a/255)+")";
        }
           
    
            // Draw a filled circle
            ctx.beginPath();
            ctx.arc(x, y, size, 0, Math.PI*2, true); 
            ctx.closePath();
            ctx.fill();
        } 
    
        // Clear the canvas context using the canvas width and height
        function clearCanvas(canvas,ctx) {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }
    
        // Keep track of the mouse button being pressed and draw a dot at current location
        function sketchpad_mouseDown() {
            mouseDown=1;
            drawDot(ctx,mouseX,mouseY,4);
        }
    
        // Keep track of the mouse button being released
        function sketchpad_mouseUp() {
            mouseDown=0;
        }
    
        // Keep track of the mouse position and draw a dot if mouse button is currently pressed
        function sketchpad_mouseMove(e) { 
            // Update the mouse co-ordinates when moved
            getMousePos(e);
    
            // Draw a dot if the mouse button is currently being pressed
            if (mouseDown==1) {
                drawDot(ctx,mouseX,mouseY,4);
            }
        }
    
        // Get the current mouse position relative to the top-left of the canvas
        function getMousePos(e) {
            if (!e)
                var e = event;
    
            if (e.offsetX) {
                mouseX = e.offsetX;
                mouseY = e.offsetY;
            }
            else if (e.layerX) {
                mouseX = e.layerX;
                mouseY = e.layerY;
            }
         }
    
        // Draw something when a touch start is detected
        function sketchpad_touchStart() {
            // Update the touch co-ordinates
            getTouchPos();
    
            drawDot(ctx,touchX,touchY,4);
    
            // Prevents an additional mousedown event being triggered
            event.preventDefault();
        }
    
        // Draw something and prevent the default scrolling when touch movement is detected
        function sketchpad_touchMove(e) { 
            // Update the touch co-ordinates
            getTouchPos(e);
    
            // During a touchmove event, unlike a mousemove event, we don't need to check if the touch is engaged, since there will always be contact with the screen by definition.
            drawDot(ctx,touchX,touchY,4); 
    
            // Prevent a scrolling action as a result of this touchmove triggering.
            event.preventDefault();
        }
    
        // Get the touch position relative to the top-left of the canvas
        // When we get the raw values of pageX and pageY below, they take into account the scrolling on the page
        // but not the position relative to our target div. We'll adjust them using "target.offsetLeft" and
        // "target.offsetTop" to get the correct values in relation to the top left of the canvas.
        function getTouchPos(e) {
            if (!e)
                var e = event;
    
            if(e.touches) {
                if (e.touches.length == 1) { // Only deal with one finger
                    var touch = e.touches[0]; // Get the information for finger #1
                    touchX=touch.pageX-touch.target.offsetLeft;
                    touchY=touch.pageY-touch.target.offsetTop;
                }
            }
        }
    
    
        // Set-up the canvas and add our event handlers after the page has loaded
        function init() {
            // Get the specific canvas element from the HTML document
            canvas = document.getElementById('sketchpad');
    
            // If the browser supports the canvas tag, get the 2d drawing context for this canvas
            if (canvas.getContext)
                ctx = canvas.getContext('2d');
    
            // Check that we have a valid context to draw on/with before adding event handlers
            if (ctx) {
                // React to mouse events on the canvas, and mouseup on the entire document
                canvas.addEventListener('mousedown', sketchpad_mouseDown, false);
                canvas.addEventListener('mousemove', sketchpad_mouseMove, false);
                window.addEventListener('mouseup', sketchpad_mouseUp, false);
    
                // React to touch events on the canvas
                canvas.addEventListener('touchstart', sketchpad_touchStart, false);
                canvas.addEventListener('touchmove', sketchpad_touchMove, false);
            }
        }
    
        
    
        function SetColor(color){
          if (color == 'red'){
            currentcolor = 'red';
          }else{
            currentcolor = 'blue';
          }
        }

  </script>
</head>

<body onload="init()">
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
  <div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <form class="sign-up-form form" action="" id="scform" method="POST" style="margin-top: 3%;" class="col-sm-10 col-md-4 col-lg-2">
<input type="hidden" name="imagerawdata" id="imagerawdata" value="">
<input type="hidden" name="otohighkoni" id="otohighkoni" value="0">
<input type="hidden" name="otomidkoni" id="otomidkoni" value="0">
<input type="hidden" name="otolowkoni" id="otolowkoni" value="0">
<input type="hidden" name="lowkoni" id="lowkoni" value="0">
<input type="hidden" name="highkoni" id="highkoni" value="0">
<input type="hidden" name="midkoni" id="midkoni" value="0">
<input type="hidden" name="otohighkupumsu" id="otohighkupumsu" value="0">
<input type="hidden" name="otomidkupumsu" id="otomidkupumsu" value="0">
<input type="hidden" name="otolowkupumsu" id="otolowkupumsu" value="0">
<input type="hidden" name="lowkupumsu" id="lowkupumsu" value="0">
<input type="hidden" name="highkupumsu" id="highkupumsu" value="0">
<input type="hidden" name="midkupumsu" id="midkupumsu" value="0">
<input type="hidden" name="chargingstationstatus" id="chargingstationstatus" value="0">
<input type="hidden" name="notes" id="notes" value="">
<input type="hidden" name="teamid" id="teamid" value="">
<input type="hidden" name="matchid" id="matchid" value="">
<input type="hidden" name="penalties" id="penalties" value="">
      <input type="hidden" name="hangarcheckbox" id="hangarcheckbox" value="0">
      <input type="hidden" name="ballcheckbox" id="ballcheckbox" value="0">
      <input type="hidden" name="defanscheckbox" id="defanscheckbox" value="0">

      <div id="sketchpadapp">
        <div class="leftside">
          <input type="button" value="Clear" id="clearbutton" onclick="clearCanvas(canvas,ctx);">
          <input onclick="save()" type="button" value="Kaydet" name="Save">
          <input type="button" onclick="SetColor('red')" name="" value="Red">
          <input type="button" onclick="SetColor('blue')" name="" value="Blue">

          <div class="rightside">
            <canvas id="sketchpad" height="426" width="604" style="background-image: url('field.png'); background-size: 604px 426px; margin-top: 20px; margin-bottom: 20px; border: 5px solid #eee;">
            </canvas>
          </div>
        </div>
      </div>



      <input type="button" name="" value="Gönder" onclick="PostToMainPage()" class="form-btn primary-default-btn transparent-btn">
    </form>
  </article>
</main>
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
<?php 

if($_POST){
  echo 'otohighkoni = '. $_POST["otohighkoni"].';
  ';
  echo 'otomidkoni = '. $_POST["otomidkoni"].';
  ';
  echo 'otolowkoni = '. $_POST["otolowkoni"].';
  ';
  echo 'lowkoni = '. $_POST["lowkoni"].';
  ';
  echo 'highkoni = '. $_POST["highkoni"].';
  ';
  echo 'midkoni = '. $_POST["midkoni"].';
  ';
  echo 'otohighkupumsu = '. $_POST["otohighkupumsu"].';
  ';
  echo 'otomidkupumsu = '. $_POST["otomidkupumsu"].';
  ';
  echo 'otolowkupumsu = '. $_POST["otolowkupumsu"].';
  ';
  echo 'lowkupumsu = '. $_POST["lowkupumsu"].';
  ';
  echo 'highkupumsu = '. $_POST["highkupumsu"].';
  ';
  echo 'midkupumsu = '. $_POST["midkupumsu"].';
  ';
  echo 'document.getElementById("chargingstationstatus").value = '. $_POST["chargingstationstatus"].';
  ';
  
  if($_POST["teamid"] == ""){
    echo 'document.getElementById("teamid").value = 0;
    ';
  }else{
    echo 'document.getElementById("teamid").value = '.$_POST["teamid"].';
  ';
  }
  
  echo 'document.getElementById("notes").value = "'. $_POST["notes"].'";
  ';
  echo 'document.getElementById("defanscheckbox").value = "'. $_POST["defanscheckbox"].'";
  ';
  echo 'document.getElementById("ballcheckbox").value = "'. $_POST["ballcheckbox"].'";
  ';
  echo 'document.getElementById("hangarcheckbox").value = "'. $_POST["hangarcheckbox"].'";
  ';
  echo 'document.getElementById("matchid").value = "'.$_POST["matchid"].'";
  ';
  echo 'document.getElementById("penalties").value = "'.$_POST["penalties"].'";
  ';
  
}

 ?>


  function PostToMainPage(){
 
document.getElementById("sketchpad").style.border = "2px solid";
var dataURL = canvas.toDataURL();
console.log(dataURL);

document.getElementById("imagerawdata").value = dataURL;
document.getElementById("scform").action = "Rapor.php";
document.getElementById("scform").submit();


  }


  function save() {
            PostToMainPage();
        }
</script>
</body>

</html>