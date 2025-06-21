<div>
    <div class="iq-card">
        <div class="iq-card-body">
            <div class="row">
                <form class="form-group col-md-6">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                        <div class="col-9">
                            <div class="input-icon input-icon-right">
                                <input
                                    type="search"
                                    class="form-control"
                                    autofocus
                                    wire:model.live.debounce.700ms="search_query"
                                    placeholder="Search for Patient"
                                    name="search_query"
                                />
                                <span class="input-icon-addon clickable-cursor">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table cursor table-hover table-borderless table-striped">
                        <thead>
                            <tr>
                                <th scope="col" data-field="#">#</th>
                                <th scope="col" data-field="image">IMAGE</th>
                                <th scope="col" data-field="names">FULL NAME</th>
                                <th scope="col" data-field="telephone">TELEPHONE</th>
                                <th scope="col" data-field="folder">FOLDER NUMBER</th>
                                <th scope="col" data-field="company">PATIENT TYPE</th>
                                <th scope="col" data-field="payment">PAYMENT TYPE</th>
                                <th scope="col" data-field="sex">SEX</th>
                                {{-- <th scope="col"  data-field="status">STATUS</th> --}}
                                <th scope="col" data-field="action">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patients as $patient)
                                <tr>
                                    <td scope="row">{{ $loop->iteration + $patients->firstItem() - 1 }}</td>
                                    <td>
                                        <img
                                            class="user-image rounded table-img"
                                            src="{{ asset($patient->profile_pic ? $patient->profile_pic : 'images/user/Image1.png') }}"
                                            alt="profile pic"
                                        />
                                    </td>
                                    <td>
                                        {{ $patient->full_name_title }}
                                    </td>
                                    <td>{{ $patient->telephone }}</td>
                                    <td>{{ $patient->folder_number ? $patient->new_folder_number : 'N/A' }}</td>
                                    <td>{{ Str::headline($patient->member_type) }}</td>
                                    <td>{{ Str::headline($patient->patient_type ?? 'N/A') }}</td>
                                    <td>{{ $patient->sex == 'Male' ? 'M' : 'F' }}</td>
                                    {{--
                                        <td>
                                        <button type="button" class="btn iq-bg-success mt-3" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Location: Consulting Room">
                                        Available
                                        </button>
                                        </td>
                                    --}}
                                    <td class="text-center">
                                        <a href="{{ route('patients.show', $patient->id) }}" title="View">
                                            <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                        </a>
                                        <a href="{{ route('visits.create', $patient->id) }}" title="Create Visit">
                                            <i class="ri-add-line text-success icons-base"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No Patient Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $patients->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
