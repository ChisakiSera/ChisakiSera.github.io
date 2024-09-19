@extends('layouts.app')

@section('title', 'Admin: User Search Results')
    
@section('content')
  <table class="table table-hover align-middle bg-white border text-secondary">
    <thead class="small table-success text-secondary">
      <tr>
        <th></th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>CREATED AT</th>
        <th>STATUS</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($users as $user)
        <tr>
          <td>
            @if ($user->avatar)
              <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle d-block mx-auto avatar-md">
            @else
                <i class="fas fa-circle-user d-block text-center icon-md"></i>
            @endif
          </td>
          <td>
            <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $user->name }}</a>
          </td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->created_at }}</td>
          <td>
            @if ($user->trashed())
              <i class="fas fa-circle text-secondary"></i> Inactive
            @else
              <i class="fas fa-circle text-success"></i> Active
            @endif
          </td>
          <td>
            @if (Auth::user()->id !== $user->id)
              <div class="dropdown">
                <button class="btn btn-sm" data-bs-toggle="dropdown">
                  <i class="fas fa-ellipsis"></i>
                </button>

                <div class="dropdown-menu">
                  @if ($user->trashed())
                    <button class="dropdown-item" data-bs-target="#activate-user-{{ $user->id }}" data-bs-toggle="modal">
                      <i class="fas fa-user-check"></i> Activate {{ $user->name }}
                    </button>
                  @else
                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{ $user->id }}">
                      <i class="fas fa-user-slash"></i> Deactivate {{ $user->name }}
                    </button>
                  @endif
                  
                </div>
              </div>
              {{-- include modal here --}}
              @include('admin.users.modal.status')
            @endif
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="lead text-muted text-center">No users found.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $users->links() }}
  </div>
@endsection