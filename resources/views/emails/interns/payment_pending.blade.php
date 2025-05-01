@component('mail::message')
# Hello {{ $intern->firstName }} {{ $intern->lastName }},

Thank you for choosing our {{ $intern->membershipType }} membership.
The amount due is **₹{{ $intern->price }}**.

@component('mail::button', ['url' => $paymentUrl])
Pay Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

