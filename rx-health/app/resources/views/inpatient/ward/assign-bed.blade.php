{{-- Assign bed Modal --}}
<div id="assign_bed" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Assign Patient To Ward</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body mx-5">
                    <div class="form-group">
                        <label for="bed_id" class="fw-bold">
                            Available Bed
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select my-2" id="bed_id" name="status">
                            <option>Please select bed</option>
                            <option value="2">1. Male -- Bed No.: Bed 2 -- Price: NGN 10000</option>
                            <option value="7">2. Male -- Bed No.: Bed 3 -- Price: NGN 10000</option>
                            <option value="9">3. Surgical -- Bed No.: Bed 2 -- Price: NGN 20000</option>
                            <option value="11">4. Male -- Bed No.: Bed 2 -- Price: NGN 10000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status" class="fw-bold">
                            Booking Date
                            <span class="text-danger">*</span>
                        </label>
                        <input class="form-control" type="date" id="booking_date" />
                    </div>
                    <div class="form-group">
                        <label for="ward_id" class="fw-bold">
                            Booking Time
                            <span class="text-danger">*</span>
                        </label>
                        <input class="form-control" type="time" step="1" id="booking_time" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Assign Bed</button>
                </div>
            </form>
        </div>
    </div>
</div>
