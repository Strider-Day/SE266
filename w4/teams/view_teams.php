<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>NFL Teams</title>
</head>
<body>
    



    <div class="container">
                
     <div class="col-sm-12">
        <h1>NFL Teams</h1>
       
        <a href="add_team.php">Add New Team</a>

   
    <?php
        
        include __DIR__ . '/model/model_teams.php';
        include __DIR__ . '/functions.php';
        
        if(isset($_POST['deleteTeam'])){
            $id = filter_input(INPUT_POST, 'teamId');
            deleteTeam($id);
        }

        $teams = getTeams ();
        
        
    ?>
  
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Team Name</th>
                    <th>Division</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
           
            
            <?php foreach ($teams as $t):                 
            ?>
                <tr>
                    <td>
                        <!-- FORM FOR DELETE FUNCTIONALITY -->
                        <form action='view_teams.php' method='post'>
                            <input type="hidden" name="teamId" value="<?= $t['id'];?>"/>
                            <input class="" type="submit" name="deleteTeam" value="Delete" />
                            <?= $t['id']; ?>
                        </form>
                    </td>
                    <td><?= $t['teamName']; ?></td>
                    <td><?= $t['division']; ?></td> 
                    <!-- LINK FOR UPDATE FUNCTIONALITY -> Look at how we are passing in our ID using PHP! -->
                    <td><a href="edit_team.php?action=Update&teamId=<?= $t['id']; ?>">Edit</a></td>        
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
        <br />
        <a href="edit_team.php?action=Add">Add New Team</a>
    </div>
    </div>
</body>
</html>
