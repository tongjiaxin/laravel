@extends('Sy/admin-app')
@section("title","列表页面")
@section("content")

        <div class="pageheader">
            <h2><i class="fa fa-table"></i> Tables <span>Subtitle goes here...</span></h2>
            <div class="breadcrumb-wrapper">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li><a href="index.html">Bracket</a></li>
                    <li class="active">Tables</li>
                </ol>
            </div>
        </div>

        <div class="contentpanel">

            <div class="row">

                <div class="col-md-12">
                    <h5 class="subtitle mb5">Table With Actions</h5>
                    <p class="mb20">An example of table with actions in every rows.</p>
                    <div class="table-responsive">
                        <table class="table mb30">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="table-action">
                                    <a href=""><i class="fa fa-pencil"></i></a>
                                    <a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td class="table-action">
                                    <a href=""><i class="fa fa-pencil"></i></a>
                                    <a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td class="table-action">
                                    <a href=""><i class="fa fa-pencil"></i></a>
                                    <a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- table-responsive -->
                </div><!-- col-md-6 -->

            </div>
            <h5 class="subtitle mb5">Colored Tables</h5>
            <p class="mb20">An example of colored tables in the header</p>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-primary mb30">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- table-responsive -->
                </div>

                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-danger mb30">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- table-responsive -->
                </div>

            </div><!-- row -->

@endsection