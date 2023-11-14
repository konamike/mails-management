<x-mail::message>
From the Office of the MD/CEO of the NDDC
<p>Your document:</p>
 <p><b>{{$message}} </b></p>
 <p>has been treated and dispatched.</p>

<x-mail::button :url="'https://www.nddc.gov.ng'">
Visit the NDDC Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
