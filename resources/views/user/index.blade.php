@extends('layouts.app')

@section('content')
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createUserModalTitle">ایجاد کاربر</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <user-create user-route="{{ route('user') }}" user-id="0"></user-create>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#createUserModal">ایجاد کاربر</a>
    </li>
  </ul>
  <br />
  <table class="table">
    <thead>
      <tr>
        <th scope="col">نام</th>
        <th scope="col">نام‌خانوادگی</th>
        <th scope="col">موبایل</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->first_name }}</td>
        <td>{{ $user->last_name }}</td>
        <td>{{ $user->mobile }}</td>
        <td><input class="btn btn-secondary" type="button" value="ویرایش" onclick="editUser({{ $user->id }})" /></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script>
  let ids = [];

  function editUser(id) {
    if (ids.includes(id)) return;

    alert(id);
    ids.push(id);
  }
</script>
@endsection