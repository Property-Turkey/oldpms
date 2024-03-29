

<?php // Take camera from camera MODAL ?>


<div class="modal fade fullscreen_mdl" id="camera_mdl" tabindex="-1" role="dialog">
    <div id="takePhotoEffect"></div>
	<div class=" modal-dialog modal-md">
		<div class="full-modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<div>
                <video id="video" muted autoplay playsinline>Start streaming</video>
                
                <div class="bottom-btns">
                    <!-- <button id="takeVideo_btn" class="btn btn-danger" ng-click=" takeVideo(camera_stream_settings); "><span><i class="fa fa-video-camera"></i></span></button> -->
                    <button id="takePhoto_btn" class="btn btn-warning w100" ng-click=" takePhoto(camera_stream_settings); "><span><i class="fa fa-camera-retro"></i></span></button>
                </div>
			</div>
		</div>
	</div>
</div>

<script>
    $('#camera_mdl').on('hidden.bs.modal', function () {
        if(typeof localStream === 'undefined'){return ;}
        localStream.getTracks().forEach((track) => {
            track.stop();
        })
    });
</script>
