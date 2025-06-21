<div>
    <div class="row mb-5">
        {{-- schedule meeting --}}
        <div
            class="col-md-4 col-sm-4 col-lg-4 col-6 cursor-pointer"
            wire:click="scheduleMeeting"
            wire:loading.attr="disabled"
            wire:target="scheduleMeeting"
        >
            <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
                <div class="iq-bg-warning rounded-circle d-flex" style="width: 88px; height: 88px">
                    <i
                        class="text-warning fa fa-headset icons-large text-dark m-auto"
                        wire:target="scheduleMeeting"
                        wire:loading.remove
                    ></i>
                    <i
                        class="text-warning fa fa-spinner fa-spin icons-large text-dark m-auto"
                        wire:target="scheduleMeeting"
                        wire:loading
                    ></i>
                </div>
                <div class="d-flex flex-column font-weight-bold mt-3">
                    <h5>Schedule Call</h5>
                </div>
            </div>
        </div>
        {{-- join meeting --}}
        <div
            class="col-md-4 col-sm-4 col-lg-4 col-6 {{ $this->doctors_url && $this->patient_url ? 'cursor-pointer' : '' }}"
            wire:click="joinMeeting"
            wire:loading.attr="disabled"
            wire:target="scheduleMeeting"
        >
            <a href="{{ $this->doctors_url }}" target="_blank" class="d-none" id="doctors_url"></a>
            <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
                <div class="iq-bg-success rounded-circle d-flex" style="width: 88px; height: 88px">
                    <i
                        class="text-success fa {{ $this->doctors_url && $this->patient_url ? 'fa-video' : 'fa-video-slash' }} icons-large text-dark m-auto"
                    ></i>
                </div>
                <div class="d-flex flex-column font-weight-bold mt-3">
                    <h5>Join Call</h5>
                </div>
            </div>
        </div>
        {{-- Send meeting link --}}
        <div
            class="col-md-4 col-sm-4 col-lg-4 col-6 cursor-pointer"
            wire:click="sendMeetingLink"
            wire:loading.attr="disabled"
            wire:target="sendMeetingLink"
        >
            <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
                <div class="iq-bg-primary rounded-circle d-flex" style="width: 88px; height: 88px">
                    <i class="text-primary fa fa-link icons-large text-dark m-auto"></i>
                </div>
                <div class="d-flex flex-column font-weight-bold mt-3">
                    <h5>Send Call Link</h5>
                </div>
            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('joinMeeting', () => window.open($wire.get('doctors_url'), '_blank'));
        </script>
    @endscript
</div>
