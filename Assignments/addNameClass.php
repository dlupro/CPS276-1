<?php

require_once "AddNameClass.php";

if (count($_POST) > 0) {
    $Addname = new Nameform();
}
    if (isset($_POST['addName'])) {
        $result = $Addname->Set_Name($_POST['addName']);
    } elseif (isset($_POST['clearNames'])) {
        $Addname->Clear_Names();
        $result = "Names cleared.";
    }
    class Nameform {
        private $Names = array();
    
        public function Set_Name($names) {
            if (!empty($names)) {
                $nameList = explode(';', $names);
                foreach ($nameList as $name) {
                    list($fname, $lname) = explode(' ', trim($name), 2);
                    $formattedName = $lname . ", " . $fname;
                    $this->Names[] = $formattedName;
                }
    
                sort($this->Names);
                return implode("\n", $this->Names);
            } else {
                return "No names found.";
            }
        }
    
        public function Clear_Names() {
            $this->Names = array();
        }
    
        public function Get_Names() {
            return implode("\n", $this->Names);
        }
    }
    ?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Names</title>
    <style>
        h1 {
        font-size: 40px;
      }
</style>
</head>
<body>
<h1>Add Names</h1>
<form method="post" action="from.php">
    <button type="submit" name="addName" style="height:30px;font-size:14pt; background-color: blue; color: white;">Add Name</button>
    <button type="submit" name="clearNames" style="height:30px;font-size:14pt; background-color: blue; color: white;">Clear Names</button><br>
      
    <label for="names">Enter Name</label><br>
    <input type="text" id="fullName" style="width: 100%;" name="fullName"><Br>
    <label for="names">List Of Names</label>
</form>

<textarea style="height: 500px; width: 100%;" type="password" class="form-control" id="namelist" name="namelist"></textarea>
</body>
</html>