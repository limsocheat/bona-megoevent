<h3>Schedule</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Date</th>
            <th>Start time</th>
            <th>End Time</th>
            <th>Hours</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($event->schedules as $schedule)
            <tr>
                <td>{{ $schedule->display_date }}</td>
                <td>{{ $schedule->display_start_time }}</td>
                <td>{{ $schedule->display_end_time }}</td>
                <td>{{ $schedule->total_hours }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="text-right font-weight-bold">Total Hours</td>
            <td class="font-weight-bold">{{ $event->total_hours }}</td>
        </tr>
    </tfoot>
</table>

<div class="spacer"></div>

<div class="row">
    <div class="col-md-6">
        <h3>Venue</h3>
        <div class="row">
            <div class="col-md-12">
                {!! Form::label('venue_id', 'Venue Block') !!}
                {!! Form::select('venue_id', $venues, null, ['placeholder' => 'Venue Block', 'class' => 'form-control', 'disabled' => $event->readonly]) !!}
            </div>
            <div class="col-md-12">
                {!! Form::label('venue_level', 'Venue Level') !!}
                {!! Form::select('venue_level', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], null, ['placeholder' => 'Venue Level', 'class' => 'form-control', 'disabled' => $event->readonly]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h3>Sub Total</h3>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Hours
                        <span class="badge badge-primary badge-pill">{{ $event->total_hours }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Grid Block
                        <span class="badge badge-primary badge-pill">{{ $event->total_grid_block }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Grid Block Value
                        <span class="badge badge-primary badge-pill">{{ Money::SGD(\Setting::get('event.grid_block_value')) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Grid Block Price
                        <span class="badge badge-primary badge-pill">{{ Money::SGD($event->total_grid_block_price) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total 7% Tax
                        <span class="badge badge-primary badge-pill">{{ Money::SGD($event->total_tax) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Final Price
                        <span class="badge badge-primary badge-pill">{{ Money::SGD($event->total_final_price) }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>