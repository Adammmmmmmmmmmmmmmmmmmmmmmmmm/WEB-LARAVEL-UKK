@extends('layouts.main')
@section('title', 'Halaman Beranda')
@section('content')
<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-1 m-b-20"><strong>data table library book</strong></h3>
                    <div class="table-data__tool">
                        @auth
                            <button class="">
                                <a href="{{ route('login')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">add buku</a>
                            </button>
                        @else
                            <button class="" disabled></button>
                        @endauth

                        <form class="au-form-icon--sm" action="/cari" method="GET">
                            <input class="au-input--w300 au-input--style2" type="text" name="cari" placeholder="Search for buku" value="{{ old('cari')}}">
                            <button class="au-btn--submit2" type="submit" value="CARI">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align: center; vertical-align: middle;">Gambar</th>
                                        <th style="text-align: center; vertical-align: middle;">Judul</th>
                                        <th style="text-align: center; vertical-align: middle;">Pengarang</th>
                                        <th style="text-align: center; vertical-align: middle;">Penerbit</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cruds as $index => $crud)   
                                    <tr class="tr-shadow">
                                        <td style="text-align: center; vertical-align: middle;">{{ $index + 1 }}</td>
                                        <td style="text-align: center; vertical-align: middle;"><img src="{{asset('admin/images/buku/' . $crud->gambar)}}" width=200 alt=""></td>
                                        <td style="text-align: center; vertical-align: middle;">{{ $crud->judul }}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{ $crud->pengarang }}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{ $crud->penerbit}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            @auth
                                                @if (auth()->user()->role == 'admin')
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <a class="zmdi zmdi-edit" href="{{ route('cruds.edit', $crud->id)}}"></a>
                                                    </button>
                                                    <button href="#" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a class="zmdi zmdi-delete" href="{{ route('cruds.destroy', $crud->id)}}"></a>
                                                    </button>
                                                @else
                                                    <button href="#" class="item" data-toggle="tooltip" data-placement="top" title="Show">
                                                        <a class="zmdi zmdi-show" href="{{ route('cruds.show', $crud->id)}}"></a>
                                                    </button>
                                                @endif
                                            @endauth
                                        </div>
                                    </td>
                                    <tr class="spacer"></tr>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        {{ $cruds->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END DATA TABLE-->

    <!-- COPYRIGHT-->
    
    <!-- END COPYRIGHT-->
</div>
@endsection