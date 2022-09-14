<tr>
    <td>
        @if ($user->is_active == 1)
            <i class="fa-solid fa-circle text-success" title="Active" style="font-size: 2em "></i>
        @else
            <i class="fa-solid fa-circle text-danger" title="Inactive" style="font-size: 2em"></i>
        @endif
    </td>
    <td class="d-flex align-items-center justify-content-left">
        @if ($user->avatar)
            <img src="{{ $user->avatar }}" alt="Image" height="40px">
        @endif
        <a href="{{ route('users.show', $user->id) }}" class='nav nav-link'>{{ $user->username }}</a>
    </td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->is_admin == 1 ? 'Admin' : 'User' }}</td>
    <td>{{ date('Y.m.d', strtotime($user->created_at)) }}</td>
    <td>{{ $user->posts_count }}</td>
</tr>
