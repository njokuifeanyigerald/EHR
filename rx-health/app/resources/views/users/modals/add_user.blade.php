{{-- Add user modal --}}
<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <select id="title" name="title" class="form-select my-2" required>
                                <option value="">Select Title</option>
                                <option value="Dr">Dr</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Prof">Prof</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control my-2" placeholder="Full Name" required />
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input
                                id="email"
                                type="email"
                                class="form-control my-2"
                                placeholder="Email Address"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="tel">Phone Number</label>
                            <input id="tel" type="tel" class="form-control my-2" placeholder="" required />
                        </div>
                        <div class="form-group">
                            <label for="facility">Facility</label>
                            <select class="form-select" name="facility" required>
                                <option value="">Select a facility</option>
                                <option value="TST02">Gbadamosi, Mustapha and Nwuzor</option>
                                <option value="TST54">Yussuf PLC</option>
                                <option value="TST90">Muinat LLC</option>
                                <option value="TST24">Habeeb, Wuraola and Elizabeth</option>
                                <option value="TST33">Mustapha-Adewale</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role">User Role</label>
                            <select class="form-select" name="role" required>
                                <option value="">Select a role</option>
                                <option value="2">cashier</option>
                                <option value="1">super-admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role">Attending Officer</label>
                            <select
                                class="form-select"
                                name="attending_officer"
                                required
                                onchange="shows_doctors_specialty(this.value)"
                            >
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>

                        <div id="doctor_speciality" style="display: none">
                            <div class="form-group">
                                <label for="speciality">Speciality</label>
                                <select class="form-select" name="speciality">
                                    <option value="">Select a Speciality</option>
                                    <option value="Allergy">Allergy</option>
                                    <option value="Abortion">Abortion</option>
                                    <option value="Acupuncture">Acupuncture</option>
                                    <option value="Adolescent Medicine">Adolescent Medicine</option>
                                    <option value="Addiction Medicine">Addiction Medicine</option>
                                    <option value="Pharmacy">Pharmacy</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="license">License No.</label>
                                <input
                                    id="license"
                                    type="text"
                                    class="form-control my-2"
                                    placeholder="License No."
                                    required
                                />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control my-2" required />
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input id="confirm_password" type="confirm_password" class="form-control my-2" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save User</button>
            </div>
        </div>
    </div>
</div>
