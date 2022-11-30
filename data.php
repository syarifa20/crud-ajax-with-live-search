                <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require 'dbcon.php';
                           
                            $s_course="";
                            $s_keyword="";
                            if (isset($_POST['course'])) {
                                $s_course = $_POST['course'];
                                $s_keyword = $_POST['keyword'];
                            }
                            
                            $search_course = '%'. $s_course .'%';
                            $search_keyword = '%'. $s_keyword .'%';
                            $no = 1;
                            $query = "SELECT * FROM students WHERE course LIKE ? AND (name LIKE ? OR email LIKE ? OR phone LIKE ? OR course LIKE ?) ORDER BY id DESC LIMIT 100";
                            $dewan1 = $con->prepare($query);
                            $dewan1->bind_param('sssss', $search_course, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
                            $dewan1->execute();
                            $res1 = $dewan1->get_result();
                            
                            if ($res1->num_rows > 0) {
                                while ($row = $res1->fetch_assoc()) {
                                    $id = $row['id'];
                                    $name= $row['name'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                    $course = $row['course'];
                                    
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $course; ?></td>
                                <td>
                                        <button type="button" value="<?= $id ?>" class="viewStudentBtn btn btn-warning">View</button>
                                        <button type="button" value="<?= $id ?>" class="editStudentBtn btn btn-success">Edit</button>
                                        <button type="button" value="<?= $id ?>" class="deleteStudentBtn btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        <?php } } else { ?> 
                            <tr>
                                <td colspan='7'>Tidak ada data ditemukan</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                   