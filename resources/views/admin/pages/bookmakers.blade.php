@extends('admin.dashboard')

@section('content')
    <div class="add-bookmaker">
        <!-- Large modal -->
        <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-md">Add bookmaker</button>

        <div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">New Bookmaker</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/admin/bookmakers/add" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="bookmakerName" class="form-control-label">Bookmaker:</label>
                                <input type="text" class="form-control" id="bookmakerName" name="bookmakerName">
                            </div>
                            <div class="col-md-8 form-group">
                                <label for="bookmakerLogo" class="form-control-label">Logo:</label>
                                <input type="file" class="form-control" id="bookmakerLogo" name="bookmakerLogo">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="bookmakerRating" class="form-control-label">Rating (0 to 5.0):</label>
                                <input type="number" class="form-control" id="bookmakerRating" name="bookmakerRating">
                            </div>

                            <div class="align-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div  id="accordion-wrapper">
        <div class="row">
            <div class="col-xs-12 col-md-9">

                <div id="bookmakers">
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <tr>
                                <td>
                                    N. Name
                                </td>
                                <td>
                                    Rating
                                </td>
                                <td>

                                </td>
                            </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach ($bookmakers as $bookmaker)
                                <tr>
                                    <!-- Name -->
                                    <td class="table-text">
                                        <div>{{ $bookmakersCount-- }}. {{ $bookmaker->bookmaker }}</div>
                                    </td>

                                    <!-- Rating -->
                                    <td class="table-text">
                                        <div>{{ $bookmaker->rating }}</div>
                                    </td>

                                    <!-- Delete Button -->
                                    <td>

                                        <form action="/admin/bookmaker/delete/{{ $bookmaker->id }}" method="POST" id="deleteBookmakerForm">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-info delete-button">
                                                <i class="icon-trash icon-white"></i>
                                                Delete
                                            </button>
                                        </form>
                                        <form action="/admin/bookmaker/edit/{{ $bookmaker->id }}" method="POST" id="editBookmakerForm">
                                            {{ csrf_field() }}
                                            <button class="btn btn-info delete-button">
                                                <i class="icon-trash icon-white"></i>
                                                Edit
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function () {
                    $("#rateYo").rateYo({
                        ratedFill: "#E74C3C",
                        starWidth: "24px",
                        onSet: function (rating, rateYoInstance) {

                            $.ajax({
                                type: 'POST',
                                url: '/admin/bookmakers/save',
                                data: {
                                    "_token": $('#token').val(),
                                    "bookmaker": "1xbet",
                                    "rating": rating
                                },
                                dataType: 'json',
                                success: function (data) {
                                    $(".bookmakerRatingText").text(rating);
                                }
                            });

                        }

                    });
                })
            </script>

@endsection