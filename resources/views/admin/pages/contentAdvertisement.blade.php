@extends('admin.dashboard')

@section('content')
    <div class="add-advertisement">
        <!-- Large modal -->
        <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-md">Add Image</button>

        <div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content" style="height: 300px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">New Advertisement Image</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/admin/advertisementcontent/add" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-12 form-group">
                                <label for="affLink" class="form-control-label">Affiliate link:</label>
                                <input type="text" class="form-control" id="affLink" name="affLink" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="advertisementContentImg" class="form-control-label">Image:</label>
                                <input type="file" class="form-control" id="advertisementContentImg" name="advertisementContentImg" required>
                            </div>
                            <!--End description-->

                            <div class="align-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div  id="accordion-wrapper">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <tr>
                                <td>
                                    Affiliate Link
                                </td>
                                <td>
                                    Image
                                </td>
                                <td>

                                </td>
                            </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @foreach($contentAdvertisements as $contentAdvertisement)
                                <tr>
                                    <!-- Rating -->
                                    <td class="table-text">
                                        <div>{{ $contentAdvertisement->affLink }}</div>
                                    </td>

                                    <!-- Logo -->
                                    <td class="table-text">
                                        <div>
                                            {{--{{ $contentAdvertisement->imageName }}--}}
                                            <img src="{{URL::asset('assets/images/bm/admin-advertisement-content/'.$contentAdvertisement->imageName)}}" alt="{{$contentAdvertisement->imageName}}"
                                                 style="max-width: 100px; max-height: 35px;">
                                        </div>
                                    </td>

                                    <!-- Delete Button -->
                                    <td>

                                        <form action="/admin/advertisementcontent/delete/{{ $contentAdvertisement->id }}" method="POST" id="deleteAdvertisementForm">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-info delete-button">
                                                <i class="icon-trash icon-white"></i>
                                                Delete
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
@endsection