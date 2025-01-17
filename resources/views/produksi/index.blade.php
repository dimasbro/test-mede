@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Produksi Komoditas') }}</div>

                <div class="col-md-12 text-right" style="padding-top: 20px">
                    <a href="{{ route('produksi.create') }}" class="btn btn-primary btn-sm">Create</a>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ $message }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Komoditas</th>
                            <th scope="col">Produksi (Ton)</th>
                            <th scope="col">Control</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                            @php
                                $tanggal = date('d-m-Y', strtotime($dt->tanggal));
                            @endphp
                                <tr>
                                    <td>{{ $tanggal }}</td>
                                    <td>
                                        <a href="{{ route('komoditas.show', $dt->komoditas_id) }}">
                                            {{ $dt->komoditas_nama }}
                                        </a>
                                    </td>
                                    <td>{{ number_format($dt->jumlah) }}</td>
                                    <td>
                                        <a href="{{ route('produksi.show', $dt->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                                        <a href="{{ route('produksi.edit', $dt->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('produksi.destroy', $dt->id) }}" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure delete {{ $dt->komoditas_nama.' ('.$tanggal.')' }}?')">Delete</a>
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
