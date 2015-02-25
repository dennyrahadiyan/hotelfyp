    <?php 
    include 'core/init.php';

    protect_page();
    include 'includes/overall/header.php' ; 



    //if form is being submitted
    if(empty($_POST)=== false)
    {
        //to validate whether user enters smtg or not otherwise no point continue to do the next validation
        //create an array
        $required_fields = array ('user_id','fullname','contactno','passport','dor','dco');
        foreach($_POST as $key=>$value)
        {

            //if the key (value) in array of $required_fields is true which is empty
            if(empty($value) && in_array ($key, $required_fields) === true )
            {
                $errors[] = 'You must filled up all of the fields';
                //the validation can happen to more than 1 field
                break 1;
            }
        }

        if(empty($errors) === true)

        {
            if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $_POST['dor']))
            {
                ?>
                <script>alert('Input date of reservation correctly');</script>
                <?php
                exit();
            }

            else if (!preg_match('/^[a-z A-Z]{3,30}$/', $_POST['fullname'])) 
            {
                ?>
                <script>alert('Input your full name correctly');</script>
                <?php
                exit();
            }

            else if (!preg_match('/^[0-9]\d{9}$/', $_POST['contactno'])) 
            {

            ?>
            <script>alert('Enter Contactno correctly');</script>
            <?php
            exit();
            }

            else if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $_POST['dco']))
            {
                ?>
                <script>alert('Input your check-out date correctly');</script>
                <?php
                exit();
            }


            else if (strtotime($_POST['dor']) < time()) 
            {
                ?>
                <script>alert('Reservation date cannot in the past!!');</script>
                <?php
                exit();
            }

            else if (strtotime($_POST['dco']) < strtotime($_POST['dor'])) 
            {
                ?>
                <script>alert('Check-out date cannot before the reservation date!!');</script>
                <?php
                exit();
            }

        }
    }
    //what does this line does is that to check whether success is in the end of the URL
    if(isset($_GET['success']) && empty($_GET['success']))
    {

        view_reservation();

    }
    else
    {//if there are no errors
        if (empty($_POST) === false && empty($errors) === true)
        {
            check_availability();
        }

        //
        else if (empty($errors) === false)
        {
            echo output_errors($errors);
        }

    ?>
    <link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
    <script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

    <script type="text/javascript">
        window.onload = function(){
            new JsDatePick({
                useMode:2,
                target:"dor",
                dateFormat:"%Y-%m-%d"

            });

            new JsDatePick({
                useMode:2,
                target:"dco",
                dateFormat:"%Y-%m-%d"

            });
        };


    </script>



    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">RESERVATION </h1>

    <span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">

    <form action="" method="post" target="ifr">
    <fieldset>
    </span>
    <legend> 
    <span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif"><font size="6">Please input your information correctly</font> </span></legend>

    <p>
    <iframe name="ifr" id="ifr" style="display:none"></iframe>
    <form action="reservation.php?success" method="post" >
        <ul>
            <li>
                Full name*: <br>
                <input type="text" name="fullname">
            </li>
            <li>
                Contact No.: <br>
                <input type="text" name="contactno">
            </li>
            <li>
                IC/Passport*: <br>
                <input type="text" name="passport">
            </li>
            <li>
                Room Type*: <br>
                <select name="roomtype" id="roomtype">
                <option value="">Select</option>
                <option value="Single">Single (RM 100)</option>
                <option value="Superior">Superior (RM 200)</option>
                <option value="Deluxe">Deluxe (RM 300)</option>
              </select>
            </li>
                <br>
            <li>
                Date of reservation*: <br>
                <input type="text" size="12" id= "dor" name="dor"/>
            </li>
            <li>
                Check-out Date*: <br>
                <input type="text" size="12" id= "dco" name="dco"/>
            </li>

              <input type="submit" value="Submit">
            <input type="reset" value="Clear" >
            <li>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </ul>
    </form>

    <?php
    }
    include 'includes/overall/footer.php' ;
    ?>