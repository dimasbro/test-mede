@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Produksi') }}</div>

                <div class="card-body">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ $message }}
                        </div>
                    @endif
                    <form action="{{ route('produksi.update', $data->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label>Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') ?? $data->tanggal }}">
                            @error('tanggal')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Komoditas <span class="text-danger">*</span></label>
                            <select name="komoditas" class="form-control">
                                <option value="">- Select -</option>
                                @foreach ($komoditas as $row)
                                    <option value="{{ $row->id }}" {{ $row->id == old('komoditas') || $row->id == $data->komoditas_id ? 'selected' : '' }}>{{ $row->komoditas_kode.' - '.$row->komoditas_nama }}</option>
                                @endforeach
                            </select>
                            @error('komoditas')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jumlah <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jumlah" value="{{ old('jumlah') ?? $data->jumlah }}">
                            @error('jumlah')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <a href="{{ route('produksi.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
