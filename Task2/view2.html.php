
<?php session_start(); ?> <!-- Start or resume a session -->

<html>
<body>

    <!-- Form to search for a person by ID -->
    <form action="displayview.php" method="POST"> 
        <!-- The form submits data to "displayview.php" using the POST method -->

        <p>
            <!-- Label for person ID input -->
            <label for="personid">Enter the person ID you want to find</label>
            <input type="text" name="personid" id="personid" placeholder="Person ID" 
                autocomplete="off" required 
                value="<?php if (isset($_SESSION['personid'])) echo $_SESSION['personid']; ?>"/>
            <!-- `isset()` is correctly used to check if a session variable exists -->
            <!-- The value is prefilled with the session variable if available -->
        </p>

        <p>
            <!-- Label for first name -->
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" placeholder="First Name" 
                disabled value="<?php if (isset($_SESSION['firstname'])) echo $_SESSION['firstname']; ?>"/>
            <!-- `disabled` prevents the user from modifying the value -->
        </p>

        <p>
            <!-- Label for last name -->
            <label for="surname">Last Name</label>
            <input type="text" name="surname" id="surname" placeholder="Surname" 
                disabled value="<?php if (isset($_SESSION['lastname'])) echo $_SESSION['lastname']; ?>"/>
        </p>

        <p>
            <!-- Label for first name -->
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Email" 
                disabled value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?>"/>
            <!-- `disabled` prevents the user from modifying the value -->
        </p>

        <p>
            <!-- Label for first name -->
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" placeholder="Phone" 
                disabled value="<?php if (isset($_SESSION['phone'])) echo $_SESSION['phone']; ?>"/>
            <!-- `disabled` prevents the user from modifying the value -->
        </p>
        
        <p>
            <!-- Label for date of birth -->
            <label for="dob">Date of Birth</label>
            <input type="text" name="dob" id="dob" placeholder="Date of Birth" 
                disabled value="<?php if (isset($_SESSION['dob'])) echo $_SESSION['dob']; ?>"/>
        </p>

        <br><br>

        <!-- Submit button to send person ID for searching -->
        <input type="submit" value="Submit"/>

    </form> <!-- Correctly closed form tag -->

    <?php
    // Check if no first name is found but a person ID exists
    if (!isset($_SESSION['firstname']) && isset($_SESSION['personid'])) 
    {
        echo '<p style="color: red; text-align: center; font-size: 20px;">
            No record found for a person with ID ' . $_SESSION['personid'] . '
            <br> Please try again!
            </p>';

        // Remove the session variable for person ID since no record was found
        unset($_SESSION['personid']);
    }
    ?>

</body>
</html>
