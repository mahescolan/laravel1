<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/create" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="employee_name"></td>
                <td>address</td>
                <td><input type="text" name="employee_address"></td>
                <td>status</td>
                <td><input type="text" name="employee_status"></td>
                <td>dop</td>
                <td><input type="text" name="employee_dop"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="add employee"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>