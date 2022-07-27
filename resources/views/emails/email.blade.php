@component('mail::message')
# Mahasiswa Meminjam Alat dan Bahan

Percobaan pengiriman dari Laravel 


@component('mail::button', ['url' => '/admin'])
Approval Now
@endcomponent

Thanks,<br>
{{ config('app.name') }} :)
@endcomponent
