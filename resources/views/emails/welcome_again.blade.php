@component('mail::message')
# Introduction

Howdy {{ $user->name }}

The body of your message.
- One
- Two
- Three

@component('mail::button', ['url' => 'http://laracasts.com'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
