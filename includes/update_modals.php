<?php include '../includes/db.php' ?>
<!-- Position Modal -->
<div id="pos<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> 
                     </h4> 
                     <div id="retCode"></div>
                  </div> 
                       <form method="POST" id='update_pos' > 
 <div class="modal-body">

   
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Posição</label>
          <div class="col-sm-8">
          <input name="id" value='<?php echo $id; ?>' type='hidden'>
            <input class="form-control" style="text-transform:capitalize" id="" name="pos" type="text" value="<?php echo $row['position'] ?>" required>
          </div>
        </div>

        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Diária</label>
          <div class="col-sm-8">

            <input class="form-control" style="text-align:right" id="" name="dr" type="number" value="<?php echo $row['daily_rate'] ?>" required>
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button type="submit" class="btn btn-info" id="btn_sub"><i class="fa fa-save"></i>Alterar</button>
                <button data-dismiss="modal" class="btn btn-info"><i class="glyphicon glyphicon-close"></i>Fechar</button>
            </form>
                     </div>
                     </div> 
            </div>
          </div>

       
<!-- change pic -->
<div id="change_pic" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i>Alterar imagem
                     </h4> 
                     <div id="retCode1"></div>
                  </div> 
                       <form method="POST" id='new_pic' action="../forms/update_forms.php?action=change_pic&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data"> 
 <div class="modal-body">
  
  <div class="col-md-12">
    <div class="alert alert-success" id="suc_msg"><h4><i class="fa fa-check"></i> Imagem atualizada com sucesso.</h4></div>
  </div>
   
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Subir arquivo:</label>
          <div class="col-sm-8">
          <input id="id" value='<?php echo $_GET['id']; ?>' type='hidden'>
            <input class="form-control" style="text-transform:capitalize" id="" name="file" type="file" required>
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button type="submit" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-save"></i> Salvar</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Fechar</button>
            </form>
                     </div>
                     </div> 
            </div>
          </div>

<!-- change Progress -->
<div id="progess<?php echo $row2['prog_id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Progresso da atualização
                     </h4> 
                     <div id="retCode1"></div>
                  </div> 
                       <form method="POST" id='new_pic' action="../forms/update_forms.php?action=progress" enctype="multipart/form-data"> 
 <div class="modal-body">
   
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Divisão:</label>
          <div class="col-sm-8">
          <input type="hidden" name="id" value="<?php echo $row2['prog_id'] ?>">
           <select name="div" id="div" class="form-control" required/>
          <option value="<?php echo $row2['pp_id'] ?>" selected="" ><?php echo ucwords($row2['division']) ?></option>
          <?php 
          $div= mysqli_query($conn,"SELECT * FROM project_partition natural join project_division where project_id = '$id' and pp_id != '".$row2['pp_id']."' order by division ");
          while($div_row = mysqli_fetch_assoc($div)){
          $test = mysqli_query($conn,"SELECT sum(progress) as prog FROM project_progress where pp_id = '".$div_row['pp_id']."' ");
          $test_row= mysqli_fetch_assoc($test);
          if(mysqli_num_rows($test) > 0){
            $prog = $test_row['prog'];
          }else{
            $prog = 0;
          }
          if($prog < 100 ){ ?>
            <option value="<?php echo $div_row['pp_id'] ?>"><?php echo ucwords($div_row['division']) ?></option>
          <?php }} ?>
        </select>
          </div>
        </div>
        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Progresso:</label>
          <div class="col-sm-8">
          <input id="id" value='<?php echo $_GET['id']; ?>' type='hidden'>
           <input type="text" class="form-control text-right" pattern="[0-9]{2}" onkeyup="validate_prog()" onkeydown="validate_prog()" name="prog" id="prog" required="" value="<?php echo $row2['progress'] ?>">
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button type="submit" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-save"></i> Salvar</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Fechar</button>
            </form>
                     </div>
                     </div> 
            </div>
          </div>

  <!-- change project pic -->
<div id="change_pic2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Alterar imagem
                     </h4> 
                     <div id="retCode1"></div>
                  </div> 
                       <form method="POST" id='new_pic' action="../forms/update_forms.php?action=change_pic2&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data"> 
 <div class="modal-body">
  
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">FILE:</label>
          <div class="col-sm-8">
          <input id="id" value='<?php echo $_GET['id']; ?>' type='hidden'>
            <input class="form-control" style="text-transform:capitalize" id="" name="file" type="file" required>
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button type="submit" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-save"></i> Salvar</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Fechar</button>
            </form>
                     </div>
                     </div> 
            </div>
          </div>
 <!-- Update Employee Modal -->
<div id="update_emp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Editar funcionário
                     </h4> 
                 
                  </div> 
                       <form method="POST" id='update_employee'  > 
 <div class="modal-body">
<?php
 $emp_query = mysqli_query($conn,"SELECT * from employee natural join position where eid = '".$_GET['id']."'");
 $emp_row = mysqli_fetch_assoc($emp_query);
 ?>
   
    <div class="form-horizontal">
        
        <div class="form-group" id="form-login">
            <div class="col-sm-12">
             <div id="retCode2">
               <div class="alert alert-success" id="suc_msg1">
               <h4><i class="fa fa-check"></i> Dados atualizados com sucesso.</h4>
             </div>
             <div class="alert alert-danger" id="err_msg1">
               <h4><i class="fa fa-times"></i> Falha ao adicionar dados.</h4>
             </div>
             </div>
             </div>
        </div>
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Sobrenome:</label>
          <div class="col-sm-8">
          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <input class="form-control" style="text-transform:capitalize" id="" name="lname" type="text" value="<?php echo $emp_row['lastname'] ?>"  required>
          </div>
        </div>
   
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Primeiro nome:</label>
          <div class="col-sm-8">
            <input class="form-control" style="text-transform:capitalize" id="" name="fname" type="text" value="<?php echo $emp_row['firstname'] ?>"  required>
          </div>
        </div> 

      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Nome do meio:</label>
          <div class="col-sm-8">
            <input class="form-control" style="text-transform:capitalize" id="" name="mname" type="text" value="<?php echo $emp_row['midname'] ?>" >
          </div>
        </div>

      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Aniversário:</label>
          <div class="col-sm-8">
            <input class="form-control"  id="" name="bday" type="date" value="<?php echo $emp_row['bday'] ?>"  required>
          </div>
        </div>

      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Gênero:</label>
          <div class="col-sm-4">
            <select class="form-control"  name="gender" type="text"  required>
            <option><?php echo $emp_row['gender'] ?></option>
            <?php
            if($emp_row['gender']=='Male'){
             ?>
             <option>Feminino</option>
            <?php }else{ ?>
            
            <option>Masculino</option>
            <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Endereço:</label>
          <div class="col-sm-8">
            <textarea class="form-control" rows="2"  id="" name="address" type="text"  required><?php echo $emp_row['address'] ?></textarea> 
          </div>
        </div>
        
        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Contato.:</label>
          <div class="col-sm-5">
            <input class="form-control text-right"  id="" value="<?php echo $emp_row['contact_no'] ?>" name="cn" type="text"   required>
          </div>
        </div>

        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Status:</label>
          <div class="col-sm-8">
            <select class="form-control"  id="" name="status" type="text"  required>
            <option><?php echo $emp_row['status'] ?></option>
            <option>Solteiro</option>
            <option>Casado</option>
            <option>Viúvo(a)</option>
            </select>
          </div>
        </div>

        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Posição:</label>
          <div class="col-sm-8">
            <select class="form-control"  style="text-transform:capitalize"  id="" name="position" type="text"  required>
            <option style="text-transform:capitalize" value="<?php echo $emp_row['pid'] ?>"><?php echo $emp_row['position'] ?></option>
            <?php
              $pos_query = mysqli_query($conn,"SELECT * FROM position where pid != '".$emp_row['pid']."' order by position ASC");
              while($pos_row = mysqli_fetch_assoc($pos_query)){
             ?>
            <option style="text-transform:capitalize" value="<?php echo $pos_row['pid'] ?>"><?php echo $pos_row['position'] ?></option>
            <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Status do perfil:</label>
          <div class="col-sm-8">
            <select class="form-control"  id="" name="ps" type="text"  required>
                <option value="<?php echo $emp_row['io'] ?>"> <?php if($emp_row['io'] == '1'){ echo 'Active';}else{ echo 'Inactive';} ?></option>
            <?php if($emp_row['io'] == '1'){ ?>
               <option value="2">Inativo</option>
            <?php  }else{ ?>
               <option value="1">Ativo</option>
                <?php } ?>
            </select>
          </div>
        </div>

       
    
    </div>
   </div>
          <div class="modal-footer">
               <button type="submit" class="btn btn-info btn-sm" id="btn_sub"><i class="fa fa-save"></i> Salvar</button>
                <button data-dismiss="modal" class="btn btn-info btn-sm"><i class="fa fa-close"></i> Fechar</button>
            </form>
                     </div>
                     </div> 
            </div>
          </div>



<!-- Update Project Modal -->
<div id="update_proj" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Editar projeto
                     </h4> 
                 
                  </div> 
                       <form method="POST" id='proj_form'> 
 <div class="modal-body">

   <?php
   $id=$_GET['id'];

   $query_proj = mysqli_query($conn,"SELECT *,CONCAT(lastname,', ',firstname,' ',midname) as name,projects.io as status from projects left join project_team on projects.tid = project_team.tid left join employee on project_team.eid = employee.eid  where project_id = '$id' ");
   $prow=mysqli_fetch_assoc($query_proj);
    ?>
    <div class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="form-group" id="form-login">
            <div class="col-sm-12">
             <div id="retCode2">
               <div class="alert alert-success" id="suc_msg2">
               <h4><i class="fa fa-check"></i> Dados atualizados com sucesso.</h4>
             </div>
             <div class="alert alert-danger" id="err_msg2">
               <h4><i class="fa fa-times"></i> Falha ao atualizar dados.</h4>
             </div>
             </div>
             </div>
        </div>
         <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Projeto proposto:</label>
          <div class="col-sm-8">
           <select type="text" class="form-control input-sm" style="text-transform:capitalize" autocomplete="off" name="p_type" id="p_type" onchange="div_field()" required/>
          <option id="p_typ" value="<?php echo $prow['proposed_project'] ?>" >
            <?php if($prow['proposed_project'] == '1'){
              echo 'Building';
              }elseif ($prow['proposed_project'] == '2') {
                echo 'House';
              }elseif ($prow['proposed_project'] == '3') {
                echo 'Highways';
              } ?>
          </option>
          <option value="1">Prédio</option>
          <option value="2">Casa</option>
          <option value="3">Rodovias</option>
          </select>
          </div>
        </div>
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Nome do projeto:</label>
          <div class="col-sm-8">
            <input class="form-control" style="text-transform:capitalize" id="" name="pname" type="text" value="<?php echo $prow['project'] ?>"  required>
          </div>
        </div>
   
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Localização:</label>
          <div class="col-sm-8">
            <textarea class="form-control" style="text-transform:capitalize" id="" name="location" type="text"   required><?php echo $prow['location'] ?></textarea>
          </div>
        </div> 

      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Custo:</label>
          <div class="col-sm-6">
            <input class="form-control" style="text-align:right" id="cc" name="cost" type="text" placeholder="Php." value="<?php echo $prow['overall_cost'] ?>">
          </div>
        </div>

      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Data de início:</label>
          <div class="col-sm-8">
            <input class="form-control"  id="" name="sdate" type="date"  value="<?php echo $prow['start_date'] ?>" required>
          </div>
        </div>

        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Prazo final:</label>
          <div class="col-sm-8">
            <input class="form-control"  id="" name="deadline" type="date"  value="<?php echo $prow['deadline'] ?>" required>
          </div>
        </div>

        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Funcionário:</label>
          <div class="col-sm-8">
            <select class="form-control"  id="" name="tid" type="text"  required>
            <option value="<?php echo $prow['tid'] ?>"> <?php echo $prow['name'] ?></option>
            <?php
            include '../includes/db.php';
              $pos_query = mysqli_query($conn,"SELECT *,Concat(lastname,', ',firstname,' ',midname) as name FROM project_team left join employee on project_team.eid = employee.eid where project_team.eid != '".$prow['eid']."' order by name ASC");
              while($pos_row = mysqli_fetch_assoc($pos_query)){
             ?>
            <option style="text-transform:capitalize" value="<?php echo $pos_row['tid'] ?>"><?php echo $pos_row['name'] ?></option>
            <?php } ?>
            </select>
          </div>
        </div>

          <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Status:</label>
          <div class="col-sm-8">
            <select class="form-control"  id="" name="stats" type="date" required>
            <option value="<?php echo $prow['status'] ?>">
              <?php 
    if($prow['status'] == '1'){
      echo 'On Going';
    }elseif($prow['status'] == '2'){
      echo 'Finished';
    }elseif($prow['status'] == '3'){
      echo 'Canceled';
    } 
     ?>
            </option>
            <?php if($prow['status'] != '1'){ ?><option value="1">Em andamento</option><?php } ?>
             <?php if($prow['status'] != '2'){ ?><option value="2">Finalizado</option><?php } ?>
             <?php if($prow['status'] != '3'){ ?><option value="3">Cancelado</option><?php } ?>
            </select>
          </div>
        </div>

        
            <div id="div-field"></div>
         

       
    
    </div>
   </div>
          <div class="modal-footer">
               <button type="submit" class="btn btn-info btn-sm" id="btn_sub"><i class="fa fa-save"></i> Salvar</button>
                <button data-dismiss="modal" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-close"></i>Fechar</button>
            </form>
                     </div>
                     </div> 
            </div>
          </div>


  <!-- change project pic -->
<div id="update_user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Editar usuário
                     </h4> 
                     <div id="retCode1"></div>
                  </div> 
                       <form method="POST" id='new_pic' action="../forms/update_forms.php?action=change_pic2&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data"> 
 <div class="modal-body">
  
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Funcionário:</label>
          <div class="col-sm-8">
          <input id="id" value='<?php echo $_GET['id']; ?>' type='hidden'>
            <select class=" chosen-select" style="text-transform:capitalize" id="" name="text"  required>
            </select>
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button type="submit" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-save"></i> Salvar</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Fechar</button>
            </form>
                     </div>
                     </div> 
            </div>
          </div>




  <script>
  jQuery(document).ready(function(){
    $('#suc_msg').hide();
    $('#suc_msg1').hide();
    $('#err_msg1').hide();
    $('#suc_msg2').hide();
    $('#err_msg2').hide();
            jQuery("#update_pos").submit(function(e){
                e.preventDefault();
                var formData = jQuery(this).serialize();
                $.ajax({
                  type: "POST",
                  url: "../forms/update_forms.php?action=position",
                  data: formData,
                  success: function(html){
                   $('#retCode').html(html);
                  var delay = 1500;
                    setTimeout(function(){  window.location = 'index.php?page=position';   }, delay);  
                  
                  }
                });
                  return false;
            });

            jQuery("#update_employee").submit(function(e){
                e.preventDefault();
                var formData = jQuery(this).serialize();
                $.ajax({
                  type: "POST",
                  url: "../forms/update_forms.php?action=employee",
                  data: formData,
                  success: function(html){
                   $('#retCode2').append(html);
                  
                  
                  }
                });
                  return false;
            });

            });
</script>
<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>