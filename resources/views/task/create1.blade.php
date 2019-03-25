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

    <form class="form-horizontal" action="{!! route('task.store') !!}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="taskmaster_id" value="{{ $taskmaster_id }}">
    	<fieldset class="content-group">
            @for ($i=0; $i < $total; $i++)
                <div class="form-group">
        			<label class="control-label col-lg-2">Soal {{ " ".$i+1 }}</label>
        			<div class="col-lg-12">
                        <textarea name="task[description][{{ $i }}]" rows="8" style="width: 100%" required></textarea>
        			</div>
        		</div>
                @for ($j=0; $j < 4; $j++)
                    <div class="form-group">
            			<label class="control-label col-lg-1">{{ $choices[$j] . "."}}</label>
            			<div class="col-lg-10">
                            <textarea name="answer[{{ $i }}][]" rows="3" style="width: 100%" required></textarea>
            			</div>
            		</div>
                @endfor
                <div class="form-group">
					<label class="display-block text-semibold">Jawaban yang benar</label>
					<label class="radio-inline">
						<input type="radio" value="1" name="true_answer[{{ $i }}]" class="styled">
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
                <div class="form-group">
                    <label class="control-label col-lg-1">Pembahasan</label>
                    <div class="col-lg-10">
                        <textarea name="task[discussion][{{ $i }}]" rows="3" style="width: 100%"></textarea>
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
