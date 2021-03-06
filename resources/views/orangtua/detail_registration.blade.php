@extends('layouts.panel')

@section('page_title')
    Detail Akun Anak

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

        <form class="form-horizontal" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
        	<fieldset class="content-group">
                <legend class="text-bold">Data diri anak</legend>

                <div class="form-group">
        			<label class="control-label col-lg-2">Nama anak</label>
        			<div class="col-lg-10">
                        <input type="text" class="form-control" name="name" placeholder="{{ $siswa->user['name'] }}" readonly="">
        			</div>
        		</div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Jenis kelamin</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="jenis_kelamin" placeholder="{{ $siswa->jenis_kelamin }}" readonly="" type="text">
                    </div>
                </div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Username</label>
        			<div class="col-lg-10">
                        <input type="text" class="form-control" name="username" placeholder="{{ $siswa->user['username'] }}" readonly="">
        			</div>
        		</div>

                <div class="form-group">
        			<label class="control-label col-lg-2">Email</label>
        			<div class="col-lg-10">
                        <input type="text" class="form-control" name="email" placeholder="{{ $siswa->user['email'] }}" readonly="">
        			</div>
        		</div>

                <fieldset class="content-group">
				<legend class="text-bold">Sekolah</legend>

				<div class="form-group">
					<label class="control-label col-lg-2">Provinsi</label>
					<div class="col-lg-10">
                        <select class="form-control" name="provinces" id="provinces" onchange="checkform()" disabled>
                            @foreach($provinces as $item)
                                <option value="{{$item->id}}" @if($item->id == $siswa->province_id) selected='selected' @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
					</div>
				</div>

                <div class="form-group">
					<label class="control-label col-lg-2">Kota/kabupaten</label>
					<div class="col-lg-10">
                        <select class="form-control" name="regencies" id="regencies" onchange="checkform()" disabled>
                            @foreach($regencies as $item)
                                <option value="{{$item->id}}" class="{{$item->province_id}}" @if($item->id == $siswa->regency_id) selected='selected' @endif >{{ $item->name }} </option>
                            @endforeach
                       </select>
					</div>
				</div>

                <div class="form-group">
					<label class="control-label col-lg-2">Kecamatan</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="districts" id="districts" disabled>
                            @foreach ($districts as $item)
                                <option value="{{$item->id}}" class="{{$item->regency_id}}" @if($item->id == $siswa->district_id) selected='selected' @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
				</div>

                <div class="form-group">
					<label class="control-label col-lg-2">Nama sekolah</label>
					<div class="col-lg-10">
						<input type="text" name="school_name" class="form-control" placeholder="{{ $siswa->school_name }}" readonly>
					</div>
				</div>

                <div class="form-group">
        			<label class="control-label col-lg-2">Kelas</label>
        			<div class="col-lg-10">
                        <input type="text" name="class" class="form-control" placeholder="{{ $siswa->class }}" readonly="">
        			</div>
        		</div>
			</fieldset>

        	</fieldset>

            <div class="row" style="margin-top: 10px;">
              <div class="col-md-12" style="text-align: center;">
                <button type="button" class="btn btn-success" onclick="location.href='/orangtua/registerasi-anak';">Kembali</button>
              </div>
            </div>
        </form>

    </div>


    </div>
@endsection
