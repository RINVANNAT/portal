@extends('backend.layouts.resume')

@section('content')
    <div role="main">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if(count($skills)>0)
                    @foreach($skills as $skill)
                        <div class="x_panel">
                            <div class="x_title">
                                <button id="add" type="button" class="btn btn-primary btn-sm pull-left add_new" data-toggle="modal"
                                        data-target="#add-career-profile"> <i class="fa fa-plus" style="font-size: 14pt; color: #00a7d0">  </i>
                                </button>
                                @if(isset($userResume))
                                    <button type="button" class="btn btn-warning preview" data-toggle="modal" data-target=".bs-example-modal-lg">
                                        <i class="fa fa-eye" aria-hidden="true"></i> Preview
                                    </button>
                                @endif
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li>
                                        <a class="btn_delete_skill" href="{{ route('frontend.resume.remove_skill', $skill->id )}}">
                                            <i class="fa fa-trash" aria-hidden="true" style="color: red" ></i>
                                        </a>
                                    </li>
                                </ul>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form action="/resume/skills/save-skill" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                                    <input name="skill_id" type="hidden" value="{{ $skill->id }}">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input name="name" value="{{ $skill->name }}" type="text" id="name" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input name="description" value="{{ $skill->description }}" type="text" id="description" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                                            <button type="submit" class="btn btn-info">Update</button>
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
                            @if(isset($userResume))
                                <button type="button" class="btn btn-warning preview" data-toggle="modal" data-target=".bs-example-modal-lg">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Preview
                                </button>
                            @endif

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <h5>There is no skill, Click on button add to add skill</h5>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <div role="main" class="add_skill">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Skill </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="/resume/skills/save-skill" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}

                            @if(isset($userResume))
                                <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                            @endif

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="name" type="text" id="name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea type="text" id="description" name="description" required="required" class="form-control col-md-7 col-xs-12">

                                            </textarea>

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

    {{--modal--}}
    @include('backend.resumes.includes.modal.preview')

@endsection

@section('js')
    <script>
        $('.add_skill').hide();
        $(document).on('click', '#add', function () {
            $('.add_skill').toggle();
        })
        $('.add_new').hide();
        $('.add_new').first().show();

        $('.preview').hide();
        $('.preview').first().show();

        $(document).on('click', '.btn_delete_skill', function(event)  {
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
                                    swal("Deleted!", "Your skill has been deleted.", "success");
                                    setTimeout(function(){// wait for 3 secs(2)
                                        location.reload(); // then reload the page.(3)
                                    }, 2000);
                                }
                            }
                        })

                    } else {
                        swal("Cancelled", "Your skill is safe :)", "error");
                    }
                });

        })
    </script>
@endsection