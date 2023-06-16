@extends('layouts.main');
@section('title','eMaha-Edit Student')
@section('content')
    <div class="card mt-4">
        <div class="card-header"><strong> Form Edit Student</strong></div>
        <div class="card-body">
            @php
            $minat  = explode(',', $mhs->get('minat'));

            @endphp
            <Form action="/student/update/{{ $mhs->id }}" method="POST">
                @csrf 
                @method('PUT')
                <div class="form-group">
                    <label>NIM</label>
                    <input type="number" name="nim" class="form-control" value="{{$mhs->nim}}">
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$mhs->nama}}">
                </div>
                <label>Gender</label>
                <div class="form-check">
                    <input type="radio" name="gender" class="form-check-input" value="pria"{{($mhs->gender == 'pria')? 'checked':''}}>
                    <label>Pria</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="gender" class="form-check-input" value="wanita"{{($mhs->gender == 'wanita')? 'checked':''}}>
                    <label>Wanita</label>
                </div>

                <label>Program Studi</label>
                <div class="form-group">
                    <select name="prodi" class="form-control">
                        <option value="0">--Pilih Program Studi--</option>
                        <option value="Sistem Informasi"{{($mhs->prodi=='Sistem Informasi')? 'selected':''}}>Sistem Informasi</option>
                        <option value="Informatika"{{($mhs->prodi=='Informatika')? 'selected':''}}>Informatika</option>
                        <option value="Ilmu komputer"{{($mhs->prodi=='Ilmu Komputer')? 'selected':''}}>Ilmu Komputer</option>
                    </select>
                </div>

                <label>Minat</label>
                <div class="form-check">
                    <input type="checkbox" name="minat[]" class="form-check-input" value="AI" {{in_array('AI', $minat)? 'checked':''}}>
                    <label>Artificial Intelegent</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="minat[]" class="form-check-input" value="WEB" {{in_array('WEB', $minat)? 'checked':''}}>
                    <label>Web Engineer</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="minat[]" class="form-check-input" value="DBMS" {{in_array('DBMS', $minat)? 'checked':''}}>
                    <label>Database Engineer</label>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" role="button" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
</div>
@endsection
