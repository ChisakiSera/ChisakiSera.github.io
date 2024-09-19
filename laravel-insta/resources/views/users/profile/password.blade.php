@extends('layouts.app')

@section('title', 'Change Password')

@section('content')

<div class="row justify-content-center">
  <div class="col-6">
    <form action="{{ route('password.update') }}" method="post" class="bg-white shadow rounded-3 p-5">
      @csrf
      @method('PATCH')

      <h2 class="h3 mb-3 fw-light text-muted">Change Password</h2>

      <div class="mb-3">
        <label for="password" class="form-label fw-bold">Password</label>
        <input type="password" name="password" id="password" class="form-control" autocomplete="new-password" autofocus>
        {{-- error --}}
        @error('password')
          <p class="text-danger small">{{ $message }}</p> 
        @enderror
      </div>
      <div class="mb-3">
        <label for="password-confirm" class="form-label fw-bold">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password-confirm" class="form-control" autocomplete="new-password">
      </div>

      <button type="submit" class="btn btn-warning px-5">Save</button>
    </form>
  </div>
</div>
@endsection
