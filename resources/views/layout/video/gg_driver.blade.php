<script src="//myctvbox.appspot.com/static/jwplayer/jwplayer.js"></script>
<div id='player'></div>
<script>
    jwplayer("player").setup({
        playlist: [{
                file: "https://www.googleapis.com/drive/v3/files/{{ $id }}?alt=media&key=AIzaSyD739-eb6NzS_KbVJq1K8ZAxnrMfkIqPyw",
                type: "mp4",
            }
        ],
        width: '100%',
        aspectratio: '16:9',
//        listbar: {
//            position: "right",
//            size: 200,
//            layout: "basic",
//        },
        stretching: 'fill', // needed for Google TV.
//        events: {
//            onReady: function () {
//                this.setFullscreen(true);
//            },
//        },
    });
</script>