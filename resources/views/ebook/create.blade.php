@extends('layouts.panel')

@section('page_title')
    Tambah E-Book

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

    <form class="form-horizontal" action="{!! route('ebook.store') !!}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
    	<fieldset class="content-group">
            <div class="form-group">
    			<label class="control-label col-lg-2">Gambar</label>
    			<div class="col-lg-10">
    				<input type="file" class="form-control" name="image">
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="control-label col-lg-2">Judul</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Judul buku">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Mata pelajaran</label>
                <div class="col-lg-10">
                    <select class="form-control" name="subjectscategories_id">
                        <option selected disabled>
                            @if($errors->any())
                                @if ($errors)

                                @endif
                                {{ old('subjectscategories') }}
                            @else
                                ---- Pilih Mata Pelajaran ---
                            @endif
                        </option>
                            @foreach($subjectscategories as $value)
                                <option value="{{$value->id}}" {{collect(old('subjectscategories_id'))->contains($value->id) ? 'selected':''}}>{{$value->name}}</option>
                            @endforeach
                    </select>
                </div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Kelas</label>
    			<div class="col-lg-10">
                    <select name="class" class="form-control" >
                        <option selected disabled>
                            @if($errors->any())
                                @if ($errors)

                                @endif
                                {{ old('class') }}
                            @else
                                ---- Pilih Kelas ---
                            @endif
                        </option>
                        <option value="7" {{collect(old('class'))->contains('7') ? 'selected':''}}>7</option>
                        <option value="8" {{collect(old('class'))->contains('8') ? 'selected':''}}>8</option>
                        <option value="9" {{collect(old('class'))->contains('9') ? 'selected':''}}>9</option>
                    </select>
    			</div>
    		</div>
            <div class="form-group">
                <label class="control-label col-lg-2">Semester</label>
                <div class="col-lg-10">
                <select name="semester" class="form-control">
                    <option selected disabled>
                        @if($errors->any())
                            @if ($errors)

                            @endif
                            {{ old('semester') }}
                        @else
                            ---- Pilih Semester ---
                        @endif
                    </option>
                    <option value="I" {{collect(old('semester'))->contains('I') ? 'selected':''}}>I</option>
                    <option value="II" {{collect(old('semester'))->contains('II') ? 'selected':''}}>II</option>
                    <option value="Both" {{collect(old('semester'))->contains('Both') ? 'selected':''}}>Both</option>
                </select>
                </div>
            </div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Penulis</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="author" value="{{ old('author') }}" placeholder="Nama penulis buku">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Penerbit</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="publisher" value="{{ old('publisher') }}" placeholder="Nama penerbit buku">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Tahun</label>
    			<div class="col-lg-10">
    				<input type="number" class="form-control" name="year" placeholder="Tuliskan tahun dengan angka" value="{{ old('year') }}">
    			</div>
    		</div>
            <div class="form-group">
    			<label class="control-label col-lg-2">Url</label>
    			<div class="col-lg-10">
    				<input type="text" class="form-control" name="url" value="{{ old('url') }}" placeholder="Alamat url">
    			</div>
    		</div>
    	</fieldset>

        <div class="row" style="margin-top: 10px;">
            <div class="col-md-12" style="text-align: center;">
                <button type="button" class="btn btn-danger" onclick="location.href='/admin/e-book';">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>

</div>


</div>
@endsection
