<!-- New Employee Modal -->
<div id="new_employee" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Novo empregado
                     </h4> 
                 
                  </div> 
                       <form method="POST" id='emp_form'  > 
 <div class="modal-body">

   
    <div class="form-horizontal">
        
        <div class="form-group" id="form-login">
            <div class="col-sm-12">
             <div id="retCode2">
               <div class="alert alert-success" id="suc_msg">
               <h4><i class="fa fa-check"></i> Dados adicionados com sucesso.</h4>
             </div>
             <div class="alert alert-danger" id="err_msg">
               <h4><i class="fa fa-times"></i> Falha ao adicionar dados.</h4>
             </div>
             </div>
             </div>
        </div>
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Sobrenome:</label>
          <div class="col-sm-8">
            <input class="form-control" style="text-transform:capitalize" id="" name="lname" type="text"  required>
          </div>
        </div>
   
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Primeiro nome:</label>
          <div class="col-sm-8">
            <input class="form-control" style="text-transform:capitalize" id="" name="fname" type="text"  required>
          </div>
        </div> 

      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Nome do meio:</label>
          <div class="col-sm-8">
            <input class="form-control" style="text-transform:capitalize" id="" name="mname" type="text" >
          </div>
        </div>

      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Aniversário:</label>
          <div class="col-sm-8">
            <input class="form-control"  id="" name="bday" type="date"  required>
          </div>
        </div>

      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Gênero:</label>
          <div class="col-sm-4">
            <select class="form-control"  name="gender" type="text"  required>
            <option></option>
            <option>Feminino</option>
            <option>Masculino</option>
            </select>
          </div>
        </div>

        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Endereço:</label>
          <div class="col-sm-8">
            <textarea class="form-control" rows="2"  id="" name="address" type="text"  required></textarea> 
          </div>
        </div>
        
        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Contato.:</label>
          <div class="col-sm-5">
            <input class="form-control text-right"  id="" name="cn" type="text" maxlength="11"  required>
          </div>
        </div>

        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Status:</label>
          <div class="col-sm-8">
            <select class="form-control"  id="" name="status" type="text"  required>
            <option></option>
            <option>Solteiro</option>
            <option>Casado</option>
            <option>Viúva(o)</option>
            </select>
          </div>
        </div>

        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Posição:</label>
          <div class="col-sm-8">
            <select class="form-control"  id="" name="position" type="text"  required>
            <option></option>
            <?php
            include '../includes/db.php';
              $pos_query = mysqli_query($conn,"SELECT * FROM position order by position ASC");
              while($pos_row = mysqli_fetch_assoc($pos_query)){
             ?>
            <option style="text-transform:capitalize" value="<?php echo $pos_row['pid'] ?>"><?php echo $pos_row['position'] ?></option>
            <?php } ?>
            </select>
          </div>
        </div>

       
    
    </div>
   </div>
          <div class="modal-footer">
               <button type="submit" class="btn btn-info btn-sm" id="btn_sub">Salvar</button>
                <button data-dismiss="modal" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-close"></i>Fechar</button>
            </form>
                     </div>
                     </div> 
            </div>
          </div>

<!-- New Project Modal -->
<div id="new_project" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Novo projeto
                     </h4> 
                 
                  </div> 
                       <form method="POST" id='proj_form'  > 
 <div class="modal-body">

   
    <div class="form-horizontal">
        
        <div class="form-group" id="form-login">
            <div class="col-sm-12">
             <div id="retCode2">
               <div class="alert alert-success" id="suc_msg2">
               <h4><i class="fa fa-check"></i> Dados adicionados com sucesso.</h4>
             </div>
             <div class="alert alert-danger" id="err_msg2">
               <h4><i class="fa fa-times"></i> Falha ao adicionar dados.</h4>
             </div>
             </div>
             </div>
        </div>
         <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Projeto proposto:</label>
          <div class="col-sm-8">
           <select type="text" class="form-control input-sm" style="text-transform:capitalize" autocomplete="off" name="p_type" id="p_type" onchange="div_field()" required/>
          <option id="p_typ"></option>
          <option value="1">Prédio</option>
          <option value="2">Casa</option>
          <option value="3">Rodovias</option>
          <option value="4">Grande arquibancada</option>
          <option value="5">Área Coberta</option>
          </select>
          </div>
        </div>
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Nome do Projeto:</label>
          <div class="col-sm-8">
            <input class="form-control" style="text-transform:capitalize" id="" name="pname" type="text"  required>
          </div>
        </div>
   
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Localização:</label>
          <div class="col-sm-8">
            <textarea class="form-control" style="text-transform:capitalize" id="" name="location" type="text"  required></textarea>
          </div>
        </div> 

      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Custo:</label>
          <div class="col-sm-6">
            <input class="form-control" style="text-align:right" id="cc" name="cost" type="text" placeholder="Php.">
          </div>
        </div>

      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Data de início:</label>
          <div class="col-sm-8">
            <input class="form-control"  id="" name="sdate" type="date"  required>
          </div>
        </div>

         <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Prazo final:</label>
          <div class="col-sm-8">
            <input class="form-control"  id="" name="deadline" type="date"  required>
          </div>
        </div>

        <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Funcionário:</label>
          <div class="col-sm-8">
            <select class="form-control"  id="tid" name="tid" type="text" onchange="mem_list()"  required>
            <option></option>
            <?php
            include '../includes/db.php';
              $pos_query = mysqli_query($conn,"SELECT *,Concat(lastname,', ',firstname,' ',midname) as name FROM project_team left join employee on project_team.eid = employee.eid where pio='1' order by name ASC");
              while($pos_row = mysqli_fetch_assoc($pos_query)){
             ?>
            <option style="text-transform:capitalize" value="<?php echo $pos_row['tid'] ?>"><?php echo $pos_row['name'] ?></option>
            <?php } ?>
            </select>
          </div>
        </div>

        
            
            <div id="mem-field"></div>
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

<script>
  jQuery(document).ready(function(){
      $('#suc_msg2').hide();
      $('#err_msg2').hide();



});

  function div_field(){
    var id = $('#p_type').val();
    $.ajax({
                  url: "div_field.php?id="+id,
                  success: function(html){
                    $('#div-field').html(html);
                   
                  }
                });

  }
  function mem_list(){
    var id = $('#tid').val();
    $.ajax({
                  url: "mem_list.php?id="+id,
                  success: function(html){
                    $('#mem-field').html(html);
                   
                  }
                });

  }
  
</script>