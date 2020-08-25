<?php 
 require '../con_f/db/db.php';
?>
<div class="">
  <table id="tbl-userManagement">
    <thead>
      <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Role</th>
        <th>Office</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        
        $select = $con->query("SELECT * FROM admin_accounts ORDER BY id ASC");
        while ($row = mysqli_fetch_array($select)) {
          ?>
            <tr>
              <td>
                <span id="<?= $row['id'] ?>_uname"><?= $row['uname'] ?></span>
                <input type="text" id="<?= $row['id'] ?>_inputUname" value="<?= $row['uname'] ?>" style="display:none;">

              </td>
              <td>
                <input type="password" name="" value="<?= $row['pword'] ?>" id="<?= $row['id'] ?>_inputPword" disabled>
              </td>
              <td>
                <span id="<?= $row['id'] ?>_role"><?= $row['role'] ?></span>
                <input type="text" id="<?= $row['id'] ?>_inputRole" value="<?= $row['role'] ?>" style="display:none;">
              </td>
              <td>
                <span id="<?= $row['id'] ?>_office"><?= $row['office'] ?></span>
                <select class="form-input" name="returnee-specify-course" id="<?= $row['id'] ?>_inputOffice" style="display:none;">
                    <option value="<?= $row['office'] ?>"><?= $row['office'] ?></option>
                    <?php
                      $query_course = $con->query("SELECT * FROM office");
                      while($row1 = mysqli_fetch_array($query_course)){
                        ?>
                          <option value="<?= $row1['id'] ?>"><?= $row1['course'] ?></option>
                        <?php
                      }
                    ?>
                </select>

              </td>
              <td>
                <button type="button" name="button" value="<?= $row['id'] ?>" id="<?= $row['id'] ?>_editUser" class="editUser">Edit</button>
                <button type="button" name="button" value="<?= $row['id'] ?>" id="<?= $row['id'] ?>_deleteUser" class="deleteUser" onclick="return confirm('This action cannot be undone!')">Delete</button>
                <button type="button" name="button" value="<?= $row['id'] ?>" id="<?= $row['id'] ?>_saveUser" class="saveUser" style="display:none;">Save</button>
                <button type="button" name="button" value="<?= $row['id'] ?>" id="<?= $row['id'] ?>_cancelUser" class="cancelUser" style="display:none;">Cancel</button>
              </td>
            </tr>
          <?php
        }

      ?>
      <tr>
        <td>
          <input type="text" id="admin_uname">
        </td>
        <td>
          <input type="password" id="admin_pword">
        </td>
        <td>
          <select id="admin_role">
            <option value="">-- select role --</option>
            <option value="admin">Admin</option>
            <option value="interviewer">Interviewer</option>
          </select>
        </td>
        <td>
          <select class="form-input"  id="office">
              <option value="">-- select office --</option>
              <?php

                while($row2 = mysqli_fetch_array($query_course)){
                  ?>
                    <option value="<?= $row2['id'] ?>"><?= $row2['course'] ?></option>
                  <?php
                }
              ?>
          </select>
        </td>
        <td>
          <button type="button" id="btn-addNewUser">Add</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
