<?php 

    function getInputConfig(){
        return json_decode(file_get_contents(__DIR__.'/InputConfig.json'), true);
    }
    
    $inputconfig = getInputConfig();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project X</title>
</head>
<style>
    input, button{
        display: block;
        margin: 15px;
    }
</style>
<body>
    <form method="post">
        <?php foreach($inputconfig as $inputs){ ?>
            <input type="<?php echo $inputs['type']?>" name="<?php echo $inputs['name']?>" placeholder="<?php echo $inputs['placeholder'] ?>" value="<?php echo isset($template[$inputs['name']]) ? $template[$inputs['name']] : ''; ?>">
            <label for=""><?php echo $inputs['label'] ?></label>
        <?php } ?>
        <button type="submit" name="submit">Submit</button>
    </form>
    <?php 
        if(isset($_POST['submit'])){

            $template = '<?php'.PHP_EOL;

            foreach($inputconfig as $inputs){
                $value = htmlspecialchars($_POST[$inputs['name']], ENT_QUOTES);
                $template .= '$template[\''.$inputs['name'].'\'] = \''.$value.'\';';
            }

            file_put_contents('output.php', $template);

            header('Location:index.php');
        }
    ?>
</body>
</html>