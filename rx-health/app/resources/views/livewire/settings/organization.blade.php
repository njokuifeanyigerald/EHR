<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            id="organization-tab"
                            data-bs-toggle="tab"
                            href="#organization"
                            role="tab"
                            aria-controls="pills-home"
                            aria-selected="true"
                        >
                            Organization
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="Inventory-tab"
                            data-bs-toggle="tab"
                            href="#Inventory"
                            role="tab"
                            aria-controls="pills-home"
                        >
                            Inventory
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="Wards-tab"
                            data-bs-toggle="tab"
                            href="#Wards"
                            role="tab"
                            aria-controls="pills-home"
                        >
                            Wards
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="tab-content" id="pills-tabContent-2">
            {{-- organization settings --}}
            <div class="tab-pane fade show active" id="organization" role="tabpanel" aria-labelledby="organization-tab">
                <livewire:settings.organization.organization
                    :settings="$settings->filter(function($setting) {
                        return $setting->systemSetting->type === 'organization';
                    })"
                />
            </div>

            {{-- Inventory settings --}}
            <div class="tab-pane fade" id="Inventory" role="tabpanel" aria-labelledby="Inventory-tab">
                <livewire:settings.organization.inventory
                    :settings="$settings->filter(function($setting) {
                    return $setting->systemSetting->type === 'inventory';
                })"
                />
            </div>

            {{-- Wards settings --}}
            <div class="tab-pane fade" id="Wards" role="tabpanel" aria-labelledby="Wards-tab">
                <livewire:settings.organization.wards
                    :settings="$settings->filter(function($setting) {
                    return $setting->systemSetting->type === 'wards';
                })"
                />
            </div>
        </div>
    </div>
</div>
