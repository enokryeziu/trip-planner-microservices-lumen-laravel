@if (Auth::guard('web')->check( ))
    <p>
        You are logged in as a <strong>USER</strong>
    </p>
    @else
        <p class="text-danger">
            You are logged Out as a <strong>USER</strong>
        </p>
@endif

@if (Auth::guard('admin')->check( ))
    <p>
        You are logged in as a <strong>ADMIN</strong>
    </p>
    @else
        <p class="text-danger">
            You are logged Out as a <strong>ADMIN</strong>
        </p>
@endif