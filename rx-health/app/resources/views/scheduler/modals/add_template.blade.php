{{-- Add template --}}
<div
    id="add_template"
    class="modal fade"
    id="add_charges"
    tabindex="-1"
    aria-labelledby="Add Template"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Add New Template</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="#" method="">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="title">Title</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control my-2"
                                id="title"
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
                <button type="submit" class="btn btn-primary">Add Template</button>
            </div>
        </div>
    </div>
</div>
