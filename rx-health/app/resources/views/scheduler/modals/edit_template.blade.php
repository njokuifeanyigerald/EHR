{{-- Edit template --}}
<div class="modal edit_template fade" tabindex="-1" aria-labelledby="Edit template" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Edit Template</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="#" method="">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="edit_title">Title</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control my-2"
                                id="edit_title"
                                value=""
                                placeholder="Enter title for template"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="message">Message</label>
                        <div class="col-sm-10">
                            <textarea
                                class="form-control my-2"
                                id="message"
                                rows="8"
                                maxlength="500"
                                placeholder="Enter template message here"
                            ></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
