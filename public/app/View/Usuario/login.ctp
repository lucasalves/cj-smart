<?php if($error = $this->Session->flash()): ?>
	<div class="alert alert-error">
		<?php echo $error; ?>
	</div>
<?php endif; ?>
<?php echo $this->Form->create('Usuario', array('action' => 'login')); ?>
<?php echo $this->Form->input('usuario'); ?>
<?php echo $this->Form->input('senha', array('type' => 'password')); ?>
<?php echo $this->Form->end('Entrar'); ?>

<!--        <form method="POST" id="TelaLogin" action="logar.php">
            <div id="login">
                <div id="loginLogo">
                </div>
                <div class="topo">
                    Login
                </div>
                <div class="corpo">
                    <label>Usuário</label><br />
                    <input type="text" name="loginUsuario" /> <br /><br />
                    <label>Senha</label><br />
                    <input type="password" name="senhaUsuario"  />
                    <input type="submit" class="botao" id="Entrar" value="Entrar" />
                </div>           
            </div>
        </form>-->