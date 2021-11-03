@component('mail::message')
<p>Ini adalah satu test email menggunakan Larave</p>

@component('mail::button', ['url' => ''])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
