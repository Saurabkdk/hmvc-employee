<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container">

    <?php echo validation_errors(); ?>

    <form action="<?=base_url()?>employe/saveEmployee?id=<?php if(isset($one)) echo $one->employeid ?>" method = 'POST'>
        <div class="row">
            <div class="col-md-4 form-group">
                <lable>Employe Name</lable>
                <input type="text" class="form-control" name="EMPLOYENAME" id="employename" value="<?php if(isset($one)) echo $one->employename ?>"/>
            </div>

            <div class="col-md-4 form-group">
                <lable>Employe ID</lable>
                <input type="text" class="form-control" name="EMPLOYEID" id="employeid" value="<?php if(isset($one)) echo $one->employeid ?>"/>
            </div>

            <div class="col-md-4 form-group">
                <lable>Employe Email</lable>
                <input type="text" class="form-control" name="EMPLOYEMAIL" id="employemail" value="<?php if(isset($one)) echo $one->employemail ?>"/>
            </div>


            <?php if(isset($one)) {?>
                <input type="submit" value="Update" id="createBtn" />
                <a href="./showview"><input type="button" value="Cancel" id="cancelBtn" /></a>
            <?php } else { ?>
                <input type="submit" value="Create" id="createBtn" />
            <?php } ?>

        </div>
    </form>

    <br>
    <a href="./showview"><button>Employee list</button></a>

</div>

</div>


<script>
$(function() {
    
});

$('#createBtn').click(() => {
    var EMPLOYENAME = $('#employename').val();
    var EMPLOYEID = $('#employeid').val();
    var EMPLOYEMAIL = $('#employemail').val();

    $_GET = <?php echo json_encode($_GET); ?>;

    var id = Number.parseInt($_GET['id']);

    if(id > 0){
       var url = `<?=base_url()."employe/saveEmployee?id=" ?>${id}`;
    }
    else{
        var url = "<?=base_url()."employe/saveEmployee" ?>";
    }

    $.post(url, {
        EMPLOYENAME,
        EMPLOYEID,
        EMPLOYEMAIL
    },
    function(checkdata){

        checkdata = JSON.parse(checkdata);

        if (checkdata.jsonCheck){
            alert(checkdata.message);
        }
        else{
            console.log(checkdata.message);
        }
    }
    );

});

</script>