{{-- Medication Modal --}}
<div id="medication_1" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Medications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="my-2">
                    <a onclick="$('.addDrug').fadeToggle('slow')" class="btn btn-sm btn-primary px-3">
                        <i class="fa fa-plus m-0"></i>
                        Add Pescription
                    </a>
                </div>
                @include('consultation.ward.includes.add_prescription')
                <div class="table-responsive">
                    <table class="table table-head-custom table-striped cursor table-hover table-responsive-lg">
                        <thead>
                            <tr>
                                <th>DATE TIME</th>
                                <th>MEDICATION</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3">No data found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
