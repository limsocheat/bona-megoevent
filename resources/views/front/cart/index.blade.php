@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Buy Tickets
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
								<th scope="col">No</th>
								<th scope="col">Event Name</th>
								<th scope="col">Date and Time</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<th scope="row">1</th>
								<td>Rose event</td>
								<td>20 Jun 2020, 02 PM</td>
								<td>$120</td>
								<td>2</td>
								<td>$240</td>
								</tr>
								<tr>
								<th></th>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								</tr>
								<tr>
								<th></th>
								<td></td>
								<td></td>
								<td></td>
								<td>total</td>
								<td>$240</td>
								</tr>
								<tr>
								<th></th>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
