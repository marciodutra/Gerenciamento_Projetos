
<div class="col-md-12">
	<h4>Lista de Projetos</h4>

<hr style="border-bottom:1px solid black"></hr>
</div>

<div class="col-lg-12">
<div class="col-md-11 col-md-offset-10">
	
	<a class="col-sm-2 btn btn-md btn-info" href="#new_project" data-toggle="modal"><center><i class="fa fa-plus"></i> Novo projeto</center></a>
	
</div>
<br>
<br>

	<div class="panel panel-default">
        <div class="panel-heading">
          <?php if($_GET['io'] == '1'){ $btn_class1 = 'class="btn btn-md btn-success"';} else{ $btn_class1 = 'class="btn btn-md btn-default"';} ?>
        <?php if($_GET['io'] == '2'){ $btn_class = 'class="btn btn-md btn-success"';} else{ $btn_class = 'class="btn btn-md btn-default"';} ?>
        <?php if($_GET['io'] == '3'){ $btn_class2 = 'class="btn btn-md btn-success"';} else{ $btn_class2 = 'class="btn btn-md btn-default"';} ?>
          <a href="index.php?page=project_list&io=1" <?php echo $btn_class1 ?> > Em andamento</a>
          <a href="index.php?page=project_list&io=2" <?php echo $btn_class ?> > Finalizado</a>
          <a href="index.php?page=project_list&io=3" <?php echo $btn_class2 ?> > Cancelado</a>
        </div> 
        <div class="panel-body"> 
			
       <table id="position" class="table table-bordered table-condensed">
    <thead>
      <tr id="heads">
        <th class="col-md-2 text-center">Projeto</th>
        <th class="col-md-2 text-center">Localização</th>
        <th class="col-md-1 text-center">Prazo final</th>
        <th class="col-md-1 text-center"></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include '../includes/db.php';
   
      $query=  mysqli_query($conn, "SELECT * FROM projects where io = '".$_GET['io']."'");
        ;
         while($row = mysqli_fetch_assoc($query)) {   
         $id =$row['project_id']; 
      

    ?>
      <tr>

        <td style="text-transform:capitalize" class="text-center"><?php echo $row['project'] ?></td>
        <td style="text-transform:capitalize" class="text-center"><?php echo $row['location'] ?></td>
        <td style="text-transform:capitalize" class="text-center"><?php echo date("M. d, Y",strtotime($row['deadline'])) ?></td>
        <td style="text-transform:capitalize" class="text-center"><center><a href="index.php?page=project_detail&id=<?php echo $id ?>&stats=<?php echo $_GET['io'] ?>"><i class="fa fa-eye"></i> Visualizar </a></center></td>
       </tr>
       
      <?php } ?>
    </tbody>
  </table>
		</div>
	</div>
</div>
<?php include '../includes/add_modal.php' ?>

<div id="retCode1"></div>
<script>
	jQuery(document).ready(function(){
						jQuery("#proj_form").submit(function(e){
								e.preventDefault();
								var formData = jQuery(this).serialize();
								
								$.ajax({
									type: "POST",
									url: "../forms/add_forms.php?action=project",
									data: formData,
									success: function(html){
										$('#retCode1').html(html);
									 
									}
								});
									return false;
						});
						});
</script>



<script type="text/javascript">
        $(function() {
            $("#position").dataTable(
        { "aaSorting": [[ 2, "desc" ]] }
      );
        });
    </script>