@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detail Produksi') }}</div>

                <div class="card-body">
                    <form action="#" method="POST">
                        <table>
                            <tr>
                                <td style="width: 100px">Tanggal</td>
                                <td>:</td>
                                <td>{{ $data->tanggal }}</td>
                            </tr>
                            <tr>
                                <td>Komoditas</td>
                                <td>:</td>
                                <td>{{ $data->komoditas->komoditas_nama }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td>{{ number_format($data->jumlah) }}</td>
                            </tr>
                          </table><br>
                        <a href="{{ route('produksi.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
