@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Report Produksi Komoditas') }}</div>

                <div class="col-md-12 text-right" style="padding-top: 20px">
                    <form class="form-inline my-2 my-lg-0" method="get">
                        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search Komoditas" aria-label="Search" value="{{ request()->search }}">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Tahun</th>
                            <th scope="col">Komoditas</th>
                            <th scope="col">Jan</th>
                            <th scope="col">Feb</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Apr</th>
                            <th scope="col">Mei</th>
                            <th scope="col">Jun</th>
                            <th scope="col">Jul</th>
                            <th scope="col">Agus</th>
                            <th scope="col">Sep</th>
                            <th scope="col">Okt</th>
                            <th scope="col">Nov</th>
                            <th scope="col">Des</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $months)
                                @foreach ($months as $komoditas => $month)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>
                                        <a href="{{ route('komoditas.show', explode('=', $komoditas)[1]) }}">
                                            {{ explode('=', $komoditas)[0] }}
                                        </a>
                                    </td>
                                    @foreach ($month as $row)
                                        <td>{{ number_format($row) }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
