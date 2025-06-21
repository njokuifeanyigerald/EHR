@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>
                            Room Allocation -
                            <small>Assign a doctor to a consultation room</small>
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table
                            data-classes="table table-hover"
                            data-toggle="table"
                            data-sortable="true"
                            data-pagination="true"
                            data-filter-control="true"
                            data-show-toggle="true"
                            data-show-columns="true"
                            data-search="true"
                            data-page-size="15"
                            data-buttons-class="light"
                            data-search-align="left"
                        >
                            <thead>
                                <tr>
                                    <th scope="col" data-sortable="true" data-field="#">#</th>
                                    <th scope="col" data-sortable="true" data-field="consulting">CONSULTING ROOM</th>
                                    <th scope="col" data-sortable="true" data-field="officer">ATTENDING OFFICER</th>
                                    <th scope="col" data-sortable="true" data-field="specialisation">SPECIALISATION</th>
                                    <th scope="col" data-sortable="true" data-field="shift">SHIFT</th>
                                    <th scope="col" data-sortable="true" data-field="start">START</th>
                                    <th scope="col" data-sortable="true" data-field="end">END</th>
                                    <th scope="col" data-sortable="true" data-field="status">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($duties as $duty)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <livewire:schedular.room-allocation.change-consulting-room
                                                :consulting_rooms="$consulting_rooms"
                                                :key="$duty->key"
                                                :duty="$duty"
                                            />
                                        </td>
                                        <td>
                                            {{ $duty->attendingOfficer->title . ' ' . $duty->attendingOfficer->first_name . ' ' . $duty->attendingOfficer->last_name }}
                                        </td>
                                        <td>{{ $duty->attendingOfficer->speciality }}</td>
                                        <td>{{ $duty->shift->name }}</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($duty->start_date . ' ' . $duty->start_time)->format('jS F Y g:i A') }}
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($duty->end_date . ' ' . $duty->end_time)->format('jS F Y g:i A') }}
                                        </td>
                                        <td>
                                            {{-- <span class="badge rounded-pill bg-warning">Awaiting</span> --}}
                                            <span
                                                class="badge rounded-pill bg-{{ $duty->department_unit_id ? 'success' : 'danger' }}"
                                            >
                                                {{ $duty->department_unit_id ? 'Done' : 'Awaiting' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach

                                {{--
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>
                                    <select class="form-select my-2" id="room">
                                    <option value="Consulting room 3">Consulting room 3</option>
                                    <option value="Consulting room 1">Consulting room 1</option>
                                    <option value="Consulting room 2">Consulting room 2</option>
                                    </select>
                                    </td>
                                    <td>Mercy Iburuoma</td>
                                    <td>Allergies</td>
                                    <td>Morning</td>
                                    <td>2nd Febuary 2024 8:00 am</td>
                                    <td>2nd Febuary 2024 2:00 pm</td>
                                    <td>
                                    <span class="badge rounded-pill bg-success">Done</span>
                                    </td>
                                    </tr>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>
                                    <select class="form-select my-2" id="room">
                                    <option value="Consulting room 1">Consulting room 1</option>
                                    <option value="Consulting room 2">Consulting room 2</option>
                                    <option value="Consulting room 3">Consulting room 3</option>
                                    </select>
                                    </td>
                                    <td>Dr. Kanton Samuel</td>
                                    <td>ENT</td>
                                    <td>Afternoon</td>
                                    <td>2nd Febuary 2024 2:00 pm</td>
                                    <td>2nd Febuary 2024 8:00 pm</td>
                                    <td>
                                    <span class="badge rounded-pill bg-warning">In Use</span>
                                    </td>
                                    </tr>
                                --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
