{{-- View template --}}
<div class="modal view_template fade" tabindex="-1" aria-labelledby="Edit template" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>View Template</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="#" method="">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="view_title">Title</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control my-2"
                                id="view_title"
                                value="Enter title for template"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="message">Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control my-2" id="message" rows="8" maxlength="500">
Enter template message here</textarea
                            >
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" data-bs-toggle="modal" data-bs-target=".edit_template" class="btn btn-primary">
                    <i class="ri-pencil-line"></i>
                    Edit Template
                </button>
            </div>
        </div>
    </div>
</div>
