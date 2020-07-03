@component('mail::message')
# Hi, Admin.

There is new sale on website.

@component('mail::button', ['url' => route('admin.sales.show', $sale->id)])
View Sale
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
