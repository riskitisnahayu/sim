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

    <form class="form-horizontal" action="{!! route('task.update',['id'=>$taskmaster_id]) !!}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="taskmaster_id" value="{{ $taskmaster_id }}">
    	<fieldset class="content-group">
            @for ($i=0; $i < $total; $i++)
                <div class="form-group">
        			<label class="control-label col-lg-2">Soal {{ " ".$i+1 }}</label>
        			<div class="col-lg-12">
                        @if ($i < @count($tasks))
                            <textarea name="task[description][{{ $i }}]" rows="8" style="width: 100%" required>{{ $tasks[$i]->description }}</textarea>
                        @else
                            <textarea name="task[description][{{ $i }}]" rows="8" style="width: 100%" required></textarea>
                        @endif
        			</div>
        		</div>
                @for ($j=0; $j < 4; $j++)
                    <div class="form-group">
            			<label class="control-label col-lg-1">{{ $choices[$j] . "."}}</label>
            			<div class="col-lg-10">
            				{{-- <input type="text" class="form-control" name="answer[{{ $i }}][]" required> --}}
                            @if ($i < @count($tasks))
                                <textarea name="answer[{{ $i }}][]" rows="3" style="width: 100%" required>{{ $answers[$i][$j]->choice_answer }}</textarea>
                            @else
                                <textarea name="answer[{{ $i }}][]" rows="3" style="width: 100%" required></textarea>
                            @endif
            			</div>
            		</div>
                @endfor
                <div class="form-group">
					<label class="display-block text-semibold">Jawaban yang benar</label>
					<label class="radio-inline">
                        @if ($i < @count($tasks))
                            <input type="radio" value="1" name="true_answer[{{ $i }}]" @if ($answers[$i][0]->is_answer == 1) checked @endif class="styled">
    						a.
                        @else
                            <input type="radio" value="1" name="true_answer[{{ $i }}]" class="styled">
    						a.
                        @endif

					</label>

					<label class="radio-inline">
                        @if ($i < @count($tasks))
                            <input type="radio" value="2" name="true_answer[{{ $i }}]" @if ($answers[$i][1]->is_answer == 1) checked @endif class="styled">
    						b.
                        @else
                            <input type="radio" value="2" name="true_answer[{{ $i }}]" class="styled">
    						b.
                        @endif

					</label>

                    <label class="radio-inline">
                        @if ($i < @count($tasks))
                            <input type="radio" value="3" name="true_answer[{{ $i }}]" @if ($answers[$i][2]->is_answer == 1) checked @endif class="styled">
    						c.
                        @else
                            <input type="radio" value="3" name="true_answer[{{ $i }}]" class="styled">
    						c.
                        @endif

					</label>

                    <label class="radio-inline">
                        @if ($i < @count($tasks))
                            <input type="radio" value="4" name="true_answer[{{ $i }}]" @if ($answers[$i][3]->is_answer == 1) checked @endif class="styled">
    						d.
                        @else
                            <input type="radio" value="4" name="true_answer[{{ $i }}]" class="styled">
    						d.
                        @endif

					</label>
				</div>
                <div class="form-group">
                    <label class="control-label col-lg-1">Pembahasan</label>
                    <div class="col-lg-10">
                        {{-- <input type="text" class="form-control" name="answer[{{ $i }}][]" required> --}}
                        @if ($i < @count($tasks))
                            <textarea name="task[discussion][{{ $i }}]" rows="3" style="width: 100%">{{ $tasks[$i]->discussion }}</textarea>
                        @else
                            <textarea name="task[discussion][{{ $i }}]" rows="3" style="width: 100%"></textarea>
                        @endif

                    </div>
                </div>
            @endfor

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
