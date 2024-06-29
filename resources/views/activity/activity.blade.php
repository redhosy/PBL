@extends('dashboard.layouts.app')

@section('content')
    <h2 class="mt-5">Activity Logs</h2>
    <table class="table table-bordered" id="dataTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Action</th>
                <th>Description</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activityLogs as $log)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $log->user->name }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $activityLogs->links() }}
@endsection

<script>
    $('#dataTable').DataTable();

    var table = $('#dataTable').DataTable();

    $('#searchInput').on('keyup', function() {
        table.search(this.value).draw();
    });
</script>
