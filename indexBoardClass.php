<?php
  class boardClass {
    public function echoBoard($categoryIdx) {
      $boardSubject = mysqli_fetch_array(mq("SELECT * FROM LISTOFBOARD WHERE categoryIdx='$categoryIdx'"));
      $board = mq("SELECT * FROM BOARD WHERE categoryIdx='$categoryIdx' ORDER BY boardIdx desc LIMIT 5 ");
      if($board->num_rows > 0) :
      echo "<div class='boardX' style='height:300px;'>
        <h6>
        <a href='boardIdx.php?ci=$categoryIdx'>".$boardSubject['boardSubject']."</a></h6>
        <table style='border-top:1px solid black;width:500px' class='boardTable'>
          <thead>
            <th style='width:300px'></th>
            <th style='width:100px'></th>
            <th style='width:100px'></th>
          </thead>
          <tbody>";
          while($boardRow = mysqli_fetch_array($board)) :
            if(strlen($boardRow['boardTitle']) > 40) {
              $boardRow['boardTitle'] = iconv_substr($boardRow['boardTitle'],0,40)."...";
            }
            echo "<tr><td><a href='board.php?ci=".$categoryIdx."&bi=".$boardRow['boardIdx']."'>".$boardRow['boardTitle']."</a></td>
              <td>".substr($boardRow['boardDate'],0,10)."</td><td>".$boardRow['boardWriter']."</td></tr>";
            endwhile;
      echo "</tbody></table></div>";
    endif;
    }
  }
 ?>
