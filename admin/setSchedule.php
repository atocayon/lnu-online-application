<div class="flex-row justify-center">
  <div class="schedule-container">
    <h1>Application Period Schedule</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lnu-online-application";
    $con = mysqli_connect($servername,$username,$password,$dbname);
    $date = date("Y-m-d");
    $query = $con->query("SELECT count(id) as count FROM application_period WHERE status = '1'");
    $result = $query->fetch_assoc();
    $count = $result['count'];
      if ($count === '0') {
        ?>
        <div class="flex-row justify-center">

          <div class="justify-center flex-column">
            <div class="">
              <label>School Year: </label>
              <input type="text" id="school_year">
              <label>Term: </label>
              <select id="term">
                <option value="">SELECT TERM</option>
                <option value="1">1st Sem</option>
                <option value="2">2nd Sem</option>
                <option value="3">Summer</option>
              </select>

            </div>

            <div class="">
              <label>Date Start: </label>
              <input type="date" id="date_start">
              <label>Date End: </label>
              <input type="date" id="date_end">
            </div>

            <div class="flex-row justify-center">
              <button type="button" name="button" id="btn-set-schedule">SET</button>
            </div>

          </div>
        </div>
        <?php
      }else{
        ?>
          <div class="flex-row justify-center">
            <div class="">
              Application period already started
              <br>
              <br>

            </div>
          </div>
        <?php
      }
    ?>


  </div>
</div>
