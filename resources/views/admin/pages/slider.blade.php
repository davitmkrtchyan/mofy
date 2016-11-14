@extends('admin.dashboard')

@section('content')
    <div class="add-bookmaker">
        <!-- Large modal -->
        <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-md">Add Image</button>

        <div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content" style="height: 300px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">New Slider Image</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/admin/slider/add" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-12 form-group">
                                <label for="gameLink" class="form-control-label">Game link:</label>
                                <input type="text" class="form-control" id="gameLink" name="gameLink" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="sliderImg" class="form-control-label">Image:</label>
                                <input type="file" class="form-control" id="sliderImg" name="sliderImg" required>
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
                                    Game Link
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
                            @foreach($sliders as $slider)
                                <tr>
                                    <!-- Rating -->
                                    <td class="table-text">
                                        <div>{{ $slider->gameLink }}</div>
                                    </td>

                                    <!-- Logo -->
                                    <td class="table-text">
                                        <div>
                                            {{--{{ $bookmaker->logo }}--}}
                                            <img src="{{URL::asset('assets/images/bm/admin-slider/'.$slider->imageName)}}" alt="{{$slider->imageName}}"
                                                 style="max-width: 100px; max-height: 35px;">
                                        </div>
                                    </td>

                                    <!-- Delete Button -->
                                    <td>

                                        <form action="/admin/slider/delete/{{ $slider->id }}" method="POST" id="deleteSliderForm">
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