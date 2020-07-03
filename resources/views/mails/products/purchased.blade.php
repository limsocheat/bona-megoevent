@component('mail::message')
# Order Details

You have successfully completed the order.

@component('mail::button', ['url' => route('manage.sale.show', $sale->id)])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
