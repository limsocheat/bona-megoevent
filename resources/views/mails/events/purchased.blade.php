@component('mail::message')
# Purchase Details

<strong>New Event Registration</strong>

<strong>Event Details</strong>
<ul>
    <li>Name: {{ $purchase->event->name }}</li>
</ul>

<strong>User Details</strong>
<ul>
    <li>Name: {{ $purchase->user->name }}</li>
    <li>email: {{ $purchase->user->email }}</li>
</ul>

@component('mail::button', ['url' => route('manage.purchase.show', $purchase->id)])
View Purchase
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
