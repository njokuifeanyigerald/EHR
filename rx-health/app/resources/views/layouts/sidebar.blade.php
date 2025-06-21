<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{ route('dashboard') }}">
            {{-- <img src="{{ asset('logos/nlh_small.png') }}" class="img-fluid pe-3" alt=""> --}}
            {{-- <span class="ms-0">RX EMR</span> --}}
            <span class="ms-0 justify-content-center align-content-center gap-2">
                <img
                    src="{{ App\Helpers\GeneralHelper::applicationLogo() }}"
                    alt="logo"
                    class="img-fluid"
                    width="200"
                />
            </span>
        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="ri-more-fill"></i></div>
                    <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul class="iq-menu">
                {{-- dashboard --}}
                @canany(['front-desk-dashboard', 'nursing-station-dashboard', 'consulting-room-dashboard', 'labs-dashboard', 'radiology-dashboard', 'pharmacy-dashboard', 'cashier-dashboard', 'inventory-dashboard'])
                    <li class="{{ Request::is('dashboard', 'dashboard/*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="iq-waves-effect">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboards</span>
                            <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                        </a>
                        <ul class="iq-submenu">
                            @php
                                $locations = [
                                    ['route' => 'frontdesk', 'permission' => 'front-desk-dashboard'],
                                    ['route' => 'nurses', 'permission' => 'nursing-station-dashboard'],
                                    ['route' => 'consultation', 'permission' => 'consulting-room-dashboard'],
                                    ['route' => 'labs', 'permission' => 'labs-dashboard-not-ready'],
                                    ['route' => 'radiology', 'permission' => 'radiology-dashboard-not-ready'],
                                    ['route' => 'pharmacy', 'permission' => 'pharmacy-dashboard-not-ready'],
                                    ['route' => 'cashier', 'permission' => 'cashier-dashboard-not-ready'],
                                    ['route' => 'inventory', 'permission' => 'inventory-dashboard-not-ready'],
                                ];
                            @endphp

                            @foreach ($locations as $location)
                                @can($location['permission'])
                                    <li class="{{ Request::is('dashboard/' . $location['route']) ? 'active' : '' }}">
                                        <a
                                            href="{{ route('dashboard.' . $location['route']) }}"
                                            class="iq-waves-effect"
                                        >
                                            <i class="fa fa-dashboard"></i>
                                            <span>
                                                {{ Str::title($location['route'] == 'frontdesk' ? 'Med. Records' : $location['route']) }}
                                                Dashboard
                                            </span>
                                        </a>
                                    </li>
                                @endcan
                            @endforeach
                        </ul>
                    </li>
                @endcanany

                {{-- frontdesk --}}
                @canany(['register-patients', 'register-guests', 'manage-patients', 'create-visit', 'manage-visits'])
                    <li class="{{ Request::is('visits', 'patients', 'patients/*', 'visits/*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="iq-waves-effect">
                            <i class="ri-hospital-fill"></i>
                            <span>Medical Records</span>
                            <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                        </a>
                        <ul class="iq-submenu">
                            @can('register-patients')
                                <li class="{{ Request::is('patients/create') ? 'active' : '' }}">
                                    <a href="{{ route('patients.create') }}">
                                        <i class="ri-user-add-fill"></i>
                                        Register Patient
                                    </a>
                                </li>
                            @endcan

                            @can('register-guests')
                                <li class="{{ Request::is('patients/create_guest') ? 'active' : '' }}">
                                    <a href="{{ route('patients.create_guest') }}">
                                        <i class="ri-user-add-fill"></i>
                                        Register Guest
                                    </a>
                                </li>
                            @endcan

                            @can('manage-patients')
                                <li class="{{ Request::is('patients') ? 'active' : '' }}">
                                    <a href="{{ route('patients.index') }}">
                                        <i class="ri-database-2-fill"></i>
                                        Manage Patients
                                    </a>
                                </li>
                            @endcan

                            @can('create-visit')
                                <li class="{{ Request::is('visits/search') ? 'active' : '' }}">
                                    <a href="{{ route('visits.search') }}">
                                        <i class="ri-add-fill"></i>
                                        New Visit
                                    </a>
                                </li>
                            @endcan

                            @can('manage-visits')
                                <li class="{{ Request::is('visits') ? 'active' : '' }}">
                                    <a href="{{ route('visits.index') }}">
                                        <i class="ri-database-2-fill"></i>
                                        Manage Visits
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                {{-- scheduler --}}
                @canany(['view-duty-roster', 'create-duty', 'room-allocation', 'sms'])
                    <li class="{{ Request::is('scheduler', 'scheduler/*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="iq-waves-effect">
                            <i class="ri-calendar-fill"></i>
                            <span>Scheduler</span>
                            <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                        </a>
                        <ul class="iq-submenu">
                            @can('view-duty-roster')
                                <li class="{{ Request::is('scheduler') ? 'active' : '' }}">
                                    <a href="{{ route('scheduler.index') }}">
                                        <i class="fa fa-calendar-plus-o"></i>
                                        Duty Roster
                                    </a>
                                </li>
                            @endcan

                            @can('view-appointments')
                                <li class="{{ Request::is('scheduler/appointments') ? 'active' : '' }}">
                                    <a href="{{ route('scheduler.appointments') }}">
                                        <i class="ri-calendar-event-fill"></i>
                                        Appointments
                                    </a>
                                </li>
                            @endcan

                            @can('manage-room-allocation')
                                <li class="{{ Request::is('scheduler/roomallocation') ? 'active' : '' }}">
                                    <a href="{{ route('scheduler.roomallocation') }}">
                                        <i class="fa fa-tasks"></i>
                                        Room Allocation
                                    </a>
                                </li>
                            @endcan

                            @can('view-duty-roster')
                                <li class="{{ Request::is('scheduler/viewroster') ? 'active' : '' }}">
                                    <a href="{{ route('scheduler.viewroster') }}">
                                        <i class="ri-calendar-todo-fill"></i>
                                        View Roster
                                    </a>
                                </li>
                            @endcan

                            @can('manage-sms')
                                <li class="{{ Request::is('scheduler/sms') ? 'active' : '' }}">
                                    <a href="{{ route('scheduler.sms') }}">
                                        <i class="ri-mail-fill"></i>
                                        SMS
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                {{-- stations --}}
                @canany([
                    'collect-vitals',
                    'edit-vitals',
                    'manage-patient-vital-records',
                    'add-dressing-records',
                    'edit-dressing-record',
                    'manage-patient-dressing-records',
                    'add-injection-records',
                    'edit-injection-record',
                    'manage-patient-injection-records',
                    'assign-inpatients-bed',
                    'manage-inpatients',
                    'manage-discharged-patients',
                    'manage-wards',
                    'manage-consultation-queue',
                    'manage-unsigned-charts',
                    'manage-detained-patients',
                    'manage-discharged-patients',
                    'manage-review-patients',
                    'manage-patients-awaiting-lab-results',
                    'manage-dead-patients',
                    'manage-ward-rounds',
                    'manage-consultation-queue',
                    'manage-unsigned-charts',
                    'manage-detained-patients',
                    'manage-discharged-patients',
                    'manage-review-patients',
                    'manage-patients-awaiting-lab-results',
                    'manage-dead-patients',
                    'manage-ward-rounds',
                    'lab-manage-pending-clients',
                    'lab-manage-enter-results',
                    'lab-manage-completed-tests',
                    'lab-manage-uncompleted-tests',
                    'lab-manage-provider-items',
                    'radiology-manage-pending-clients',
                    'radiology-manage-enter-results',
                    'radiology-manage-completed-tests',
                    'radiology-manage-uncompleted-tests',
                    'radiology-manage-provider-items',
                    'pharmacy-manage-patient-visits',
                    'pharmacy-manage-pos',
                    'pharmacy-manage-refill',
                    'cashier-manage-new-payments',
                    'cashier-manage-receipts',
                    'cashier-manage-approvals',
                    'cashier-manage-petty-cash',
                    'cashier-manage-patient-deposits-and-refunds',
                    'cashier-manage-received-payments',
                    'claims-and-billing-office-manage-claims'
                    // 'claims-and-billing-office-manage-cash-claims',
                    // 'claims-and-billing-office-manage-credit-claims',
                    // 'claims-and-billing-office-manage-credit_corporate-claims',
                    // 'claims-and-billing-office-manage-insurance-claims',
                    // 'claims-and-billing-office-manage-gratis-claims',
                    // 'claims-and-billing-office-manage-staff-claims',
                    // 'claims-and-billing-office-manage-summary-financials',
                    // 'claims-and-billing-office-manage-cash-summary-financials',
                    // 'claims-and-billing-office-manage-credit-summary-financials',
                    // 'claims-and-billing-office-manage-credit_corporate-summary-financials',
                    // 'claims-and-billing-office-manage-insurance-summary-financials',
                    // 'claims-and-billing-office-manage-gratis-summary-financials',
                    // 'claims-and-billing-office-manage-staff-summary-financials',
                ])
                    <li class="iq-menu-title">
                        <i class="ri-subtract-line"></i>
                        <span>Stations</span>
                    </li>

                    @canany(['collect-vitals', 'edit-vitals', 'manage-patient-vital-records', 'add-dressing-records', 'edit-dressing-record', 'manage-patient-dressing-records', 'add-injection-records', 'edit-injection-record', 'manage-patient-injection-records', 'assign-inpatients-bed', 'manage-inpatients', 'manage-discharged-patients', 'manage-wards'])
                        <li
                            class="{{ Request::is('nurses-station*', 'vitals', 'vitals/*', 'inpatient', 'inpatient/*,') ? 'active' : '' }}"
                        >
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="la la-user-nurse"></i>
                                <span>Nurses Station</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('collect-vitals')
                                    <li class="{{ Request::is('nurses-station/vitals') ? 'active' : '' }}">
                                        <a href="{{ route('nurses-station.vitals') }}">
                                            <i class="fa fa-stethoscope"></i>
                                            Vitals
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-patient-vital-records')
                                    <li class="{{ Request::is('nurses-station/list/vitals') ? 'active' : '' }}">
                                        <a href="{{ route('nurses-station.list', ['type' => 'vitals']) }}">
                                            <i class="fa fa-heartbeat"></i>
                                            Vital Records
                                        </a>
                                    </li>
                                @endcan

                                @can('add-dressing-records')
                                    <li class="{{ Request::is('nurses-station/dressing') ? 'active' : '' }}">
                                        <a href="{{ route('nurses-station.dressing') }}">
                                            <i class="fa-solid fa-bandage"></i>
                                            Dressings
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-patient-dressing-records')
                                    <li class="{{ Request::is('nurses-station/list/dressing') ? 'active' : '' }}">
                                        <a href="{{ route('nurses-station.list', ['type' => 'dressing']) }}">
                                            <i>
                                                <img
                                                    height="20px"
                                                    src="{{ asset('images/icon/dressing-records.png') }}"
                                                />
                                            </i>
                                            Dressings Records
                                        </a>
                                    </li>
                                @endcan

                                @can('add-injection-records')
                                    <li class="{{ Request::is('nurses-station/injection') ? 'active' : '' }}">
                                        <a href="{{ route('nurses-station.injection') }}">
                                            <i class="fa-solid fa-syringe"></i>
                                            Injections
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-patient-injection-records')
                                    <li class="{{ Request::is('nurses-station/list/injection') ? 'active' : '' }}">
                                        <a href="{{ route('nurses-station.list', ['type' => 'injection']) }}">
                                            <i>
                                                <img
                                                    height="20px"
                                                    src="{{ asset('images/icon/injection-records.png') }}"
                                                />
                                            </i>
                                            Injections Records
                                        </a>
                                    </li>
                                @endcan

                                @can('assign-inpatients-bed')
                                    <li class="{{ Request::is('nurses-station/inpatient') ? 'active' : '' }}">
                                        <a href="{{ route('inpatient.index') }}">
                                            <i class="ri-user-follow-fill"></i>
                                            In-Patient List
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-inpatients')
                                    <li class="{{ Request::is('nurses-station/inpatient/wardlist') ? 'active' : '' }}">
                                        <a href="{{ route('inpatient.wardlist') }}">
                                            <i class="fa fa-user-plus"></i>
                                            In-Patients in Ward
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-discharged-patients')
                                    <li
                                        class="{{ Request::is('nurses-station/inpatient/dischargedlist') ? 'active' : '' }}"
                                    >
                                        <a href="{{ route('inpatient.dischargedlist') }}">
                                            <i class="fa fa-user-times"></i>
                                            Discharged Patients
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-wards')
                                    <li class="{{ Request::is('nurses-station/inpatient/ward') ? 'active' : '' }}">
                                        <a href="{{ route('inpatient.ward') }}">
                                            <i class="fa fa-bed"></i>
                                            Wards
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @canany(['manage-consultation-queue', 'manage-unsigned-charts', 'manage-detained-patients', 'manage-discharged-patients', 'manage-review-patients', 'manage-patients-awaiting-lab-results', 'manage-dead-patients', 'manage-ward-rounds'])
                        <li class="{{ Request::is('consultation', 'consultation/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="fa fa-user-md"></i>
                                <span>Consultation</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('manage-consultation-queue')
                                    <li class="{{ Request::is('consultation') ? 'active' : '' }}">
                                        <a href="{{ route('consultation.index') }}">
                                            <i class="">-</i>
                                            Consultation Queue
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-unsigned-charts')
                                    <li class="{{ Request::is('consultation/unsigned_charts') ? 'active' : '' }}">
                                        <a href="{{ route('consultation.unsigned_charts') }}">
                                            <i class="">-</i>
                                            Unsigned Charts
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-detained-patients')
                                    <li class="{{ Request::is('consultation/detained_patient') ? 'active' : '' }}">
                                        <a href="{{ route('consultation.detained_patient') }}">
                                            <i class="">-</i>
                                            Detained Patients
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-discharged-patients-consultation')
                                    <li class="{{ Request::is('consultation/discharged_patient') ? 'active' : '' }}">
                                        <a href="{{ route('consultation.discharged_patient') }}">
                                            <i class="">-</i>
                                            Discharged Patients
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-review-patients')
                                    <li class="{{ Request::is('consultation/review_patient') ? 'active' : '' }}">
                                        <a href="{{ route('consultation.review_patient') }}">
                                            <i class="">-</i>
                                            Review Patients
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-patients-awaiting-lab-results')
                                    <li class="{{ Request::is('consultation/waiting_lab_patient') ? 'active' : '' }}">
                                        <a href="{{ route('consultation.waiting_lab_patient') }}">
                                            <i class="">-</i>
                                            Patients Waiting Lab Results
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-dead-patients')
                                    <li class="{{ Request::is('consultation/dead') ? 'active' : '' }}">
                                        <a href="{{ route('consultation.dead') }}">
                                            <i class="">-</i>
                                            Dead Patients
                                        </a>
                                    </li>
                                @endcan

                                @can('manage-ward-rounds')
                                    <li class="{{ Request::is('consultation/wardrounds') ? 'active' : '' }}">
                                        <a href="{{ route('consultation.wardrounds') }}">
                                            <i class="">-</i>
                                            Ward Rounds
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @canany(['lab-manage-pending-clients', 'lab-manage-enter-results', 'lab-manage-completed-tests', 'lab-manage-uncompleted-tests', 'lab-manage-provider-items'])
                        <li class="{{ Request::is('lab', 'lab/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="fa fa-microscope"></i>
                                <span>Lab</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('lab-manage-pending-clients')
                                    <li class="{{ Request::is('lab') ? 'active' : '' }}">
                                        <a href="{{ route('lab.index') }}">
                                            <i class="fa fa-clock"></i>
                                            Pending Clients
                                        </a>
                                    </li>
                                @endcan

                                @can('lab-manage-enter-results')
                                    <li class="{{ Request::is('lab/enter_lab_results') ? 'active' : '' }}">
                                        <a href="{{ route('lab.enter_results') }}">
                                            <i class="fa fa-pencil"></i>
                                            Enter Results
                                        </a>
                                    </li>
                                @endcan

                                @can('lab-manage-completed-tests')
                                    <li class="{{ Request::is('lab/completed_test') ? 'active' : '' }}">
                                        <a href="{{ route('lab.completed_test') }}">
                                            <i class="fa fa-check-square"></i>
                                            Completed Test
                                        </a>
                                    </li>
                                @endcan

                                @can('lab-manage-uncompleted-tests')
                                    <li class="{{ Request::is('lab/uncompleted_test') ? 'active' : '' }}">
                                        <a href="{{ route('lab.uncompleted_test') }}">
                                            <i class="fa fa-info-circle"></i>
                                            UnCompleted Test
                                        </a>
                                    </li>
                                @endcan

                                @can('lab-manage-provider-items')
                                    <li class="{{ Request::is('lab/provider_labs') ? 'active' : '' }}">
                                        <a href="{{ route('lab.provider_labs') }}">
                                            <i class="fa fa-info-circle"></i>
                                            Provider Labs
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @canany(['radiology-manage-pending-clients', 'radiology-manage-enter-results', 'radiology-manage-completed-tests', 'radiology-manage-uncompleted-tests', 'radiology-manage-provider-items'])
                        <li class="{{ Request::is('radiology', 'radiology/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="fa fa-radiation"></i>
                                <span>Radiology</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('radiology-manage-pending-clients')
                                    <li class="{{ Request::is('radiology') ? 'active' : '' }}">
                                        <a href="{{ route('radiology.index') }}">
                                            <i class="fa fa-clock"></i>
                                            Pending Clients
                                        </a>
                                    </li>
                                @endcan

                                @can('radiology-manage-enter-results')
                                    <li class="{{ Request::is('radiology/enter_radiology_results') ? 'active' : '' }}">
                                        <a href="{{ route('radiology.enter_results') }}">
                                            <i class="fa fa-pencil"></i>
                                            Enter Results
                                        </a>
                                    </li>
                                @endcan

                                @can('radiology-manage-completed-tests')
                                    <li class="{{ Request::is('radiology/completed_test') ? 'active' : '' }}">
                                        <a href="{{ route('radiology.completed_test') }}">
                                            <i class="fa fa-check-square"></i>
                                            Completed Test
                                        </a>
                                    </li>
                                @endcan

                                @can('radiology-manage-uncompleted-tests')
                                    <li class="{{ Request::is('radiology/uncompleted_test') ? 'active' : '' }}">
                                        <a href="{{ route('radiology.uncompleted_test') }}">
                                            <i class="fa fa-info-circle"></i>
                                            UnCompleted Test
                                        </a>
                                    </li>
                                @endcan

                                @can('radiology-manage-provider-items')
                                    <li class="{{ Request::is('radiology/provider_radiology') ? 'active' : '' }}">
                                        <a href="{{ route('radiology.provider_radiology') }}">
                                            <i class="fa fa-info-circle"></i>
                                            Provider Radiology
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @canany(['pharmacy-manage-patient-visits', 'pharmacy-manage-pos', 'pharmacy-manage-refill'])
                        <li class="{{ Request::is('pharmacy', 'pharmacy/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="dripicons-pill"></i>
                                <span>Pharmacy</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('pharmacy-manage-patient-visits')
                                    <li class="{{ Request::is('pharmacy') ? 'active' : '' }}">
                                        <a href="{{ route('pharmacy.index') }}">
                                            <i class="ri-table-fill"></i>
                                            Patient Visits
                                        </a>
                                    </li>
                                @endcan

                                @can('pharmacy-manage-pos')
                                    <li class="{{ Request::is('pharmacy/pos') ? 'active' : '' }}">
                                        <a href="{{ route('pharmacy.pos') }}">
                                            <i class="ri-table-2"></i>
                                            POS
                                        </a>
                                    </li>
                                @endcan

                                @can('pharmacy-manage-refill')
                                    <li class="{{ Request::is('pharmacy/refill') ? 'active' : '' }}">
                                        <a href="{{ route('pharmacy.refill') }}">
                                            <i class="la la-fill"></i>
                                            Refill
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @canany(['cashier-manage-new-payments', 'cashier-manage-receipts', 'cashier-manage-approvals', 'cashier-manage-petty-cash', 'cashier-manage-patient-deposits-and-refunds', 'cashier-manage-received-payments'])
                        <li class="{{ Request::is('payments', 'payments/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="dripicons-wallet"></i>
                                <span>Cashier</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('cashier-manage-new-payments')
                                    <li class="{{ Request::is('payments/payment_list') ? 'active' : '' }}">
                                        <a href="{{ route('payments.payment_list') }}">
                                            <i class="ri-bank-card-2-line"></i>
                                            New Payment
                                        </a>
                                    </li>
                                @endcan

                                @can('cashier-manage-receipts')
                                    <li class="{{ Request::is('payments') ? 'active' : '' }}">
                                        <a href="{{ route('payments.index') }}">
                                            <i class="ri-file-paper-line"></i>
                                            Receipts
                                        </a>
                                    </li>
                                @endcan

                                @can('cashier-manage-approvals')
                                    <li class="{{ Request::is('payments/approvals') ? 'active' : '' }}">
                                        <a href="{{ route('payments.approvals') }}">
                                            <i class="fa fa-check"></i>
                                            Cashier Approvals
                                        </a>
                                    </li>
                                @endcan

                                @can('cashier-manage-petty-cash')
                                    <li class="{{ Request::is('payments/petty_cash') ? 'active' : '' }}">
                                        <a href="{{ route('payments.petty_cash') }}">
                                            <i class="fa fa-money-bill-1-wave"></i>
                                            Petty Cash
                                        </a>
                                    </li>
                                @endcan

                                @can('cashier-manage-patient-deposits-and-refunds')
                                    <li class="{{ Request::is('payments/deposits_refunds') ? 'active' : '' }}">
                                        <a href="{{ route('payments.deposits_refunds') }}">
                                            <i class="fa fa-user-tag"></i>
                                            Patient Deposits/Refunds
                                        </a>
                                    </li>
                                @endcan

                                @can('cashier-manage-received-payments')
                                    <li class="{{ Request::is('payments/received_payments') ? 'active' : '' }}">
                                        <a href="{{ route('payments.received_payments') }}">
                                            <i class="fa fa-receipt"></i>
                                            Received Payments
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @canany([
                        'claims-and-billing-office-manage-claims'
                        // 'claims-and-billing-office-manage-cash-claims',
                        // 'claims-and-billing-office-manage-credit-claims',
                        // 'claims-and-billing-office-manage-credit_corporate-claims',
                        // 'claims-and-billing-office-manage-insurance-claims',
                        // 'claims-and-billing-office-manage-gratis-claims',
                        // 'claims-and-billing-office-manage-staff-claims',
                        // 'claims-and-billing-office-manage-summary-financials',
                        // 'claims-and-billing-office-manage-cash-summary-financials',
                        // 'claims-and-billing-office-manage-credit-summary-financials',
                        // 'claims-and-billing-office-manage-credit_corporate-summary-financials',
                        // 'claims-and-billing-office-manage-insurance-summary-financials',
                        // 'claims-and-billing-office-manage-gratis-summary-financials',
                        // 'claims-and-billing-office-manage-staff-summary-financials',
                    ])
                        <li class="{{ Request::is('claims_billing', 'claims_billing/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="fa fa-money-bill"></i>
                                <span>Claims & Billing Office</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @php
                                    $billingCodes = App\Helpers\ReferenceHelper::activeBillingCodes();
                                    $listings = $billingCodes->pluck('code')->toArray();
                                @endphp

                                @foreach ($listings as $listing)
                                    @can('claims-and-billing-office-manage-claims')
                                        <li class="{{ Request::is('claims_billing/' . $listing) ? 'active' : '' }}">
                                            <a
                                                href="{{ route('claims_billing.index', ['billing_code' => $listing]) }}"
                                            >
                                                <i class="fa fa-th-list"></i>
                                                {{ Str::headline($listing) }}
                                                {{ in_array($listing, ['insurance', 'credit_corporate']) ? 'Claims' : 'Bills' }}
                                            </a>
                                        </li>
                                    @endcan
                                @endforeach

                                <li
                                    class="{{ Request::is('claims_billing/summary/financials') || Request::is('claims_billing/summary/financials/details/*') ? 'active' : '' }}"
                                >
                                    <a href="{{ route('claims_billing.summary_financials') }}">
                                        <i class="fa fa-th-list"></i>
                                        Summary Financials
                                    </a>
                                </li>

                                @foreach ($listings as $listing)
                                    @can('claims-and-billing-office-manage-summary-financials')
                                        <li
                                            class="{{ Request::is('claims_billing/summary/financials/' . $listing) || Request::is('claims_billing/summary/financials/details/' . $listing . '/*') ? 'active' : '' }}"
                                        >
                                            <a
                                                href="{{ route('claims_billing.summaryByBillingCode', ['billing_code' => $listing]) }}"
                                            >
                                                <i class="fa fa-th-list"></i>
                                                {{ Str::headline($listing) }} Summary
                                            </a>
                                        </li>
                                    @endcan
                                @endforeach
                            </ul>
                        </li>
                    @endcanany
                @endcanany

                {{-- Stock Management --}}
                @canany([
                    'inventory-manage-reconciliation',
                    'purchase-order-manage-purchase-orders',
                    'purchase-order-manage-pending-purchase-orders',
                    'purchase-order-manage-approved-purchase-orders',
                    'purchase-order-manage-receive-items',
                    'requisition-manage-requisitions',
                    'requisition-manage-pending-requisitions',
                    'requisition-manage-approved-requisitions',
                    'requisition-manage-incoming-requisitions',
                    'requisition-manage-receive-requisitions',
                    'item-management-manage-provider-items',
                    'item-management-manage-expiry-time',
                    'item-management-manage-low-stock-items',
                    'departmental-inventory-manage-provider-items',
                    'departmental-inventory-manage-expiry-time',
                    'item-returns-manage-item-returns',
                    'item-returns-manage-pending-returns',
                    'item-returns-manage-approved-returns',
                    'item-returns-manage-incoming-returns',
                ])
                    <li class="iq-menu-title">
                        <i class="ri-subtract-line"></i>
                        <span>Stock management</span>
                    </li>

                    @canany([
                        'inventory-manage-reconciliation',
                    ])
                        <li class="{{ Request::is('reconcile', 'reconcile/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="la la-warehouse"></i>
                                <span>Inventory</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('inventory-manage-reconciliation')
                                    <li class="{{ Request::is('reconcile') ? 'active' : '' }}">
                                        <a href="{{ route('reconcile.index') }}">
                                            <i class=""></i>
                                            Stock Reconciliation
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @canany([
                        'purchase-order-manage-purchase-orders',
                        'purchase-order-manage-pending-purchase-orders',
                        'purchase-order-manage-approved-purchase-orders',
                        'purchase-order-manage-receive-items',
                    ])
                        <li class="{{ Request::is('purchases', 'purchases/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="ri-store-fill"></i>
                                <span>Purchases</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('purchase-order-manage-purchase-orders')
                                    <li class="{{ Request::is('purchases') ? 'active' : '' }}">
                                        <a href="{{ route('purchases.index') }}">
                                            <i class=""></i>
                                            Purchase Orders
                                        </a>
                                    </li>
                                @endcan

                                @can('purchase-order-manage-pending-purchase-orders')
                                    <li class="{{ Request::is('purchases/pending_orders') ? 'active' : '' }}">
                                        <a href="{{ route('purchases.pending_orders') }}">
                                            <i class=""></i>
                                            Pending PO
                                        </a>
                                    </li>
                                @endcan

                                @can('purchase-order-manage-approved-purchase-orders')
                                    <li class="{{ Request::is('purchases/approved_orders') ? 'active' : '' }}">
                                        <a href="{{ route('purchases.approved_orders') }}">
                                            <i class=""></i>
                                            Approved PO
                                        </a>
                                    </li>
                                @endcan

                                @can('purchase-order-manage-receive-items')
                                    <li class="{{ Request::is('purchases/receive_Items') ? 'active' : '' }}">
                                        <a href="{{ route('purchases.receive_Items') }}">
                                            <i class=""></i>
                                            Receive Items
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @canany([
                        'requisition-manage-requisitions',
                        'requisition-manage-pending-requisitions',
                        'requisition-manage-approved-requisitions',
                        'requisition-manage-incoming-requisitions',
                        'requisition-manage-receive-requisitions',
                    ])
                        <li class="{{ Request::is('requisitions', 'requisitions/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="ri-shopping-cart-fill"></i>
                                <span>Requisitions</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('requisition-manage-requisitions')
                                    <li class="{{ Request::is('requisitions') ? 'active' : '' }}">
                                        <a href="{{ route('requisitions.index') }}">
                                            <i class=""></i>
                                            Requisitions
                                        </a>
                                    </li>
                                @endcan

                                @can('requisition-manage-pending-requisitions')
                                    <li class="{{ Request::is('requisitions/pending_requisitions') ? 'active' : '' }}">
                                        <a href="{{ route('requisitions.pending_requisitions') }}">
                                            <i class=""></i>
                                            Pending Req.
                                        </a>
                                    </li>
                                @endcan

                                @can('requisition-manage-approved-requisitions')
                                    <li
                                        class="{{ Request::is('requisitions/approved_requisitions') ? 'active' : '' }}"
                                    >
                                        <a href="{{ route('requisitions.approved_requisitions') }}">
                                            <i class=""></i>
                                            Approved Req.
                                        </a>
                                    </li>
                                @endcan

                                @can('requisition-manage-incoming-requisitions')
                                    <li
                                        class="{{ Request::is('requisitions/incoming_requisitions') ? 'active' : '' }}"
                                    >
                                        <a href="{{ route('requisitions.incoming_requisitions') }}">
                                            <i class=""></i>
                                            Incoming Req.
                                        </a>
                                    </li>
                                @endcan

                                @can('requisition-manage-receive-requisitions')
                                    <li class="{{ Request::is('requisitions/receive_requisitions') ? 'active' : '' }}">
                                        <a href="{{ route('requisitions.receive_requisitions') }}">
                                            <i class=""></i>
                                            Receive Req.
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @canany([
                        'item-management-manage-provider-items',
                        'item-management-manage-expiry-time',
                        'item-management-manage-low-stock-items',
                    ])
                        <li class="{{ Request::is('items', 'items/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="ri-shopping-bag-fill"></i>
                                <span>Item Management</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('item-management-manage-provider-items')
                                    <li class="{{ Request::is('items') ? 'active' : '' }}">
                                        <a href="{{ route('items.index') }}">
                                            <i class=""></i>
                                            Provider Item
                                        </a>
                                    </li>
                                @endcan

                                @can('item-management-manage-expiry-time')
                                    <li class="{{ Request::is('items/expiring') ? 'active' : '' }}">
                                        <a href="{{ route('items.expiring') }}">
                                            <i class=""></i>
                                            Expiry Items
                                        </a>
                                    </li>
                                @endcan

                                @can('item-management-manage-low-stock-items')
                                    <li class="{{ Request::is('items/low-stock-items') ? 'active' : '' }}">
                                        <a href="{{ route('items.low_stock') }}">
                                            <i class=""></i>
                                            Low Stock Items
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @canany([
                        'departmental-inventory-manage-provider-items',
                        'departmental-inventory-manage-expiry-time',
                        'item-returns-manage-item-returns',
                        'item-returns-manage-pending-returns',
                        'item-returns-manage-approved-returns',
                        'item-returns-manage-incoming-returns',
                    ])
                        <li
                            class="{{ Request::is('departmental_inventory', 'departmental_inventory/*') ? 'active' : '' }}"
                        >
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="fa fa-house-medical"></i>
                                <span>Dept. Inventory</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('departmental-inventory-manage-provider-items')
                                    <li class="{{ Request::is('departmental_inventory') ? 'active' : '' }}">
                                        <a href="{{ route('departmental_inventory.index') }}">
                                            <i class=""></i>
                                            Provider Item
                                        </a>
                                    </li>
                                @endcan

                                @can('departmental-inventory-manage-expiry-time')
                                    <li class="{{ Request::is('departmental_inventory/expiring') ? 'active' : '' }}">
                                        <a href="{{ route('departmental_inventory.expiring') }}">
                                            <i class=""></i>
                                            Expired Items
                                        </a>
                                    </li>
                                @endcan

                                @can('item-returns-manage-item-returns')
                                    <li class="{{ Request::is('departmental_inventory/drafts') ? 'active' : '' }}">
                                        <a href="{{ route('departmental_inventory.drafts') }}">
                                            <i class=""></i>
                                            Draft Returns
                                        </a>
                                    </li>
                                @endcan

                                @can('item-returns-manage-pending-returns')
                                    <li class="{{ Request::is('departmental_inventory/pending') ? 'active' : '' }}">
                                        <a href="{{ route('departmental_inventory.pending') }}">
                                            <i class=""></i>
                                            Pending Returns
                                        </a>
                                    </li>
                                @endcan

                                @can('item-returns-manage-approved-returns')
                                    <li class="{{ Request::is('departmental_inventory/approved') ? 'active' : '' }}">
                                        <a href="{{ route('departmental_inventory.approved') }}">
                                            <i class=""></i>
                                            Approved Returns
                                        </a>
                                    </li>
                                @endcan

                                @can('item-returns-manage-incoming-returns')
                                    <li
                                        class="{{ Request::is('departmental_inventory/incoming_returns') ? 'active' : '' }}"
                                    >
                                        <a href="{{ route('departmental_inventory.incoming_returns') }}">
                                            <i class=""></i>
                                            Incoming Returns
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany
                @endcanany

                {{-- reports --}}
                @canany([
                    'reports-manage-front-desk-reports',
                    'reports-manage-nurses-station-reports',
                    'reports-manage-consultation-reports',
                    'reports-manage-lab-reports',
                    'reports-manage-radiology-reports',
                    'reports-manage-pharmacy-reports',
                    'reports-manage-cashier-reports',
                    'reports-manage-finance-reports',
                    'user-management-manage-users',
                    'user-management-manage-roles',
                ])
                    {{-- Utilities --}}
                    <li class="iq-menu-title">
                        <i class="ri-subtract-line"></i>
                        <span>Utilities</span>
                    </li>

                    {{--
                        @canany([
                        'reports-manage-front-desk-reports',
                        'reports-manage-nurses-station-reports',
                        'reports-manage-consultation-reports',
                        'reports-manage-lab-reports',
                        'reports-manage-radiology-reports',
                        'reports-manage-pharmacy-reports',
                        'reports-manage-cashier-reports',
                        'reports-manage-finance-reports',
                        ])
                        <li class="{{ Request::is('reports', 'reports/*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="iq-waves-effect">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Reports</span>
                        <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                        </a>
                        <ul class="iq-submenu">
                        @can('reports-manage-front-desk-reports')
                        <li class="{{ Request::is('reports/front_desk') ? 'active' : '' }}">
                        <a href="{{ route('reports.front_desk') }}">
                        <i class="ri-file-3-fill"></i>
                        Medical Records Report
                        </a>
                        </li>
                        @endcan
                        
                        @can('reports-manage-nurses-station-reports')
                        <li class="{{ Request::is('reports/nurses_station') ? 'active' : '' }}">
                        <a href="{{ route('reports.nurses_station') }}">
                        <i class="ri-file-3-fill"></i>
                        Nurses Station Report
                        </a>
                        </li>
                        @endcan
                        
                        @can('reports-manage-consultation-reports')
                        <li class="{{ Request::is('reports/consulting') ? 'active' : '' }}">
                        <a href="{{ route('reports.consulting') }}">
                        <i class="ri-file-3-fill"></i>
                        Consultation Report
                        </a>
                        </li>
                        @endcan
                        
                        @can('reports-manage-lab-reports')
                        <li class="{{ Request::is('reports/lab') ? 'active' : '' }}">
                        <a href="{{ route('reports.lab') }}">
                        <i class="ri-file-3-fill"></i>
                        Lab Report
                        </a>
                        </li>
                        @endcan
                        
                        @can('reports-manage-radiology-reports')
                        <li class="{{ Request::is('reports/radiology') ? 'active' : '' }}">
                        <a href="{{ route('reports.radiology') }}">
                        <i class="ri-file-3-fill"></i>
                        Radiology Report
                        </a>
                        </li>
                        @endcan
                        
                        @can('reports-manage-pharmacy-reports')
                        <li class="{{ Request::is('reports/pharmacy') ? 'active' : '' }}">
                        <a href="{{ route('reports.pharmacy') }}">
                        <i class="ri-file-3-fill"></i>
                        Pharmacy Report
                        </a>
                        </li>
                        @endcan
                        
                        @can('reports-manage-cashier-reports')
                        <li class="{{ Request::is('reports/cashier') ? 'active' : '' }}">
                        <a href="{{ route('reports.cashier') }}">
                        <i class="ri-file-3-fill"></i>
                        Cashier Report
                        </a>
                        </li>
                        @endcan
                        
                        @can('reports-manage-finance-reports')
                        <li class="{{ Request::is('reports/finance') ? 'active' : '' }}">
                        <a href="{{ route('reports.finance') }}">
                        <i class="ri-file-3-fill"></i>
                        Finance Report
                        </a>
                        </li>
                        @endcan
                        </ul>
                        </li>
                        @endcanany
                    --}}

                    @canany([
                        'user-management-manage-users',
                        'user-management-manage-roles',
                    ])
                        <li class="{{ Request::is('users', 'users/*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="fa fa-user-circle"></i>
                                <span>User Management</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('user-management-manage-users')
                                    <li class="{{ Request::is('users') ? 'active' : '' }}">
                                        <a href="{{ route('users.index') }}">
                                            <i class=""></i>
                                            System Users
                                        </a>
                                    </li>
                                @endcan

                                @can('user-management-manage-roles')
                                    <li class="{{ Request::is('users/roles') ? 'active' : '' }}">
                                        <a href="{{ route('users.roles') }}">
                                            <i class=""></i>
                                            User Roles
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @canany([
                        'system-settings-manage-organization',
                        'system-settings-manage-facilities',
                        'system-settings-manage-workstations',
                        'system-settings-manage-companies',
                        'system-settings-manage-suppliers',
                        'system-settings-manage-occupational-health-packages',
                    ])
                        <li class="{{ request()->routeIs(['settings.*']) ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="iq-waves-effect">
                                <i class="fa fa-wrench"></i>
                                <span>System Settings</span>
                                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                            </a>
                            <ul class="iq-submenu">
                                @can('system-settings-manage-organization')
                                    <li class="{{ request()->routeIs(['settings.organization*']) ? 'active' : '' }}">
                                        <a href="{{ route('settings.organization') }}">
                                            <i class=""></i>
                                            Organization
                                        </a>
                                    </li>
                                @endcan

                                @can('system-settings-manage-facilities')
                                    <li class="{{ request()->routeIs(['settings.facilities*']) ? 'active' : '' }}">
                                        <a href="{{ route('settings.facilities') }}">
                                            <i class=""></i>
                                            Facilities
                                        </a>
                                    </li>
                                @endcan

                                @can('system-settings-manage-workstations')
                                    <li class="{{ request()->routeIs(['settings.workstations*']) ? 'active' : '' }}">
                                        <a href="{{ route('settings.workstations') }}">
                                            <i class=""></i>
                                            Work Stations
                                        </a>
                                    </li>
                                @endcan

                                @can('system-settings-manage-companies')
                                    <li class="{{ request()->routeIs(['settings.companies*']) ? 'active' : '' }}">
                                        <a href="{{ route('settings.companies') }}">
                                            <i class=""></i>
                                            Companies
                                        </a>
                                    </li>
                                @endcan

                                @can('system-settings-manage-suppliers')
                                    <li class="{{ request()->routeIs(['settings.suppliers*']) ? 'active' : '' }}">
                                        <a href="{{ route('settings.suppliers') }}">
                                            <i class=""></i>
                                            Suppliers
                                        </a>
                                    </li>
                                @endcan

                                @can('system-settings-manage-occupational-health-packages')
                                    <li class="{{ request()->routeIs(['settings.packages*']) ? 'active' : '' }}">
                                        <a href="{{ route('settings.packages') }}">
                                            <i class=""></i>
                                            Packages
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany
                @endcanany
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
