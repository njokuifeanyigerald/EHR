<div class="row">
    <div
        @click="mainDiv = !mainDiv; openGeneral = !openGeneral"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer"
        wire:click="dispatch('fluidIntakeAndOutputChart')"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-primary rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-bar-chart icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>General</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openGlucose = !openGlucose"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer"
        wire:click="dispatch('bloodGlucoseMonitoring')"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-success rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-fill-drip icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Glucose</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openPregnancy = !openPregnancy"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4 mt-md-0"
        wire:click="dispatch('foetalKickCount')"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-danger rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-baby icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Pregnancy</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openOperation = !openOperation"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4 mt-md-0"
        wire:click="dispatch('anaestheticRecord')"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-secondary rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-bed-pulse icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Operation</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openOrdersNotes = !openOrdersNotes"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
        wire:click="dispatch('nursesOrder')"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-warning rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-sticky-note icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Orders & Notes</h5>
            </div>
        </div>
    </div>
</div>
