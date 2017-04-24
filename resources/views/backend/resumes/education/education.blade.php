@extends('backend.layouts.resume')

@section('content')

    <div role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if(count($educations) >0)
                    @foreach($educations as $education)
                        <div class="x_panel">
                            <div class="x_title">
                                <button id="add" type="button" class="btn btn-primary btn-sm pull-left add_new" data-toggle="modal"
                                        data-target="#add-career-profile"> <i class="fa fa-plus" style="font-size: 14pt; color: #00a7d0">  </i>
                                </button>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn_delete_edu" href="{{ route('frontend.resume.remove_education', $education->id )}}">
                                            <i class="fa fa-trash" aria-hidden="true" style="color: red" ></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form action="/resume/educations/save-education" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                    {{ csrf_field() }}

                                    <input name="education_id" type="hidden" value="{{ $education->id }}">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="school">School <span class="required">*</span>
                                            </label>
                                            <input name="school" type="text" id="school" required="required" class="form-control col-md-7 col-xs-12" value="{{ $education->school }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="major">Major <span class="required">*</span>
                                            </label>
                                            <input type="text" id="major" name="major" required="required" class="form-control col-md-7 col-xs-12" value="{{ $education->major }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label" for="address">Adress <span class="required">*</span>
                                            </label>
                                            <textarea type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12">{{ $education->address }}

                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="start_date">Start Date <span class="required">*</span>
                                            </label>
                                            <input type="text" data-date-format="yyyy-mm-dd" id="start_date"
                                                   name="start_date" class="form-control"
                                                   value="{{ $education->start_date }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="end_date"> End Date <span class="required">*</span>
                                            </label>
                                            <input type="text" data-date-format="yyyy-mm-dd" id="end_date"
                                                   name="end_date" class="form-control"
                                                   value="{{ $education->end_date }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Degree</label>
                                            <select name="degree" class="form-control single">

                                                @foreach( $degrees as $degree )
                                                    @if($degree->id == $education->degree->id)
                                                        <option selected value="{{ $degree->id }}">{{ $degree->name }}</option>
                                                    @else
                                                        <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-11">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    @endforeach

                @else

                    <div class="x_panel">
                        <div class="x_title">
                            <button id="add" type="button" class="btn btn-primary btn-sm pull-left add_new" data-toggle="modal"
                                    data-target="#add-career-profile"> <i class="fa fa-plus" style="font-size: 14pt; color: #00a7d0">  </i>
                            </button>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <h5>There is no education, Click on button add to add education</h5>
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </div>

    <div role="main" class="add_education">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Education </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="/resume/educations/save-education" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school">School <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="school" type="text" id="school" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="major">Major <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="major" name="major" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Degree</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="degree" class="form-control single">
                                        @foreach( $degrees as $degree )
                                            <option name="degree_id" value="{{ $degree->id }}">{{ $degree->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" data-date-format="yyyy-mm-dd" id="start_date"
                                           name="start_date" class="form-control"
                                           placeholder="{{ trans('resume.resume.start_date') }}" value="{{ old('start_date') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Adress <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12">

                                                </textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" data-date-format="yyyy-mm-dd" id="end_date"
                                           name="end_date" class="form-control"
                                           placeholder="{{ trans('resume.resume.end_date') }}" value="{{ old('start_date') }}">
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
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

@endsection

@section('js')
    <script>

        $(".add_education").hide();

        $(document).on('click', "#add", function(){
            $(".add_education").toggle();
        });
        $('.add_new').hide();
        $('.add_new').first().show();

        $(document).on('click', '.btn_delete_edu', function(event)  {
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
                function(isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            method: 'POST',
                            url: var_url,
                            data: {_token: '{{csrf_token()}}' },
                            dataType: 'JSON',
                            success: function(result) {

                                if(result.status == true) {
                                    swal("Deleted!", "Your experience has been deleted.", "success");
                                    setTimeout(function(){// wait for 3 secs(2)
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
    </script>
@endsection