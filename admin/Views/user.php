<section>
    <div class="container">
        <div class="col3">
            <h2>Thêm Mới</h2>
            <form>
                <input type="text" placeholder="UserName">
                <input type="text" placeholder="Name">
                <input type="text" placeholder="Address">
                <input type="text" placeholder="Email">
                <input type="text" placeholder="Phone">
                <input type="text" placeholder="Role">
                <input type="submit" value="Thêm">
            </form>
        </div>
        <div class="col9">
            <h2>Danh Sách User</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Thao tác</th> <!-- Thêm cột mới -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = $data['users'];
                    $iduser = 1;
                    foreach ($users as $item) {
                        extract($item);
                        echo '
                            <tr>
                                <td>' . $iduser++ . '</td>
                                <td>' . $username . '</td>
                                <td>' . $name . '</td>
                                <td>' . $address . '</td>
                                <td>' . $email . '</td>
                                <td>' . $phone . '</td>
                                <td class="action-icons">
                                    <a href="#"><i class="fas fa-edit"></i></a>
                                    <a href="#"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        ';
                    }

                    ?>

                </tbody>
            </table>
        </div>
    </div>
</section>