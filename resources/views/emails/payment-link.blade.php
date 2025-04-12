@component('mail::message')
# Hello {{ $name }},

Thank you for registering!

To complete your membership, please make the payment using the link below:

@component('mail::button', ['url' => $paymentLink])
Pay Now
@endcomponent

If you have any questions, feel free to contact us.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

