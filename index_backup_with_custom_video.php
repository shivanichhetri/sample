<?php include_once('includes/header.php');?>
  
  <section class="page-container">
    <div class="home-content page video-bk">

      <video class="vid" id="video0" loop muted="muted" autoplay="autoplay" poster="images/homepage-video-poster.jpg">
        <source src="video/wwf-in-nepal.webm" type="video/webm"><!--;codecs=&quot;vp8, vorbis&quot;-->
        <source src="video/wwf-in-nepal.mp4" type="video/mp4"><!--;codecs=&quot;avc1.42E01E, mp4a.40.2&quot;-->
      </video>

      <!--<div class="videoBanner whiteText">
        78,000 sq. km.<br>
        <span>of a working area</span>
      </div>-->
      <div class="videoText whiteText">
        20 years of conservation partnerships
      </div>
      <nav>
        <div id="buttons">
          <button type="button" id="playButton" class="PauseIcon">Pause</button><!--PauseIcon-->
        </div>
        <div id="defaultBar">
          <div id="progressBar"></div>
        </div>
        <div class="progressTime">
           <span id="currentTime"></span>
           <span id="duration"></span>
        </div>
        <div class="clear"></div>
      </nav>
    </div>
  </section> <!-- container -->

  <section class="MessageImg">
    <div class="page-container fullImage">
      <!--<img src="images/representative-message.jpg" alt="" class="fullWidth">-->
      <div class="textSection">
        <div class="col-lg-4 col-md-6">
          <div class="MessageSection whiteText">
            <h1>Message From the Country Representative</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut </p>
          </div>
        </div>
      </div>
    </div> <!-- container -->
  </section>
<?php include_once('includes/footer.php');?>
<style>
.home-content {
  height: 100%;
  position: relative;
  overflow: hidden;
}
</style>
<script>
  $(document).ready(function() {
    $('.page-container').height( $(window).height() );
  });
  $(window).resize(function() {
    $('.page-container').height( $(window).height() );
  });


  //for video
function doFirst() {
  barSize = $('#defaultBar').width();//600
  myMovie = document.getElementById('video0');
  playButton = document.getElementById('playButton');
  bar = document.getElementById('defaultBar');
  progressBar = document.getElementById('progressBar');

  playButton.addEventListener('click', playOrPause, false);
  bar.addEventListener('click', clickedBar, false);
  updateBar=setInterval(update,100);
}
function playOrPause() {
  if(!myMovie.paused && !myMovie.ended) {
    myMovie.pause();
    //playButton.innerHTML = 'Play';
    $('#playButton').removeClass('PauseIcon');
    window.clearInterval(updateBar);
  }
  else {
    myMovie.play();
    //playButton.innerHTML='Pause';
    $('#playButton').addClass('PauseIcon');
    updateBar=setInterval(update,100);
  }
}
function update() {
  if(!myMovie.ended) {
    var size=parseInt(myMovie.currentTime*barSize/myMovie.duration);
    progressBar.style.width=size+'px';
  }else {
    progressBar.style.width='0px';
    //playButton.innerHTML='Play';
    //$('#playButton').removeClass('PauseIcon');
    window.clearInterval(updateBar);
  }
}
function clickedBar(e) {
  if(!myMovie.paused && !myMovie.ended) {
    var mouseX = e.pageX-bar.offsetLeft;
    var newtime = mouseX*myMovie.duration/barSize;
    myMovie.currentTime=newtime;
    progressBar.style.width=mouseX+'px';
  }
}
window.addEventListener('load',doFirst);

$('.home-content').hover(function() {
  $('#buttons').stop(true, false).fadeIn('slow');
}, function() {
  $('#buttons').stop(true, false).fadeOut('slow');
});

//Video current Time
var video = document.getElementById('video0');

//get HTML5 video time duration
video.ontimeupdate = function() {videoTime()};

function videoTime() {
    // Display the current position of the video
    document.getElementById("currentTime").innerHTML = secondstotime(video.currentTime);
    document.getElementById("duration").innerHTML = secondstotime(video.duration);
}

function secondstotime(secs)
{
    var t = new Date(1970,0,1);
    t.setSeconds(secs);
    var s = t.toTimeString().substr(3,5);
    /*if(secs > 86399)
      s = Math.floor((t - Date.parse("1/1/70")) / 3600000) + s.substr(2);*/
    return s;
}
 
</script>
