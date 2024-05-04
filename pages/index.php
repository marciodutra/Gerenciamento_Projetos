<?php include '../includes/auth.php';
      include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<style>
    #page-wrapper {
    background-color: rgb(241, 241, 241) !important;
}
</style>
<body style="background-color:rgba(241, 241, 241, 0.9) !important">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href=""><b>Sistema de gerenciamento de projetos</b></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                <?php echo $_SESSION['NAME']?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                   
                    <li>
                         <a href="#manage_account" data-toggle="modal" ><i class="fa fa-fw fa-pencil"></i>Conta</a>
                    </li>
                   <li class="divider"></li>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php  include '../includes/sidebar.php'; ?>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


        <div id="page-wrapper">

            <div class="container-fluid">

<?php
error_reporting(E_ALL ^ E_NOTICE);

$page = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : 'home';
$pages = array('home','position','employee','employee_profile','division','project_list','project_detail','progress','update_progress','user_list','attendance','project_team');
if (!empty($page)) {
    if(in_array($page,$pages)) {
        $page .= '.php';
        include($page);
    }
    else {
        echo 'Page not found. Return
        <a href="index.php?page=home">home</a>';
    }
}

?>

            </div>
        </div>
        </div>

        <div id="manage_account" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Gerenciar conta
                     </h4> 
                     <div id="retCode10"></div>
                  </div> 
 <div class="modal-body">
  
    <div class="form-horizontal">

  <?php
    include '../includes/db.php';
   
      $query2=  mysqli_query($conn, "SELECT *,CONCAT(lastname,', ',firstname,' ',midname) as name,users.io as status FROM users natural join employee where uid = '".$_SESSION['UID']."' ");
       $row2 = mysqli_fetch_assoc($query2);  
    ?>
  <div id="retCode1"><div class="alert alert-success" id="msg20"><i class="fa fa-check"></i> Dados atualizados com sucesso. </div></div>
  <div id="retCode1"><div class="alert alert-danger" id="msg21"><i class="fa fa-check"></i> Senha é incorreta. </div></div>
    <form id="update_user_form2" method="POST">
    <div class="form-group">
    
       <input type="hidden"  value="<?php echo $row2['uid'] ?>" name="uid">

    </div>
    </div>
<br>
<br>
     <div class="form-group">
    <div class="col-sm-4 text-right"><label for="us">Usuário:</label></div>
    <div class="col-sm-8">
   <input type="text" class="form-control input-sm" id="us" value="<?php echo $row2['username'] ?>" name="user">
    </div>
    </div>
<br>
<br>
    <div class="form-group">
    <div class="col-sm-4 text-right"><label for="npass">Nova senha:</label></div>
    <div class="col-sm-8">
   <input type="password" class="form-control input-sm" id="npass" name="npass">
    </div>
    </div>
<br>
<br>
    <div class="form-group">
    <div class="col-sm-4 text-right"><label for="cpass">Senha atual:</label></div>
    <div class="col-sm-8">
   <input type="password" class="form-control input-sm" id="cpass"  name="current">
    </div>
    </div>
<br>



 
   </div>
          <div class="modal-footer">
               <button type="submit" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-save"></i> Salvar</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Fechar</button>
            </form>
                     </div>
                     </div> 
            </div>
          </div>
<div id="proj_list_report" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-sm">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Relatório de lista de projetos
                     </h4> 
                     <div id="retCode1"></div>
                  </div> 
                      
 <div class="modal-body">
  
  
   
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Status:</label>
          <div class="col-sm-8">
            <select class="form-control" style="text-transform:capitalize" id="stats" required>
            <option selected="" disabled=""></option>
            <option value="1">Projetos em andamento</option>
            <option value="2">Projetos Finalizados</option>
            <option value="3">Projetos cancelados
</option>
            </select>
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button onclick="rep_proj_list()" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-eye"></i> Visualizar</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Fechar</button>
           
                     </div>
                     </div> 
            </div>
          </div>

  <div id="proj_prog_report" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Relatório de progresso do projeto
                     </h4> 
                     <div id="retCode1"></div>
                  </div> 
                      
 <div class="modal-body">
  
  
   
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Projeto:</label>
          <div class="col-sm-8">
            <select class="form-control" style="text-transform:capitalize" id="pp" required>
            <option selected="" disabled=""></option>
           <?php
            $pp = mysqli_query($conn,"SELECT * FROM projects order by project ASC ");
            while($pp_row=mysqli_fetch_assoc($pp)){
            ?>
            <option value="<?php echo $pp_row['project_id'] ?>"><?php echo ucwords($pp_row['project']) ?></option>
            <?php } ?>
            </select>
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button onclick="rep_proj_prog()" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-eye"></i> Visualizar</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Fechar</button>
           
                     </div>
                     </div> 
            </div>
          </div>

  <div id="foreman_portfolio_report" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Registros de portfólio de funcionários
                     </h4> 
                     <div id="retCode1"></div>
                  </div> 
                      
 <div class="modal-body">
  
  
   
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Funcionário:</label>
          <div class="col-sm-8">
            <select class="form-control" style="text-transform:capitalize" id="reid" required>
            <option selected="" disabled=""></option>
           <?php
            $pp = mysqli_query($conn,"SELECT *,CONCAT(lastname,', ',firstname,' ',midname) as name FROM employee natural join position where position = 'foreman' ");
            while($pp_row=mysqli_fetch_assoc($pp)){
            ?>
            <option value="<?php echo $pp_row['eid'] ?>"><?php echo ucwords($pp_row['name']) ?></option>
            <?php } ?>
            </select>
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button onclick="rep_portfolio()" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-eye"></i> Visualizar</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Fechar</button>
           
                     </div>
                     </div> 
            </div>
          </div>
  <div id="attendance_report" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-md">  
             
                  <div class="modal-header"> 
                     <h4 class="modal-title" id='head'>
                     <i class=""></i> Relatório de presenças
                     </h4> 
                     <div id="retCode1"></div>
                  </div> 
                      
 <div class="modal-body">
  
  
   
    <div class="form-horizontal">
        
      <div class="form-group" id="form-login">
          <label class="col-sm-4 control-label">Selecione o mês:</label>
          <div class="col-sm-8">
            <input class="form-control" type="month" style="text-transform:capitalize" id="sm" required>
            
          </div>
        </div>

    </div>
   </div>
          <div class="modal-footer">
               <button onclick="rep_att()" class="btn btn-md btn-info" id="btn_sub"><i class="fa fa-eye"></i> Visualizar</button>
                <button data-dismiss="modal" class="btn btn-md btn-info"><i class="glyphicon glyphicon-close"></i>Fechar</button>
           
                     </div>
                     </div> 
            </div>
          </div>
</body>
<!--
<footer>
    <center>All rights reserved © 2018</center>
</footer>
-->
    <script src="assets/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
 <script>
    $(document).ready(function(){
      $('#msg20').hide();
      $('#msg21').hide();
    });
     jQuery("#update_user_form2").submit(function(e){
                e.preventDefault();
                var formData = jQuery(this).serialize();
                $.ajax({
                  type: "POST",
                  url: "../forms/update_forms.php?action=user2",
                  data: formData,
                  success: function(html){
                    $('#retCode10').append(html);
                  }
                });
                  return false;
            });
     function rep_portfolio(){
      var eid = $('#reid').val();
      window.open('printable_portfolio.php?id='+eid);
      $('#foreman_portfolio_report').modal('close');
     }
     function rep_proj_list(){
      var stats = $('#stats').val();
      window.open('printable_project_report.php?status='+stats);
      $('#proj_list_report').modal('close');
     }
     function rep_proj_prog(){
      var pp = $('#pp').val();
      window.open('printable_progress_report.php?id='+pp);
      $('#proj_list_report').modal('close');
     }
      function rep_att(){
      var sm = $('#sm').val();
      window.open('printable_attendance.php?d='+sm);
      $('#proj_list_report').modal('close');
     }
  </script>

</html>
