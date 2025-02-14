<?php session_start(); ?>
<html>
<body>
<form action="displayview.php" method="Post">
<p><label for="personid"> Enter the personod you want to find</label>
<input type="text" name="personid" id="personid" placeholder = "person id" autocomplete=off
required value="<?php if (ISSET($_SESSION('personid')) )echo $_SESSION('personid')?>"/>
</p>
<p><label for="firstname"> First name</label>
<input type="text" name="firstname" id="firstname" placeholder = "First name" disabled 
value="<?php if (ISSET($_SESSION('firstname')) )echo $_SESSION('firstname')?>"/>

</p>
<p><label for="surname"> Last Name</label>
<input type="text" name="surname" id="surname" placeholder = "Surname" disabled
 value="<?php if (ISSET($_SESSION('lastname')) )echo $_SESSION('lastname')?>"/>

</p>
<p><label for="dob"> Date of Birth</label>
<input type="text" name="dob" id="dob" placeholder = "Date of Birth" disabled
value="<?php if (ISSET($_SESSION('dob')) )echo $_SESSION('dob')?>"/>
</p>
<br> <br>

<input type="Submit" value = "Submit" />
<p>
</form>

<?php
if (!ISSET($_SESSION('firstname')) and ISSET($_SESSION('personid')))
    {
    echo '<p style="Color: red; text-align: center; font-size:20">
        No record found for a person with id..' . $_SESSION('personid') . '
        <br> Please try again!
        </p>';

    unset ($_SESSION('personid'));
    }

?>
</body>
</html>
