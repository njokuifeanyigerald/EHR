<div>
    {{-- The Master doesn't talk, he acts. --}}
    @include(
        'scheduler.duty_view_table',
        [
            'shifts' => $shifts,
            'duties' => $duties,
            'dates' => $dates,
        ]
    )
</div>
