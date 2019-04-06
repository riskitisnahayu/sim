@extends('layouts.panel')

@section('page_title')
    Tambah Akun Anak

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

        <form class="form-horizontal" action="{!! route('orangtua.registeration.store') !!}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="orangtua_id" value="{{ $ortu->orangtua->id }}">
        	<fieldset class="content-group">
                <legend class="text-bold">Data diri anak</legend>
                <div class="form-group">
        			<label class="control-label col-lg-2">Nama anak</label>
        			<div class="col-lg-10">
        				<input type="text" class="form-control" name="name" placeholder="nama anak" value="{{ old('name') }}">
        			</div>
        		</div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Jenis kelamin</label>
                    <div class="col-lg-10">
                    <select name="jenis_kelamin" class="form-control" >
                        <option  selected disabled>
                            @if($errors->any())
                                @if ($errors)

                                @endif
                                {{ old('jenis_kelamin') }}
                            @else
                                ---- Pilih Jenis Kelamin ----
                            @endif
                        </option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                    </div>
                </div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Username</label>
        			<div class="col-lg-10">
        				<input type="text" class="form-control" name="username" placeholder="username" value="{{ old('username') }}">
        			</div>
        		</div>

                <div class="form-group">
        			<label class="control-label col-lg-2">Email</label>
        			<div class="col-lg-10">
        				<input type="email" class="form-control" name="email" placeholder="email" value="{{ old('email') }}">
        			</div>
        		</div>
                <div class="form-group">
        			<label class="control-label col-lg-2">Password</label>
        			<div class="col-lg-10">
        				<input type="password" class="form-control" name="password" placeholder="password">
        			</div>
        		</div>

                <fieldset class="content-group">
				<legend class="text-bold">Sekolah</legend>

				<div class="form-group">
					<label class="control-label col-lg-2">Provinsi</label>
					<div class="col-lg-10">
						{{-- <input type="text" class="form-control" placeholder="provinsi"> --}}
                            <select class="form-control" name="province_id" id="provinces" onchange="checkform()">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinces as $key => $value)
                                    <option value="{{$value->id}}" {{collect(old('provinces'))->contains($value->id) ? 'selected':''}}>{{ $value->name }}</option>
                                @endforeach
                            </select>
					</div>
				</div>

                <div class="form-group">
					<label class="control-label col-lg-2">Kota/kabupaten</label>
					<div class="col-lg-10">
						{{-- <input type="text" class="form-control" placeholder="kota/kabupaten"> --}}
                        <select class="form-control" name="regency_id" id="regencies" onchange="checkform()">
                            <option value="">Pilih Kota/kabupaten</option>
                            @foreach ($regencies as $value)
                                <option  class="{{$value->province_id}}" value="{{$value->id}}" {{collect(old('regencies'))->contains($value->id) ? 'selected':''}}>{{ $value->name }}</option>
                            @endforeach
                        </select>
					</div>
				</div>

                <div class="form-group">
					<label class="control-label col-lg-2">Kecamatan</label>
					<div class="col-lg-10">
						{{-- <input type="text" class="form-control" placeholder="kecamatan"> --}}
                        <select class="form-control" name="district_id" id="districts" onchange="checkform()">
                            <option value="" class="">Pilih Kecamatan</option>
                            @foreach ($districts as $item)
                                <option class="{{$item->regency_id}}" value="{{$item->id}}"{{collect(old('districts'))->contains($item->id) ? 'selected':''}}>{{ $item->name }}</option>
                            @endforeach
                        </select>
					</div>
				</div>

                <div class="form-group">
					<label class="control-label col-lg-2">Nama sekolah</label>
					<div class="col-lg-10">
						<input type="text" name="school_name" class="form-control" placeholder="nama sekolah" value="{{ old('school_name') }}">
					</div>
				</div>

                <div class="form-group">
        			<label class="control-label col-lg-2">Kelas</label>
        			<div class="col-lg-10">
                        <select name="class" class="form-control" >
                            <option  selected disabled>
                                @if($errors->any())
                                    @if ($errors)

                                    @endif
                                    {{ old('class') }}
                                @else
                                    ---- Pilih Kelas ---
                                @endif
                            </option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
        			</div>
        		</div>
			</fieldset>

        	</fieldset>

            <div class="row" style="margin-top: 10px;">
              <div class="col-md-12" style="text-align: center;">
                <button type="submit" class="btn btn-success">Registrasi</button>
                <button type="button" class="btn btn-danger" onclick="location.href='/orangtua/registerasi-anak';">Batal</button>
              </div>
            </div>
        </form>

    </div>


    </div>
@endsection
@section('script')
    <script src="{{asset('assets/js/jquery.chained.min.js')}}"></script>
    <script>$("#regencies").chained("#provinces");</script>
    <script>$("#districts").chained("#regencies");</script>

@endsection
