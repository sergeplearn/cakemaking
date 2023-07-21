<x-mail::message>
# Introduction


Welcome Mr/Mrs {{ $User->name }}
<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
