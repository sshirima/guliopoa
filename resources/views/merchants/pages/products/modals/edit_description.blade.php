<div id="editDescriptionModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group col-sm-12">
                    <textarea class="textarea" id="product_description_edit"
                              name="product_description_edit"
                              style="width: 100%;padding: 10px"
                              placeholder="Enter text ...">{{isset($product) ?$product->product_description:""}}
                    </textarea>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <span class="errorTitle label label-danger"></span>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary update-description-button" data-dismiss="modal">
                        <span class='glyphicon glyphicon-check'></span> Update
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>