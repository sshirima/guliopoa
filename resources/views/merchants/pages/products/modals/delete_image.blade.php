<div id="deleteImageModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-6" for="title">Do you really want to delete this image:</label>
                        <div class="col-sm-6">
                            <img src="{{asset(\App\Services\Merchants\ImageManager::IMAGE_PATH)}}"
                                 alt="..." class="margin" style="width:150px;height:100px;" id="image_name">
                            <input type="hidden" class="form-control" id="product_image" name="product_image_delete" autofocus>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary delete-product-image" data-dismiss="modal">
                        <span class='glyphicon glyphicon-check'></span> Remove
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>