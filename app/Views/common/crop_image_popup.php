<div class="modal fade" id="modalCropPic" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title w-100" id="modalLabel">Crop image</h5>
				<button type="button" class="close cropClose" data-dismiss="modal" aria-label="Close" style="text-align:right;">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="img-container">
					<div class="row">
						<div class="col-md-8" >  
							<!--  default image where we will set the src via jquery-->
							<img id="image" style="height: 100%;">
						</div>
						<div class="col-md-4">
							<div class="previewCropImg"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
            <input type="hidden" id="csrfToken" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
				<button type="button" class="btn btn-secondary close" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" id="crop">Crop</button>
			</div>
		</div>
	</div>
</div>

