 <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Manage</th>
              </tr>
            </thead>
            <tbody>
            <?php
    
                $sql = "SELECT * FROM posts WHERE auth_id=$user_id";
                $result = mysqli_query($conn, $sql);

                if($result){
                    while($row = mysqli_fetch_assoc($result)){

                        $id = $row['post_id'];
                        $title = $row['post_title'];
                        $content = substr($row['post_content'],0,100);
                        $content = strip_tags($content);
                        echo '
                        <tr>
                            <th scope="row">'.$id.'</th>
                            <th scope="row">'.$title.'</th>
                            <td>'.$content.'</td>
                            <td>
                                <button class="btn btn-primary me-3"><a href="edit.php?updt_id='.$id.'" class="text-light" style="text-decoration:none;">Edit</a></button >
                                <button class="btn btn-primary me-3"><a href="view_story.php?view_id='.$id.'" class="text-light" style="text-decoration:none;">View</a></button>
                                <button class="btn btn-danger"><a href="delete_story.php?del_id='.$id.'" class="text-light" style="text-decoration:none;">Delete</a></button>
                            </td>
                        </tr>';
                    }
                }
            
            ?> `
            </tbody>
          </table>