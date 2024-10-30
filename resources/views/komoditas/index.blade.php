@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Daftar Komoditas') }}</div>

                <div class="col-md-12 text-right" style="padding-top: 20px">
                    <a href="{{ route('komoditas.create') }}" class="btn btn-primary btn-sm">Create</a>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ $message }}
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ $message }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Control</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                                <tr>
                                    <td>{{ $dt->komoditas_kode }}</td>
                                    <td>{{ $dt->komoditas_nama }}</td>
                                    <td>
                                        <a href="{{ route('komoditas.show', $dt->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                                        <a href="{{ route('komoditas.edit', $dt->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('komoditas.destroy', $dt->id) }}" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure delete {{ $dt->komoditas_nama }}?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
