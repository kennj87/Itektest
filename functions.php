<?php
require 'sql_pdo.php';

Function getQuestions($dbh){
    $sql = "SELECT q1,q2,q3,headline,ID FROM questions;";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach($result as $row) {
        echo "
        <div class='panel panel-default'>
           <div class='panel-heading' style='padding-bottom:0px;'><p class='pull-right'>Q".$row['ID']."</p> <h4>".$row['headline']."</h4></div>
            <div class='panel-body'>
            <div class='col-lg-12' style='padding-bottom:10px;'>
                    <div class='input-group'>
                      <span class='input-group-addon'>
                        <input type='radio' name='".$row['ID']."' value='1'>
                      </span>
                        <div class='well' style='margin-bottom: 0px;padding:0px;'>
                            <p style='margin: 7px;'>".$row['q1']."</p>
                        </div>
                  </div>
            </div>
            <div class='col-lg-12' style='padding-bottom:10px;'>
                    <div class='input-group'>
                      <span class='input-group-addon'>
                        <input type='radio' name='".$row['ID']."' Value='2'>
                      </span>
                        <div class='well' style='margin-bottom: 0px;padding:0px;'>
                            <p style='margin: 7px;'>".$row['q2']."</p>
                        </div>
                  </div>
            </div>
            <div class='col-lg-12' style='padding-bottom:10px;'>
                    <div class='input-group'>
                      <span class='input-group-addon'>
                        <input type='radio' name='".$row['ID']."' Value='3'>
                      </span>
                        <div class='well' style='margin-bottom: 0px;padding:0px;'>
                            <p style='margin: 7px;'>".$row['q3']."</p>
                        </div>
                  </div>
            </div>
         </div> 
    </div>";
    }
}
Function getResults($dbh,$username) {
    $sql = "SELECT sum,a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,q1,q2,q3,p1,p2,p3,headline,questions.ID FROM answers,questions WHERE answers.username='$username';";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $i = 1;
    foreach($result as $row) {
        $a = $row["a".$i];
        echo "
        <div class='panel panel-default'>
           <div class='panel-heading' style='padding-bottom:0px;'><p class='pull-right'>Q".$row['ID']."</p> <h4>".$row['headline']."</h4></div>
            <div class='panel-body'>
            <div class='col-lg-12' style='padding-bottom:10px;'>
                    <div class='input-group'>
                      <span class='input-group-addon'>
                        <input type='radio' name='".$row['ID']."' value='1' ".checkResult($row['p1'],$a).">
                      </span>
                        <div class='well' style='margin-bottom: 0px;padding:0px;".calcCorrect($row['p1'])."'>
                            <p style='margin: 7px;'>".$row['q1']."</p>
                        </div>
                  </div>
            </div>
            <div class='col-lg-12' style='padding-bottom:10px;'>
                    <div class='input-group'>
                      <span class='input-group-addon'>
                        <input type='radio' name='".$row['ID']."' Value='2' ".checkResult($row['p2'],$a).">
                      </span>
                        <div class='well' style='margin-bottom: 0px;padding:0px;".calcCorrect($row['p2'])."'>
                            <p style='margin: 7px;'>".$row['q2']."</p>
                        </div>
                  </div>
            </div>
            <div class='col-lg-12' style='padding-bottom:10px;'>
                    <div class='input-group'>
                      <span class='input-group-addon'>
                        <input type='radio' name='".$row['ID']."' Value='3' ".checkResult($row['p3'],$a).">
                      </span>
                        <div class='well' style='margin-bottom: 0px;padding:0px;".calcCorrect($row['p3'])."'>
                            <p style='margin: 7px;'>".$row['q3']."</p>
                        </div>
                  </div>
            </div>
         </div> 
    </div>";
        $i++;
    }
}

Function checkResult($p,$a) {
        if ($p == $a) {
            return "checked='checked'";
        }
}
Function calcCorrect($p) {
    if ($p == 10) {
        return "background-color:#52E770;";
    }
}
Function getTop($dbh,$u) {
    $sql = "SELECT sum FROM answers WHERE username='$u';";
    $stmt = $dbh->query($sql);
    $row = $stmt->fetchObject();
                echo "
                <div class='col-md-11 col-md-offset-1'>
                <div class='alert alert-info alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>You Scored:!</strong> $row->sum Out of 100.
                </div>
                </div>";
}
