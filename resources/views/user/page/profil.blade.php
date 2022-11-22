@extends('user.page.induk')
@section('title', 'Profil')
@section('content')
<section class="about_section layout_padding">
    <div class="container">
        <div class="row mt-4 mb-4 mx-auto justify-content-center">
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3" >
              <div class="card profil">
                  <div class="card-header header-profil">
                      <h3 class="panel-title">Profil</h3>
                  </div>
                  <div class="card-body text-white">
                      <table class="table table-user-information text-white">
                          <tbody>
  
                          <tr>
                              <td>Nama Lengkap</td>
                              <td>-----------</td>
                          </tr>
                          <tr>
                              <td>Tanggal Lahir</td>
                              <td>--/--/----</td>
                          </tr>
                      
                              <tr>
                                  <tr>
                              <td>Jenis Kelamin</td>
                              <td>-----</td>
                          </tr>
                              <tr>
                              <td>Alamat Lengkap</td>
                              <td>-------</td>
                          </tr>
                          <tr>
                              <td>Email</td>
                              <td><a href="mailto:info@support.com">customer@gmail.com</a></td>
                          </tr>
                              <td>No HP</td>
                              <td>555-4567-890(Mobile)</td>
                              
                          </tr>
                          </tbody>
                      </table>
                      <div class="panel-footer">
                          <span class="pull-right">
                              <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                          </span>
                      </div>
                  </div>
              </div>
          </div>
        </div>
  </div>
</section>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



@endsection