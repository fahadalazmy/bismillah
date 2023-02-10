@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('/transaksi/tambah') }}" class="float-right btn btn-sm btn-primary">Input Transaksi</a>

                        Data Transaksi
                    </div>

                    <div class="card-body">

                        @if(Session::has('sukses'))
                        <div class="alert alert-success">
                            {{ Session::get('sukses') }}
                        </div>
                        @endif

                        <table class="table table-boardered">
                            <thead>
                                <tr>
                                    <th class="text-center" rowspan="2" width="11%">Tanggal</th>
                                    <th class="tect-center" rowspan="2" widht="5%">Jenis</th>
                                    <th class="text-center" rowspan="2">Keterangan</th>
                                    <th class="text-center" rowspan="2">Kategori</th>
                                    <th class="text-center" rowspan="2">Transaksi</th>
                                    <th class="text-center" rowspan="2" widht="13%">OPSI</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Pemasukan</th>
                                    <th class="text-center">Pengeluaran</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($transaksi as $t)
                                <tr>
                                    <td class="text-center">{{ date('d-m-Y', strtotime($t->tanggal)) }}</td>
                                    <td class="text-center">{{ $t->jenis }}</td>
                                    <td class="text-center">{{ $t->keterangan }}</td>
                                    <td class="text-center">{{ $t->kategori->lategori }}</td>
                                    <td class="text-center">
                                        @if($t->jenis=="Pemasukan")
                                        {{ "RP.".number_format($t->nominal).",-" }}
                                        @else

                                        -
                                            
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/transaksi/edit/'.$t->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ url('/transaksi/hapus/'.$t->id) }}" class="btn btn-sm btn-danger">Hapus</a>
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