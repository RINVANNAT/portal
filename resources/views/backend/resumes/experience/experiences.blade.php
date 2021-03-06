@extends('backend.layouts.resume')

<link rel="stylesheet" href="{{ asset('css/backend/resume/resume.css') }}"/>

@section('content')
    <div role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if(count($experiences)>0)
                    @foreach($experiences as $experience)

                        <div class="x_panel">
                            <div class="x_title">
                                <button id="add" type="button" class="btn btn-primary btn-sm pull-left add_new"
                                        data-toggle="modal"
                                        data-target="#add-career-profile"><i class="fa fa-plus"
                                                                             style="font-size: 14pt; color: #00a7d0"> </i>
                                </button>
                                @if(isset($userResume))
                                    <button type="button" class="btn btn-warning preview" data-toggle="modal" data-target=".bs-example-modal-lg">
                                        <i class="fa fa-eye" aria-hidden="true"></i> Preview
                                    </button>
                                @endif
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn_delete_exp"
                                           href="{{ route('frontend.resume.remove_experience',$experience->id) }}">
                                            <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                        </a>


                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="/resume/save-experience" method="POST" id="demo-form2"
                                      data-parsley-validate class="form-horizontal form-label-left">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                                    <input type="hidden" name="experience_id" value="{{ $experience->id }}">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="position">Position <span class="required">*</span>
                                            </label>
                                            <input type="text" id="company" name="company" required="required"
                                                   class="form-control col-md-7 col-xs-12"
                                                   value="{{ $experience->company }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="company">Company <span
                                                        class="required">*</span>
                                            </label>
                                            <input type="text" id="position" name="position" required="required"
                                                   class="form-control col-md-7 col-xs-12"
                                                   value="{{ $experience->position }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label" for="description">Address <span
                                                        class="required">*</span>
                                            </label>
                                            <textarea type="text" id="description" name="address" required="required"
                                                      class="form-control">{{ $experience->address }}
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Start Date <span class="required">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="text" data-date-format="yyyy-mm-dd" id="start_date"
                                                       name="start_date" class="date-picker form-control start_date"
                                                       value="{{ $experience->start_date }}" readonly>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">End Date <span class="required">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="text" data-date-format="yyyy-mm-dd" id="end_date"
                                                       name="end_date" class="date-picker form-control end_date"
                                                       value="{{ $experience->end_date }}" readonly>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar-o"></i>
                                                </span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label" for="description">Description <span
                                                        class="required">*</span>
                                            </label>
                                            <textarea type="text" id="description" name="description"
                                                      required="required" class="form-control">{{ $experience->description }}
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-11">
                                            <button type="submit" class="btn btn-info">Update </button>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    @endforeach
                @else

                    <div class="x_panel">
                        <div class="x_title">
                            <button id="add" type="button" class="btn btn-primary btn-sm pull-left add_new"
                                    data-toggle="modal"
                                    data-target="#add-career-profile"><i class="fa fa-plus"
                                                                         style="font-size: 14pt; color: #00a7d0"> </i>
                            </button>
                            @if(isset($userResume))
                                <button type="button" class="btn btn-warning preview" data-toggle="modal" data-target=".bs-example-modal-lg">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Preview
                                </button>
                            @endif

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <h5>There is no experience, Click on button add to add experience</h5>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div role="main" class="add_experience">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Experience </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form action="/resume/save-experience" method="POST" id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">
                            {{ csrf_field() }}

                            @if(isset($userResume))
                                <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                            @endif

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="position">Position <span class="required">*</span>
                                    </label>
                                    <input type="text" id="company" name="company" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="company">Company <span
                                                class="required">*</span>
                                    </label>
                                    <input type="text" id="position" name="position" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="description">Address <span
                                                class="required">*</span>
                                    </label>
                                    <textarea type="text" id="description" name="address" required="required"
                                              class="form-control">
                                            </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="description">Description <span
                                                class="required">*</span>
                                    </label>
                                    <textarea type="text" id="description" name="description"
                                              required="required" class="form-control">
                                            </textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Start Date <span class="required">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" data-date-format="yyyy-mm-dd" id="start_date"
                                               name="start_date" class="date-picker form-control start_date"
                                               readonly>
                                        <span class="input-group-addon">
                                                    <i class="fa fa-calendar-o"></i>
                                                </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">End Date <span class="required">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" data-date-format="yyyy-mm-dd" id="end_date"
                                               name="end_date" class="date-picker form-control end_date"
                                               readonly>
                                        <span class="input-group-addon">
                                                    <i class="fa fa-calendar-o"></i>
                                                </span>
                                    </div>

                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.resumes.includes.modal.preview')

@endsection

@section('js')

    <script>
        $(".add_experience").hide();
        $(document).on('click', "#add", function () {
            $(".add_experience").toggle();
        });

        $('.add_new').hide();
        $('.add_new').first().show();

        $('.preview').hide();
        $('.preview').first().show();

        $(document).on('click', '.btn_delete_exp', function (event) {
            event.preventDefault();
            var var_url = $(this).attr('href');

            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete this experience?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            method: 'POST',
                            url: var_url,
                            data: {_token: '{{csrf_token()}}'},
                            dataType: 'JSON',
                            success: function (result) {

                                if (result.status == true) {
                                    swal("Deleted!", "Your experience has been deleted.", "success");
                                    setTimeout(function () {// wait for 3 secs(2)
                                        location.reload(); // then reload the page.(3)
                                    }, 3000);
                                }
                            }
                        })

                    } else {
                        swal("Cancelled", "Your experience is safe :)", "error");
                    }
                });
        })

        $('.start_date').datepicker({
            format:'yyyy-mm-d'
        })
        $('.end_date').datepicker({
            format:'yyyy-mm-d'
        })


    </script>

@endsection