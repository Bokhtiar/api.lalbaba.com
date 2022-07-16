{{-- 1. product new fild quantity
2. email link for register
3. sim korle otp jabe  --}}
home page <br>
@if(Auth::check())
<a class="btn btn-success" href="@route('admin.dashboard')">DASHBOARD</a>
@else
<a class="btn btn-info text-light" href="@route('login')">Login</a>
@endif
