@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Komoditas') }}</div>

                <div class="card-body">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ $message }}
                        </div>
                    @endif
                    <form action="{{ route('komoditas.store') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group">
                          <label>Kode</label>
                          <input type="text" class="form-control" placeholder="[AUTO]" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <a href="{{ route('komoditas.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
