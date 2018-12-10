<h1>Account Master List</h1>
<p>All user accounts of Paglaum can be found in this page.</p>
<hr>
<table id="dt_table" class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Account Type</th>
                <th>Username</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
</table>
<a href="?page=register" class="quarter-row button-primary">Add User</a>
<script type="text/javascript">
    $(document).ready(function(){
        $('#dt_table').DataTable({
            ajax: 'views/users/dt_userlist.php'
        });
    });
</script>