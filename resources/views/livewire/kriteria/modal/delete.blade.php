
<!-- Form Modal -->
<form action="" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Are you sure you want to delete this item?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="submit" class="btn btn-outline-danger">{{__('Delete')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>