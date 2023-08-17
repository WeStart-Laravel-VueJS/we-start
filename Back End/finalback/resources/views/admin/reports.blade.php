@extends('admin.app')

@section('title', 'All Reports')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">All Reports</h3>
            <div class="table-responsive">
                <table class="table table-top-campaign">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service</th>
                            <th>User</th>
                            <th>Complain</th>
                            <th>Status</th>
                            <th>Reply</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reports as $report)
                        <tr>
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->service->name }}</td>
                            <td>{{ $report->user->name }}</td>
                            <td>{{ $report->comment }}</td>
                            <td>{!! $report->status ? '<span class="badge badge-success">Contacted</span>' : '<span class="badge badge-danger">Waiting</span>' !!}</td>
                            <td>
                                <button onclick="replayTo('{{ route('admin.reports_replay', $report->id) }}')" type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#mediumModal">
                                    Reply
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Data Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
<!-- end modal medium -->
@endsection

@section('js')

<!-- modal medium -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Message Reply</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <textarea name="reply" rows="5" class="form-control mb-3"></textarea>

                    <button class="btn btn-success"> <i class="fas fa-paper-plane"></i> Send</button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    function replayTo(link) {
        $('.modal form').attr('action', link)
    }
</script>
@endsection
