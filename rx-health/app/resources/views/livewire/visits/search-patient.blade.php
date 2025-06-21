<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <p>Fill the inputs below to find a Patient.</p>
                {{--
                    <form action="" method="">
                    @csrf
                --}}
                <div class="row">
                    <div class="col-sm-2 col-md">
                        <input
                            type="text"
                            class="form-control my-2"
                            placeholder="Enter Folder Number..."
                            wire:model.live="folder_number"
                        />
                    </div>
                    <div class="col-sm-2 col-md">
                        <input
                            type="text"
                            class="form-control my-2"
                            placeholder="Enter Surname..."
                            wire:model.live="surname"
                        />
                    </div>
                    <div class="col-sm-2 col-md">
                        <input
                            type="text"
                            class="form-control my-2"
                            placeholder="Enter Other Names..."
                            wire:model.live="othernames"
                        />
                    </div>
                    <div class="col-sm-2 col-md">
                        <input
                            type="text"
                            class="form-control my-2"
                            placeholder="Enter Telephone..."
                            wire:model
                            .live="telephone"
                        />
                    </div>
                    {{--
                        <div class="col-sm-2 col-md">
                        <input type="text" class="form-control my-2" placeholder="Enter Insurance no..."
                        wire:model.live="insurance_number">
                        </div>
                    --}}
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="w-100 table table-borderless table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>IMAGE</th>
                                <th>FOLDER NO.</th>
                                <th>NAME</th>
                                <th>MEMBER TYPE</th>
                                <th>SEX</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patients as $patient)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <img
                                            class="user-image rounded table-img"
                                            src="{{ asset($patient->profile_pic ?? 'images/user/Image3.png') }}"
                                            alt="profile pic"
                                        />
                                    </td>
                                    <td>{{ $patient->new_folder_number ?? 'N/A' }}</td>
                                    <td>
                                        {{ $patient->full_name_title }}
                                    </td>
                                    <td>{{ Str::headline($patient->patient_type ?? 'N/A') }}</td>
                                    <td>{{ $patient->sex ?? 'N/A' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('visits.create', $patient->id) }}" title="Create Visit">
                                            <i class="ri-add-line text-success icons-base"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <table class="w-100">
                                    <tr class="text-center">
                                        <td class="w-100">No Patient Found</td>
                                    </tr>
                                </table>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
