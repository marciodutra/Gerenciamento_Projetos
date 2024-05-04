        <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php?page=home"><i class="fa fa-fw fa-dashboard"></i> Painel</a>
                    </li>
                   
                    <li class=''>
                        <a href="index.php?page=employee&io=1"><i class="fa fa-fw fa-users"></i> Lista de empregados</a>
                    </li>
                    <li>
                        <a href="index.php?page=project_list&io=1"><i class="fa fa-fw fa-files-o"></i> Lista de Projetos</a>
                    </li>
                <?php if($_SESSION['TYPE'] == 1): ?>
                    <li class=''>
                    <a href="index.php?page=user_list&io=1"><i class="fa fa-users"></i> Usuários</a>
                    </li>
                <?php endif; ?>    
                    <li>
                        <a id="dem3" href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-gears"></i> Manutenção<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                        
                             <li>
                                <a href="index.php?page=position"><i class="fa fa-fw fa-file-o"></i>Posição</a>
                            </li>
                             <li>
                                <a href="index.php?page=division"><i class="fa fa-fw fa-file-o"></i>Divisões do Projeto</a>
                            </li>
                            <li style="">
                                <a href="index.php?page=project_team"><i class="fa fa-fw fa-users"></i>Equipe do Projeto</a>
                            </li>
                        </ul>
                    </li>
    </ul>
<script>
    var _h = location.href  
        $('.side-nav a').each(function(){
            if(_h.includes($(this).attr("href")) == true){
                $(this).closest('li').addClass('active')
            }
        })
</script>