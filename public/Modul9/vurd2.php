<!doctype html>
<html>
    <head>
        <title>[INSERT USERNAME]</title>
        <link rel="stylesheet" type="text/css" href="main-styles.css">
        <meta charset="utf-8">
    </head>
    <!-- Includes code for making the database connection -->
    <?php include('dbconnect.php'); ?>

    <body>
        <?php include('nav.php'); ?>

        <?php 

            ### all these could probably be done in one query, but for now it stays like this ###

            # create queries for fetching data from "neomambers"
            $sqlSelectMember = "SELECT * FROM neomembers WHERE ID = ?";

            # create queries for fatching data from inbetween tables
            // UNUSED $sqlSelectRoles = "SELECT * FROM neoRoleMember WHERE FKmember = ?";

            # create join query for fetching interests by Foreign Key
            $sqlSelectInterests = "SELECT * FROM neointerests INNER JOIN neoInterestMember ON 
                                            neointerests.ID = neoInterestMember.FKinterest 
                                        WHERE neoInterestMember.FKmember = ?";

            # create join query for fetching activities by Foreign Key
            $sqlSelectActivities = "SELECT * FROM neoactivities INNER JOIN neoActivityMember ON 
                                            neoactivities.ID = neoActivityMember.FKactivity 
                                        WHERE neoActivityMember.FKmember = ?";
            
            # create join query for fetching roles by Foreign Key
            $sqlSelectRoles = "SELECT * FROM neoroles INNER JOIN neoRoleMember ON 
                                            neoroles.ID = neoRoleMember.FKrole 
                                        WHERE neoRoleMember.FKmember = ?";


            # prepare queries
            $stmtSelectMember = $connection->prepare($sqlSelectMember);
            $stmtSelectRoles = $connection->prepare($sqlSelectRoles);
            $stmtSelectInterests = $connection->prepare($sqlSelectInterests);
            $stmtSelectActivities = $connection->prepare($sqlSelectActivities);

            # connect parametres witth sql query
            $stmtSelectMember->bind_param('i', $id); //isi -> integer, string, integer
            $stmtSelectRoles->bind_param('i', $id);
            $stmtSelectInterests->bind_param('i', $id);
            $stmtSelectActivities->bind_param('i', $id);

            # set paramatres
            $id = $_POST['id'];

            # execute queries
            $stmtSelectMember->execute();
            $memberResult = $stmtSelectMember->get_result();

            $stmtSelectRoles->execute();
            $roleResult = $stmtSelectRoles->get_result();

            $stmtSelectInterests->execute();
            $interestResult = $stmtSelectInterests->get_result();

            $stmtSelectActivities->execute();
            $activitiesResult = $stmtSelectActivities->get_result();

            # store results
            $member = $memberResult->fetch_assoc();
            $interests = $interestResult->fetch_assoc();
            $roles = $roleResult->fetch_assoc();
            $activities = $activitiesResult->fetch_assoc();

            # get profile image, set default if none exists
            if ($member['image'] != NULL) {
                $profileImg = $member['image'];
            } else $profileImg = "default.png";
        ?>

        <div id="wrapper">
            <div id="profile-img">
                <form action="uploadimg.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $member['ID']; ?>">
                    <input type ="submit" name="submit" value="upload image">
                </form>
                <img src="<?php echo "img/profile/" . $profileImg; ?> "alt="profile-image" style="width:180px">
            </div>
        
        <div class="mid-box">
            <table id="member_profile">
                <tr>
                    <th>Name</th>
                    <th>Date of Birth</th>
                </tr>
                <tr>
                    <td><?php echo $member['fname'] . " " . $member['lname']; ?></td>
                    <td><?php echo $member['dob']; ?> </td>
                </tr>
                <tr>
                    <th colspan="2">Gender</th>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $member['gender']; ?></td>
                </tr>
                <tr>
                    <th>Phone number</th>
                    <th>e-mail</th>
                </tr>
                <tr>
                    <td><?php echo $member['phone']; ?></td>
                    <td><?php echo $member['email']; ?></td>
                </tr>
                <tr>
                    <th colspan="2">Address</th>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $member['street'] . ", " . $member['zip'] . ", " . $member['area']; ?></td>
                </tr>
                <tr>
                    <th colspan="2">Interests</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php
                            $interestResult->data_seek(0); // starts at the beginning. Solved a problem where it omits the first result
                            # loops through and prints result
                            while($interests = $interestResult->fetch_assoc()) {
                                echo $interests['interest'] . "<br>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Activities</th>
                </tr>
                    <td colspan="2">
                        <?php
                            $activitiesResult->data_seek(0); // starts at the beginning. Solved a problem where it omits the first result
                            # loops through and prints result
                            while($activities = $activitiesResult->fetch_assoc()) {
                                echo  $activities['activity'] . "<br>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Roles</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php
                            $roleResult->data_seek(0); // starts at the beginning. Solved a problem where it omits the first result
                            # loops through and prints result
                            while($roles = $roleResult->fetch_assoc()) {
                                echo $roles['role'] . "<br>";
                            }
                        ?>
                    </td>
                <tr>
                    <th>Member since</th>
                    <th>Payment status</th>
                </tr>
                <tr>
                    <td><?php echo $member['joined']; ?></td>
                    <td>
                        <?php
                            if($member['paidstatus'] == 0) {
                                echo "not paid";
                            } else {
                                echo "paid";
                            }
                        ?>
                    </td>
            </table>
            <br />

            <?php
                # close staements
                $stmtSelectMember->close();
                $stmtSelectRoles->close();
                $stmtSelectInterests->close();
                $stmtSelectActivities->close();

                # close connections
                $connection->close(); 
            ?>

        </div>
        </div>
    </body>
</html>