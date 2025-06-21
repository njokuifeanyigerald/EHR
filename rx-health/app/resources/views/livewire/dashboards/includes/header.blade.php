<div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-md-flex justify-content-between">
            <div class="iq-header-title">
                <h3 class="fw-bold">Dashboard</h3>
            </div>
            <div class="iq-card-header-toolbar d-md-flex align-items-center border rx-rounded-3 px-3 my-2">
                <button
                    wire:click="setViewType('today')"
                    class="btn {{ $this->view_type == 'today' ? 'bg-primary' : 'bg-white' }} rx-rounded-5 my-2 me-2"
                >
                    Today
                </button>
                <button
                    wire:click="setViewType('this_week')"
                    class="btn {{ $this->view_type == 'this_week' ? 'bg-primary' : 'bg-white' }} rx-rounded-5 my-2 me-2"
                >
                    This week
                </button>
                <button
                    wire:click="setViewType('this_month')"
                    class="btn {{ $this->view_type == 'this_month' ? 'bg-primary' : 'bg-white' }} rx-rounded-5 my-2 me-2"
                >
                    This month
                </button>
                <button
                    wire:click="setViewType('last_six_months')"
                    class="btn {{ $this->view_type == 'last_six_months' ? 'bg-primary' : 'bg-white' }} rx-rounded-5 my-2 me-2"
                >
                    Last 6 months
                </button>
                <button
                    wire:click="setViewType('this_year')"
                    class="btn {{ $this->view_type == 'this_year' ? 'bg-primary' : 'bg-white' }} rx-rounded-5 my-2"
                >
                    This year
                </button>
            </div>
        </div>
    </div>
</div>
