@extends('layouts.main');
@section('title','eMaha-Form Student')
@section('content')
    <div class="card mt-4">
        <div class="card-header"><strong> Form Data Student</strong></div>
        <div class="card-body">
            <Form action="/student/save" method="POST">
                @csrf 
                <div class="form-group">
                    <label>NIM</label>
                    <input type="number" name="nim" class="form-control" placeholder="nim">
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="nama">
                </div>
                <label>Gender</label>
                <div class="form-check">
                    <input type="radio" name="gender" class="form-check-input" value="pria">
                    <label>pria</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="gender" class="form-check-input" value="wanita">
                    <label>wanita</label>
                </div>

                <label>Program Studi</label>
                <div class="form-group">
                    <select name="prodi" class="form-control">
                        <option value="0">--Pilih Program Studi--</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Ilmu komputer">Ilmu Komputer</option>
                    </select>
                </div>

                <label>Minat</label>
                <div class="form-check">
                    <input type="checkbox" name="minat[]" c lass="form-check-input" value="AI">
                    <label>Artificial Intelegent</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="minat[]" class="form-check-input" value="WEB">
                    <label>Web Engineer</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="minat[]" class="form-check-input" value="DBMS">
                    <label>Database Engineer</label>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" role="button" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
</div>
@endsection
