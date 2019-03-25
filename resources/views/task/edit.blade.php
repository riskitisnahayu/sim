@extends('layouts.panel')

@section('page_title')
    Edit Soal

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

<form class="form-horizontal" action="{!! route('task.update',['id'=>$tasks[0]->id]) !!}" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="task_id" value="{{ $tasks[0]->id }}">
	<fieldset>

        {{-- untuk gambar di soal --}}
        @if ($tasks[0]->image)
            <div class="form-group">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <img src="{{ URL::to('/images/'.$tasks[0]->image)}}" style="width:150px">
                </div>
            </div>
        @endif
            <div class="form-group">
                <div class="col-md-12">
                    <label class="display-block text-semibold col-lg-12">Gambar</label>
                    <div class="col-lg-4">
                        <input type="file" class="file-styled" name="image">
                    </div>
                </div>
            </div>

        {{-- untuk form soal --}}
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label text-semibold col-lg-2">Deskripsi Soal </label>
                <div class="col-lg-12">
                    <textarea name="description" rows="8" style="width: 100%" required>{{ $tasks[0]->description }}</textarea>
                </div>
            </div>
		</div>

        {{-- untuk form a deskripsinya apa, b deskripsinya apa, dst --}}
        @for ($j=0; $j < 4; $j++)
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label col-lg-1">{{ $choices[$j] . "."}}</label>
                    <div class="col-lg-10">
                        <textarea name="answer[{{ $j }}][]" rows="3" style="width: 100%" required>{{ $answers[0][$j]->choice_answer }}</textarea>
                    </div>
                </div>
            </div>
        @endfor

        {{-- untuk jawaban yang benar dari soal --}}
        <div class="form-group">
            <div class="col-md-12">
                <label class="display-block text-semibold">Jawaban yang benar</label>
    			<label class="radio-inline">
                        <input type="radio" value="1" name="true_answer[0]" @if ($answers[0][0]->is_answer == 1) checked @endif class="styled">
                        a.
    			</label>

    			<label class="radio-inline">
                        <input type="radio" value="2" name="true_answer[0]" @if ($answers[0][1]->is_answer == 1) checked @endif class="styled">
    					b.
    			</label>

                <label class="radio-inline">
                        <input type="radio" value="3" name="true_answer[0]" @if ($answers[0][2]->is_answer == 1) checked @endif class="styled">
    					c.
    			</label>

                <label class="radio-inline">
                        <input type="radio" value="4" name="true_answer[0]" @if ($answers[0][3]->is_answer == 1) checked @endif class="styled">
    					d.
    			</label>
            </div>

		</div>

        {{-- untuk form pembahasan --}}
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label text-semibold">Pembahasan</label>
                <div class="col-lg-12">
                    <textarea name="discussion" rows="3" style="width: 100%">{{ $tasks[0]->discussion }}</textarea>
                </div>
            </div>
        </div>
    	</fieldset>

        <div class="row" style="margin-top: 10px;">
          <div class="col-md-12" style="text-align: center;">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-danger" onclick="location.href='/admin/bank-soal';">Batal</button>
          </div>
        </div>
    </form>

</div>


</div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {

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
    </script>
@endsection
