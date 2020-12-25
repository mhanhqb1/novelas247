<link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<!-- <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->
<div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
    <video
    id="my-video-player"
    class="video-js my-video-player"
    controls
    preload="auto"
    style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden"
    data-setup="{}"
  >
    <source src="https://www.googleapis.com/drive/v3/files/{{ $id }}?alt=media&key=AIzaSyD739-eb6NzS_KbVJq1K8ZAxnrMfkIqPyw" type="video/mp4" />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
  </video>
</div>

@include('layout.video.video_ads', ['id' => $sourceVideo])

<script src="https://vjs.zencdn.net/7.10.2/video.min.js"></script>

