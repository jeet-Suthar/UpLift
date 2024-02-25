<?= $this->include('template/header') ?>
<body>

    <h1>Users database </h1>
    <div class="user-table">
        <table  class="table">
        <thead>
            <tr>
            <th scope="col">user_id</th>
            <th scope="col">first name</th>
            <th scope="col">last name</th>
            <th scope="col">email</th>
            <th scope="col">password</th>
            <th>profile url</th>
            <th>birth_date</th>
            <th>bio</th>
            <th>anonymous_username</th>
            <th>anonymous_profile_dp</th>
            <th>username</th>
            <th>last_login</th>
            <th>active</th>
            <th>gwall_public</th>
            <th>join_date</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if($users):
            foreach($users as $row): 
            ?>
            <tr>
                <th scope="col"><?php echo $row['user_id'] ?></th>
                <td><?php echo $row['fname'] ?></td>
                <td><?php echo $row['lname'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['user_password'] ?></td>
                <td><?php echo $row['profile_dp'] ?></td>
                <td><?php echo $row['birth_date'] ?></td>
                <td><?php echo $row['bio'] ?></td>
                <td><?php echo $row['anonymous_username'] ?></td>
                <td><?php echo $row['anonymous_profile_dp'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['last_login'] ?></td>
                <td><?php echo $row['active'] ?></td>
                <td><?php echo $row['gwall_public'] ?></td>
                <td><?php echo $row['join_date'] ?></td>
                
            <tr>
            <?php endforeach; endif;?>
        </tbody>
        </table>
    </div>
    
    

</body>
</html>