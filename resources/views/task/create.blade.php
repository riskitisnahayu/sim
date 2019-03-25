@extends('layouts.panel')

@section('page_title')
    Tambah Soal

@endsection

@section('content_section')
<div class="panel panel-flat">
    <div class="panel-body">

    {{-- Validasi  --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content area -->
<div class="content">
	<!-- Basic setup -->
    <div class="panel panel-white">
		<div class="panel-heading">
			<h6 class="panel-title">Buat Soal</h6>
		</div>
        <form class="steps-validation" action="{!! route('task.store') !!}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="taskmaster_id" value="{{ $taskmaster_id }}">
            @for ($i=0; $i < $total; $i++)
                <h6>Soal {{ " ".$i+1 }}</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="display-block text-semibold">Gambar</label>
                                <div class="col-lg-4">
                                    <input type="file" class="file-styled" name="images[]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="display-block text-semibold">Deskripsi soal <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <textarea name="task[description][{{ $i }}]" rows="8" style="width: 100%" class="required"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    @foreach ($choices as $key => $c)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-lg-1">{{ $c.". " }} <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <textarea name="answer[{{ $i }}][]" rows="3" style="width: 100%" class="required"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <br>
                    <div class="form-group">
                        <label class="display-block text-semibold">Jawaban yang benar <span class="text-danger">*</span></label>
                        <label class="radio-inline">
                            <input type="radio" value="1" name="true_answer[{{ $i }}]" class="styled required">
                            a.
                        </label>

                        <label class="radio-inline">
                            <input type="radio" value="2" name="true_answer[{{ $i }}]" class="styled">
                            b.
                        </label>

                        <label class="radio-inline">
                            <input type="radio" value="3" name="true_answer[{{ $i }}]" class="styled">
                            c.
                        </label>

                        <label class="radio-inline">
                            <input type="radio" value="4" name="true_answer[{{ $i }}]" class="styled">
                            d.
                        </label>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="display-block text-semibold">Pembahasan</label>
                        <div class="col-lg-12">
                            <textarea name="task[discussion][{{ $i }}]" rows="3" style="width: 100%"></textarea>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                </fieldset>
            @endfor

		</form>
    </div>
    <!-- /basic setup -->
    </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/wizards/steps.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/styling/uniform.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('panel/assets/js/core/libraries/jasny_bootstrap.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('panel/assets/js/plugins/forms/validation/validate.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('panel/assets/js/plugins/extensions/cookie.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('panel/assets/js/core/app.js') !!}"></script>
    {{-- <script type="text/javascript" src="{!! asset('panel/assets/js/pages/wizard_steps.js') !!}"></script> --}}
    <script type="text/javascript">
        $(function() {
            //untuk submit
            $(".steps-basic").steps({
               headerTag: "h6",
               bodyTag: "fieldset",
               transitionEffect: "fade",
               titleTemplate: '<span class="number">#index#</span> #title#',
               labels: {
                   finish: 'Submit'
               },
               onFinished: function (event, currentIndex) {
                   $(".steps-basic").submit();
               }
           });

           // init plugins == untuk inout form2
           // Select2 selects
            $('.select').select2();


            // Simple select without search
            $('.select-simple').select2({
                minimumResultsForSearch: Infinity
            });


            // Styled checkboxes and radios
            $('.styled').uniform({
                radioClass: 'choice'
            });


            // Styled file input
            $('.file-styled').uniform({
                fileButtonClass: 'action btn bg-blue'
            });
        })

        // Show form
        var form = $(".steps-validation").show();

        //buat validasi
        // Initialize wizard
        $(".steps-validation").steps({
         headerTag: "h6",
         bodyTag: "fieldset",
         transitionEffect: "fade",
         titleTemplate: '<span class="number">#index#</span> #title#',
         autoFocus: true,
         onStepChanging: function (event, currentIndex, newIndex) {

             // Allways allow previous action even if the current form is not valid!
             if (currentIndex > newIndex) {
                 return true;
             }

             // Forbid next action on "Warning" step if the user is to young
             if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                 return false;
             }

             // Needed in some cases if the user went back (clean up)
             if (currentIndex < newIndex) {

                 // To remove error styles
                 form.find(".body:eq(" + newIndex + ") label.error").remove();
                 form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
             }

             form.validate().settings.ignore = ":disabled,:hidden";
             return form.valid();
         },

         onStepChanged: function (event, currentIndex, priorIndex) {

             // Used to skip the "Warning" step if the user is old enough.
             if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
                 form.steps("next");
             }

             // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
             if (currentIndex === 2 && priorIndex === 3) {
                 form.steps("previous");
             }
         },

         onFinishing: function (event, currentIndex) {
             form.validate().settings.ignore = ":disabled";
             return form.valid();
         },

         onFinished: function (event, currentIndex) {
             alert(".steps-validation").submit();
         }
     });


    // Initialize validation
    $(".steps-validation").validate({
     ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
     errorClass: 'validation-error-label',
     successClass: 'validation-valid-label',
     highlight: function(element, errorClass) {
         $(element).removeClass(errorClass);
     },
     unhighlight: function(element, errorClass) {
         $(element).removeClass(errorClass);
     },

     // Different components require proper error label placement
     errorPlacement: function(error, element) {

         // Styled checkboxes, radios, bootstrap switch
         if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
             if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                 error.appendTo( element.parent().parent().parent().parent() );
             }
              else {
                 error.appendTo( element.parent().parent().parent().parent().parent() );
             }
         }

         // Unstyled checkboxes, radios
         else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
             error.appendTo( element.parent().parent().parent() );
         }

         // Input with icons and Select2
         else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
             error.appendTo( element.parent() );
         }

         // Inline checkboxes, radios
         else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
             error.appendTo( element.parent().parent() );
         }

         // Input group, styled file input
         else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
             error.appendTo( element.parent().parent() );
         }

         else {
             error.insertAfter(element);
         }
     },
     rules: {
         email: {
             email: true
         }
     }
    });
    </script>
@endsection
