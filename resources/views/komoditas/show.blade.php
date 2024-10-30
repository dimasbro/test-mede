@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detail Komoditas') }}</div>

                <div class="card-body">
                    <form action="" method="POST">
                      <table>
                        <tr>
                            <td style="width: 100px">Kode</td>
                            <td>:</td>
                            <td>{{ $data->komoditas_kode }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $data->komoditas_nama }}</td>
                        </tr>
                      </table><br>
                      <a href="{{ route('komoditas.index') }}" class="btn btn-secondary">Back</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
