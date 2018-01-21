@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-2">
          @include('users.menu')
        </div>

        <div class="col-md-10 ">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body">

                    @include('alerts.success')

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th>Company</th>
                                <th>Bithdate</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th>{{$user->id}}</th>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->company}}</td>
                                    <td>{{$user->birthdate}}</td>
                                    <td>
                                        <a href="/users/{{$user->id}}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

                                        <form class="form-horizontal" method="POST" action="/users/{{$user->id}}/delete" id="form-delete-{{ $user->id }}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }} 
                                            <a href="#" class="data-delete" data-form="{{ $user->id }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>                                            
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
    <script>
        $('.data-delete').on('click', function (e) {
            if (!confirm('Are you sure to eliminate?')) return;
            e.preventDefault();
            $('#form-delete-' + $(this).data('form')).submit();
          });
    </script>
@endpush