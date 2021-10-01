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
    input{
        display: block;
        margin: 15px;
    }
</style>
<body>
    <form>
        <?php foreach($inputconfig as $inputs){ ?>
            <input type="<?php echo $inputs['type']?>" placeholder="<?php echo $inputs['placeholder'] ?>" value="<?php echo $inputs['value'] ?>">
        <?php } ?>
    </form>
</body>
</html>