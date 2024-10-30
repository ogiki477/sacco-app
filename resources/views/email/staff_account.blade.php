Hello,

<br>
 
<h2><b> Your Login Credentials To {{ config('app.name') }} </b></h2> 

<br>

Your Email ID :- <b>{{ $data->email }}</b>


<br>


Your Password :- <b>{{$data->random_password }}</b>

<br>

Thank you, <br>

{{ config('app.name') }}