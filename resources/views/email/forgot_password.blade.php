Hello, {{ $data->first_name .' '. $data->last_name}}

<br>

Your New Password: <b> {{ $data->random_pass}}</b>

<br>

Best Regards.
<br>
{{ config('app.name') }}



