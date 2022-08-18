@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}
Nội dung: {{$content}}
@endcomponent