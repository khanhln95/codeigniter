function slideTab(id) {
	$(id).royalSlider({
		fullscreen: {
			enabled: true,
			nativeFS: true
		},
		autoPlay: {
    		enabled: true,
    		pauseOnHover: false,
			stopAtAction:false,
    	},
		controlNavigation: 'thumbnails',
		thumbs: {
			orientation: 'vertical',
			paddingBottom: 4,
			appendSpan: true
		},
		transitionType:'fade',
		autoScaleSlider: true, 
		autoScaleSliderWidth: 960,     
		autoScaleSliderHeight: 600,
		loop: true,
		arrowsNav: true,
		keyboardNavEnabled: true
	});
}


<div class="royalSlider rsUni slidebt <?=(count($hinh_anh_slide<6)) ? 'top' : ''?>" id="tab-slide">
	<?php foreach($hinh_anh_slide as $item) {?>
	 <a class="rsImg" data-rsBigImg="<?=URLPATH ?>img_data/images/<?=$item['hinh_anh'] ?>" href="<?=URLPATH ?>img_data/images/<?=$item['hinh_anh'] ?>">
		Vincent van Gogh - Still Life: Vase with Twelve Sunflowers
		<img width="150" class="rsTmb" src="<?=URLPATH ?>thumb.php?src=<?=URLPATH ?>img_data/images/<?=$item['hinh_anh'] ?>&w=150&h=113" />
	 </a>
	 <?php } ?>
</div>











////videooooooooo
default

  <script>
      jQuery(document).ready(function($) {
  $('#video-gallery').royalSlider({
    arrowsNav: false,
    fadeinLoadedSlide: true,
    controlNavigationSpacing: 0,
    controlNavigation: 'thumbnails',
    thumbs: {
      autoCenter: false,
      fitInViewport: true,
      orientation: 'vertical',
      spacing: 0,
      paddingBottom: 0
    },
    keyboardNavEnabled: true,
    imageScaleMode: 'fill',
    imageAlignCenter:true,
    slidesSpacing: 0,
    loop: false,
    loopRewind: true,
    numImagesToPreload: 3,
    video: {
      autoHideArrows:true,
      autoHideControlNav:false,
      autoHideBlocks: true,
      youTubeCode: '<iframe src="https://www.youtube.com/embed/%id%?rel=1&autoplay=1&showinfo=0" frameborder="no" allowFullscreen></iframe>'
    }, 
    autoScaleSlider: true, 
    autoScaleSliderWidth: 960,     
    autoScaleSliderHeight: 450,

    /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
    imgWidth: 640,
    imgHeight: 360

  });
});

    </script>


<div id="video-gallery" class="royalSlider videoGallery rsDefault">
  <a class="rsImg" data-rsw="843" data-rsh="473" data-rsVideo="http://www.youtube.com/watch?v=HFbHRWwyihE" href="http://dimsemenov.com/plugins/royal-slider/img/admin-video.png">
    <div class="rsTmb">
      <h5>New RoyalSlider</h5>
      <span>by Dmitry Semenov</span>
    </div>
  </a>
  <div class="rsContent">
    <a class="rsImg" data-rsVideo="https://vimeo.com/31240369" href="http://b.vimeocdn.com/ts/210/393/210393954_640.jpg">
      <div class="rsTmb">
        <h5>I Believe I Can Fly</h5>
        <span>by Sebastien Montaz-Rosset</span>
      </div>
    </a>
    <h3 class="rsABlock sampleBlock">Animated block, to show you that you can put anything you want inside each slide.</h3>
  </div>
   <a class="rsImg" data-rsVideo="https://vimeo.com/44878206" href="http://b.vimeocdn.com/ts/311/891/311891198_640.jpg">
    <div class="rsTmb">
      <h5>Dubstep Dispute</h5>
      <span>by Fluxel Media</span>
    </div>
  </a>
  <a class="rsImg" data-rsVideo="https://vimeo.com/45778774" href="http://b.vimeocdn.com/ts/318/502/318502540_640.jpg">
    <div class="rsTmb">
      <h5>The Epic & The Beasts</h5>
      <span>by Sebastian Linda</span>
    </div>
  </a>
   <a class="rsImg" data-rsVideo="https://vimeo.com/41132461" href="http://b.vimeocdn.com/ts/284/709/284709146_640.jpg">
    <div class="rsTmb">
      <h5>Barcode Band</h5>
      <span>by Kang woon Jin</span>
    </div>
  </a>
 <a class="rsImg" data-rsVideo="https://vimeo.com/44388232" href="http://b.vimeocdn.com/ts/308/375/308375094_640.jpg">
    <div class="rsTmb">
      <h5>Samm Hodges Reel</h5>
      <span>by Animal</span>
    </div>
  </a>
  <a class="rsImg" data-rsVideo="https://www.youtube.com/watch?v=agRtaWTItQ0" href="/plugins/royal-slider/img/video/02.jpg">
    <div class="rsTmb">
      <h5>The Foundry Showreel</h5>
      <span>by The Foundry</span>
    </div>
  </a>
</div>










