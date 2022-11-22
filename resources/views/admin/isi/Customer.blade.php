@extends('Master.Admin')
@section('title','Customer')
@section('customer')
<div class="col-md-10 p-5 pt-2 d" style="margin-top: 50px">
  <h3 class=""><i class="fa-solid fa-user"></i> Customer </h3>
  <hr>
  <div class="row mt-5 justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h1>Data Customer</h1>
            </div>
            <div class="card-body">
                <div class="row" >
                    <table class="table mt-4" id="myTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($hmm1 as $item)
                                <tr align="left">
                                    <td>{{ $item['Id'] }}</td>
                                    <td>{{ $item['Username'] }}</td>
                                    <td>{{ $item['Email'] }}</td>
                                    <td>{{ $item['Alamat'] }}</td>
                                    <td>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger" role="alert">
                                    Data tidak valid!
                                </div>
                             @endforelse
                        </tbody>
                    </table>
                </div>
               </div>
              </div>
             </div>
           </div>
        </div>
</div>
</div>

@endsection