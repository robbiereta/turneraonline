<?php $this->set( 'title_for_layout', 'Informacion de '.$clinica['Clinica']['nombre'] ); ?>
<div class="navbar">
	<div class="navbar-inner">
		<ul class="nav nav-pills">
			<li><?php echo $this->Html->link( 'Inicio', '/' ); ?></li>
			<li class="active"><?php echo $this->Html->link( h( $clinica['Clinica']['nombre'] ), '#' ); ?></li>
			<li><?php echo $this->Html->link( 'Nuevo turno', array( 'controller' => 'turnos', 'action' => 'nuevo' ) ); ?></li>
			<?php if( $loggeado ) : ?>
			<li><?php echo $this->Html->link( 'Mis datos', array( 'controller' => 'usuarios', 'action' => 'view' ) ); ?></li>
			<li><?php echo $this->Html->link( 'Salir', array( 'controller' => 'usuarios', 'action' => 'salir' ) ); ?></li>
			<?php endif; ?>
		</ul>
	</div>
</div>
<div class="row-fluid">
	<div class="span6">
		<h2>
		<?php if( !empty( $clinica['Clinica']['logo'] ) ) : ?>
			<?php echo $this->Html->image( $clinica['Clinica']['logo'], array( 'border' => 0, 'alt' => $clinica['Clinica']['nombre'], 'class' => 'thumbnail' ) ); ?>
		<?php endif; ?>
		<?php echo $clinica['Clinica']['nombre']; ?></h2>
		<table class="table table-hover table-condensed">
			<tbody>
				<tr>
					<td>Raz&oacute;n Social</td>
					<td><?php echo h($clinica['Clinica']['nombre']); ?>&nbsp;</td>
				</tr>
				<tr>
					<td>Direcci&oacute;n</td>
					<td><?php echo h($clinica['Clinica']['direccion']); ?>&nbsp;</td>
				</tr>
				<?php if( !empty( $clinica['Clinica']['telefono'] ) )  {?>
				<tr>
					<td>Tel&eacute;fono</td>
					<td><?php echo h($clinica['Clinica']['telefono']); ?>&nbsp;</td>
				</tr>
				<?php }
				if( !empty( $clinica['Clinica']['email'] ) )  {?>
				<tr>
					<td>Email:</td>
					<td><?php echo $this->Html->link( $clinica['Clinica']['email'], 'mailto:'.$clinica['Clinica']['email'] ); ?>&nbsp;</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<?php if( isset( $clinica['Especialidades'] ) && !empty( $clinica['Especialidades'] ) ) : ?>
		<h3>Especialidades Disponibles</h3>
		<div class="btn-group">
		<?php foreach( $clinica['Especialidades'] as $especialidad ) {
		  echo $this->Html->tag( 'a', $especialidad['Especialidad']['nombre'], array( 'href' => '#', 'class' => 'btn btn-info' ) );
		} ?>
        </div>
		<?php endif; ?>


		<?php if( isset( $clinica['Medicos'] ) && !empty( $clinica['Medicos'] ) ) : ?>
		<h3>M&eacute;dicos que atienden en esta cl&iacute;nica</h3>
		    <ul class="thumbnails">
		<?php foreach( $clinica['Medicos'] as $id_medico => $medico ) : ?>

                <li class="span3 thumbnail text-center">
                    <?php echo $this->Html->image( "perfil-generico.jpg", array( 'class' => 'thumbnail', 'style' => 'max-width: 92%;' ) ); ?>
                    <?php echo $this->Html->link( $medico, array( 'controller' => 'medicos', 'action' => 'view', $id_medico ) ); ?>
                </li>
			<?php endforeach; ?>
            </ul>
		<?php endif; ?>
	</div>

	<!-- MAP DIV -->
	<div class="span6">
		<?php
		// init map (prints container)
		echo $this->GoogleMapV3->map(
          array( 'div' =>
              array( 'height'=>'400',
                     'width'=>'100%' ),
              "autoScript" => true,
              "zoom" => intval( $clinica['Clinica']['zoom']  ) )
        );
		// add markers
		$options = array(
		    'lat' => $clinica['Clinica']['lat'],
		    'lng' => $clinica['Clinica']['lng'],
		    'draggable' => false,
		    'icon' => Router::url( '/img/firstaid.png' ),
		    'title' => $clinica['Clinica']['nombre'], // Titulo de el globito
		    'content' => '<b>'.$clinica['Clinica']['nombre'].'</b><br />'
				.$clinica['Clinica']['direccion'].'<br />'
		    		.$clinica['Clinica']['telefono'].'<br />'
		    		.'<a href="mailto:'.$clinica['Clinica']['email'].'">'.$clinica['Clinica']['email'].'</a>'
		);

		$this->GoogleMapV3->addMarker($options); // Agrego el marcador

		// print js
		echo $this->GoogleMapV3->script();
	?>
	</div>
	<!-- End mapdiv -->
</div>

