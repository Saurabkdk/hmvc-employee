<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php if(isset($list)) { ?>
    <a href="./index"><button>Add employee</button></a>
    <br>
    <div class="form-group" id="read">
        <table>
            <tbody>
                
                <tr>
                    <th>EMPLOYEE NAME</th>
                    <th>EMPLOYEE ID</th>
                    <th>EMPLOYEE EMAIL</th>
                    <th></th>
                    <th></th>
                </tr>
                
                <?php 
                foreach($list as $data) { ?>
                    <tr>
                        <td><?=$data->employename ?></td>
                        <td><?=$data->employeid ?></td>
                        <td><?=$data->employemail ?></td>
                        <td><a href="./showview?id=<?=$data->employeid ?>"><input type="button" name="UPDATE" value="Update" id="updateBtn" /></a></td>
                        <td><a href="./deleteview?id=<?=$data->employeid ?>"><input type="button" name="DELETE" value="Delete" id="deleteBtn" /></a></td>

                    </tr>
               <?php } ?>
            </tbody>
        </table>

        <br>

        <div>
            <p>Fetch from jquery</p>
        </div>

    </div>

    <br>
    <br>
    <?php echo $this->session->flashdata('message').'<br>'; ?>
    <?php } ?>

    <script>
        $(function(){
            $.get(window.location.pathname, function(data, status){
                val = JSON.parse(data);
                let table = '<table><tr>';
                table += '<th>EMPLOYEE NAME</th>';
                table += '<th>EMPLOYEE ID</th>';
                table += '<th>EMPLOYEE EMAIL</th>';
                table += '<th></th>';
                table += '<th></th></tr>';
                $.each(val, (key, employee) => {
                    table += `<tr><td>${employee.employename}</td>`;
                    table += `<td>${employee.employeid}</td>`;
                    table += `<td>${employee.employemail}</td>`;
                    table += `<td><a href="./showview?id=${employee.employeid}"><input type="button" name="UPDATE" value="Update" id="updateBtn" /></a></td>`;
                    table += `<td><a href="./deleteview?id=${employee.employeid}"><input type="button" name="DELETE" value="Delete" id="deleteBtn" /></a></td></tr>`;
                });
                table += '</table>';
                $('.form-group').append(table);
            });

        })
    </script>