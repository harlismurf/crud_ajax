<!DOCTYPE html>
<html lang="en">
    @extends('partials._head')

    <body>
        <div class="navbar navbar-fixed-top">
            {{-- @extends('partials._navbar') --}}
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="{{ route('mahasiswa.index') }}">Edmin </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Item No. 1</a></li>
                                    <li><a href="#">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="#">A Separated link</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Support </a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('assets/images/user.png') }}" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Your Profile</a></li>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="/table"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="activity.html"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
                                </li>
                                <li><a href="message.html"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
                                    11</b> </a></li>
                                <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Tasks <b class="label orange pull-right">
                                    19</b> </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3>Tabel Mahasiswa</h3>
                                </div>
                                <div class="module-body">
                                    @section('content')
                                        
                                    @show
                                </div>
                            </div>
                        <!--/.content-->
                        </div>
                    <!--/.span9-->
                    </div>

                </div>
            <!--/.container-->
            </div>
        </div>
        <!--/.wrapper-->
        @extends('partials._footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

{{-- ajax form add --}}
<script type="text/javascript">
    $(document).on('click','.create-modal', function() {
        $('#myModal').hide();
        $('.modal-title').text('Add Mahasiswa');
        $('.form-horizontal').show();
        $('#create').modal('show');
    });

    $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addMahasiswa',
      data: {
        '_token': $('input[name=_token]').val(),
        'nim': $('input[name=nim]').val(),
        'nama': $('input[name=nama]').val(),
        'jenis_kelamin': $('input[name=jenis_kelamin]').val(),
        'no_hp': $('input[name=no_hp]').val(),
        'foto': $('input[name=foto]').val()
      },
      success: function(data){
        if ((data.errors)) {
            $('.error').removeClass('hidden');
            $('.error').text(data.errors.nim);
            $('.error').text(data.errors.nama);
            $('.error').text(data.errors.jenis_kelamin);
            $('.error').text(data.errors.no_hp);
            $('.error').text(data.errors.foto);
        } else {
            
            $('.error').remove();
            $('#table').append(
              "<tr class='post" + data.id + "'>"+
                  "<td>" + data.id + "</td>"+
                  "<td>" + data.nim + "</td>"+
                  "<td>" + data.nama + "</td>"+
                  "<td>" + data.jenis_kelamin + "</td>"+
                  "<td>" + data.no_hp + "</td>"+
                  "<td>" + data.foto + "</td>"+
                  "<td>" + 
                      "<a class='show-modal btn btn-info btn-md' data-id='" + data.id + "'data-nim='" + data.nim + "'data-nama='" + data.nama + "'data-jenis_kelamin='" + data.jenis_kelamin + "'data-no_hp='" + data.no_hp + "'data-foto='" + data.foto + "'>" +
                      "<i class='icon-search'></i></a>"+
                      "<a class='edit-modal btn btn-warning btn-md' data-id='" + data.id + "'data-nim='" + data.nim + "'data-nama='" + data.nama + "'data-jenis_kelamin='" + data.jenis_kelamin + "'data-no_hp='" + data.no_hp + "'data-foto='" + data.foto + "'>" +
                      "<i class='icon-edit'></i></a> "+
                      "<a class='delete-modal btn btn-danger btn-md' data-id='" + data.id + "'data-nim='" + data.nim + "'data-nama='" + data.nama + "'data-jenis_kelamin='" + data.jenis_kelamin + "'data-no_hp='" + data.no_hp + "'data-foto='" + data.foto + "'>" +
                      "<i class='icon-trash'></i></a>"+
                  "</td>"+
              "</tr>"
            );
        }
      },
    });
        $('#nim').val('');
        $('#nama').val('');
        $('#jenis_kelamin').val('');
        $('#no_hp').val('');
        $('#foto').val('');
    });

    // Show function
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#i').text($(this).data('foto'));
        // $('#ti').text($(this).data('title'));
        // $('#by').text($(this).data('body'));
        $('.modal-title').text('Show Post');
    });

    // function Edit POST
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update Post");
        $('#footer_action_button').addClass('icon-check');
        $('#footer_action_button').removeClass('icon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Mahasiswa Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#f_id').val($(this).data('id'));
        $('#f_nim').val($(this).data('nim'));
        $('#f_nama').val($(this).data('nama'));
        $('#f_jenis_kelamin').val($(this).data('jenis_kelamin'));
        $('#f_no_hp').val($(this).data('no_hp'));
        $('#f_foto').val($(this).data('foto'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'POST',
            url: 'editMahasiswa',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#f_id").val(),
                'nim': $("#f_nim").val(),
                'nama': $("#f_nama").val(),
                'jenis_kelamin': $('#f_jenis_kelamin').val(),
                'no_hp': $('#f_no_hp').val(),
                'foto': $('#f_foto').val(),
            },

            success: function(data) {
                    $('.post' + data.id).replaceWith(" "+
                    "<tr class='post" + data.id + "'>"+
                        "<td>" + data.id + "</td>"+
                        "<td>" + data.nim + "</td>"+
                        "<td>" + data.nama + "</td>"+
                        "<td>" + data.jenis_kelamin + "</td>"+
                        "<td>" + data.no_hp + "</td>"+
                        "<td>" + data.foto + "</td>"+
                        "<th>" + 
                            "<a class='show-modal btn btn-info btn-md' data-id='" + data.id + "'data-nim='" + data.nim + "'data-nama='" + data.nama + "'data-jenis_kelamin='" + data.jenis_kelamin + "'data-no_hp='" + data.no_hp + "'data-foto='" + data.foto + "'>" +
                            "<i class='icon-search'></i></a>"+
                            "<a class='edit-modal btn btn-warning btn-md' data-id='" + data.id + "'data-nim='" + data.nim + "'data-nama='" + data.nama + "'data-jenis_kelamin='" + data.jenis_kelamin + "'data-no_hp='" + data.no_hp + "'data-foto='" + data.foto + "'>" +
                            "<i class='icon-edit'></i></a> "+
                            "<a class='delete-modal btn btn-danger btn-md' data-id='" + data.id + "'data-nim='" + data.nim + "'data-nama='" + data.nama + "'data-jenis_kelamin='" + data.jenis_kelamin + "'data-no_hp='" + data.no_hp + "'data-foto='" + data.foto + "'>" +
                            "<i class='icon-trash'></i></a>"+
                        "</th>"+
                    "</tr>"
                    );
            }
        });
    });

    // form Delete function
        $(document).on('click', '.delete-modal', function() {
            $('#footer_action_button').text(" Delete");
            $('#footer_action_button').removeClass('glyphicon-check');
            $('#footer_action_button').addClass('glyphicon-trash');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('delete');
            $('.modal-title').text('Delete Mahasiswa');
            $('.id').text($(this).data('id'));
            $('.deleteContent').show();
            $('.form-horizontal').hide();
            $('#myModal').modal('show');
        });

        $('.modal-footer').on('click', '.delete', function(){
            $.ajax({
                type: 'POST',
                url: 'deleteMahasiswa',
                data: {
                  '_token': $('input[name=_token]').val(),
                  'id': $('.id').text()
                },
                success: function(data){
                   $('.post' + $('.id').text()).remove();
                },
        });
    });

</script>

    </body>