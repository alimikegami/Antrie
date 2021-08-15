Hello, {{ $data['name'] }}
<br><br>
Here is the link to reset your password! Please complete the process within one hour!
<br><br>
<a href="http://127.0.0.1:8000/password-reset/{{ $data['token'] }}">Reset your password</a>
<br><br>
Antrie Customer Service Team