@extends('layouts.app')
@section('content')
                    <p>
                        <strong>Bordered</strong>
                           -
                        <small>table class="table table-bordered"</small>
                    </p>
                    <table class="table table-condensed" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>No HP</th>
                                <th>Foto</th>
                                <th>     
                                    <a href="#" class="create-modal btn btn-success btn-sm">
                                        <i class="glyphicon glyphicon-plus"></i> Tambah
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{ csrf_field() }}
                            <?php $no=1; ?>

                            @foreach ($mahasiswa as $key => $value)
                            <tr class="post{{$value->id}}">
                                <td>{{ $no++ }}</td>
                                <td>{{ $value->nim }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->jenis_kelamin }}</td>
                                <td>{{ $value->no_hp }}</td>
                                <td>{{ $value->foto }}</td>
                                <td>
                                    <a href="#" class="show-modal btn btn-info btn-md" data-id="{{$value->id}}" data-nim="{{$value->nim}}" data-nama="{{$value->nama}}" data-jenis_kelamin="{{$value->jenis_kelamin}}" data-no_hp="{{$value->no_hp}}" data-foto="{{$value->foto}}">
                                        <i class="icon-search"></i>
                                    </a>
                                    <a href="#" class="edit-modal btn btn-warning btn-md" data-id="{{$value->id}}" data-nim="{{$value->nim}}" data-nama="{{$value->nama}}" data-jenis_kelamin="{{$value->jenis_kelamin}}" data-no_hp="{{$value->no_hp}}" data-foto="{{$value->foto}}">
                                        <i class="icon-edit"></i>
                                    </a>
                                    <a href="#" class="delete-modal btn btn-danger btn-md" data-id="{{$value->id}}" data-nim="{{$value->nim}}" data-nama="{{$value->nama}}" data-jenis_kelamin="{{$value->jenis_kelamin}}" data-no_hp="{{$value->no_hp}}" data-foto="{{$value->foto}}">
                                        <i class="icon-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>






        {{-- Modal Form Create Post --}}
        <div id="create" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal row-fluid" role="form">
                            <div class="control-group">
                                <label class="control-label" for="basicinput">NIM</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Type something here..." required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basicinput">Nama</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Type something here..." required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basicinput">Jenis Kelamin</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Type something here..." required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basicinput">No_HP</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Type something here..." required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basicinput">Foto</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="foto" name="foto" placeholder="Type something here..." required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="submit" id="add" data-dismiss="modal">
                            <span class="glyphicon glyphicon-plus"></span>Save Post
                        </button>
                        <button class="btn btn-warning" type="button" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remobe"></span>Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Form Show POST --}}
        <div id="show" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="foto">Foto :</label>
                        <b id="i"/>
                    </div>
                </div>
                </div>
            </div>
        </div>

        {{-- Modal Form Edit and Delete Post --}}
        <div id="myModal"class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="modal">
                            <div class="control-group">
                                <label class="control-label" for="id">ID</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="f_id" disabled>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="nim">NIM</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="f_nim">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="nama">Nama</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="f_nama">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="f_jenis_kelamin">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="no_hp">No_HP</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="f_no_hp">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="foto">Foto</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="f_foto">
                                </div>
                            </div>
                        </form>

                        {{-- Form Delete Post --}}
                        <div class="deleteContent">
                          Are You sure want to delete <span class="nama"></span>?
                          <span class="hidden id"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn actionBtn" data-dismiss="modal">
                            <span id="footer_action_button" class="glyphicon"></span>
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class="glyphicon glyphicon"></span>close
                        </button>
                    </div>
                </div>
            </div>
        </div>
@endsection