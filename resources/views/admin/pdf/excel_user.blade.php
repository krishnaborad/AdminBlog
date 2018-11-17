<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <table class="table table-bordered table-striped" id="datatable">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Gender</th>
                    <th>User Type</th>


                </tr>
            </thead>
            @foreach($user as $data)
            <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone_no }}</td>
                    <td>{{ ( $data->gender == 0 )? "male" : "female" }}</td>
                    <td>{{(isset( $data->users->name ))? $data->users->name : ""}}</td>

            </tr>
            @endforeach

            </tbody>
        </table>
    </body>
</html>
