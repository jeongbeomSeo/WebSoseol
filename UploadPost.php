<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      textarea{
        width:300px;
        height:200px;
      }
    </style>
  </head>
  <body>
    <form action="UploadPost_ok.php"method="post">
      <table>
        <tbody>
          <tr>
            <th scope="row">
              <select name="BoardName">
                <?php
                  include "db.php";
                  echo "<select name='BoardName'>";
                  $sql1 = "SELECT * FROM LISTOFBOARD";
                  $stmt = mysqli_query($con,$sql1);
                  for($i=0;$i<$stmt->num_rows;$i++) {
                    $row = mysqli_fetch_array($stmt);
                    echo "<option value='$row[0]'>$row[0]</option>";
                  }
                  echo "</select>";
                 ?>
              </select>
            </th>
          </tr>
          <tr>
            <th scope="row">제목</th>
            <td><input type="text" name="Title"></td>
          </tr>
          <tr>
            <th scope="row">내용</th>
            <td><textarea name="Comment"></textarea></td>
          </tr>
          <tr>
            <td><input type="submit" value="저장"></td>
          </tr>
        </tbody>
      </table>
    </form>
  </body>
</html>
