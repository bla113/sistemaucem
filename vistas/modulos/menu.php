<aside class="main-sidebar ">

	<section class="sidebar">

		<ul class="sidebar-menu">
			<?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["perfil"] == "Administrador" ||  $_SESSION["perfil"] == "SOPORTE") { ?>

				<li class="active">

					<a href="inicio">

						<i class="fa fa-home"></i>
						<span>Inicio</span>

					</a>

				</li>
				<!-- Usuarios -->



				<li>

					<a href="usuarios">

						<i class="fa fa-user"></i>
						<span>Usuarios</span>

					</a>

				</li>


				<!-- Estudiantes -->

				<li class="treeview">

					<a href="estudiantes">

						<i class="fa fa-users"></i>
						<span>Estudiantes</span>

					</a>
					<ul class="treeview-menu">
						<li>

							<a href="estudiantes">

								<i class="fa  fa-user-plus"></i>
								<span>Ver Estudiantes</span>

							</a>

						</li>

						<li>

							<a href="crear-estudiante">

								<i class="fa fa-user-plus"></i>
								<span>Estudiantes Nacional</span>

							</a>

						</li>

						<li>

							<a href="crear-estudiante-ex">

								<i class="fa fa-user-plus"></i>
								<span>Estudiantes Extranjero</span>

							</a>

						</li>

					</ul>

				</li>

				<!-- Profesores -->
				<li>

					<a href="profesores">

						<i class="fa fa-male"></i>
						<span>Profesores</span>

					</a>

				</li>


				<!-- Universidad -->

				<li class="treeview">

					<a href="">

						<i class="fa-solid fa-school-flag"></i>
						<span>Universidad</span>

					</a>
					<ul class="treeview-menu">
						<li>

							<a href="carreras">

								<i class="fa-solid fa-school-circle-check"></i>
								<span>Carreras</span>

							</a>

						</li>

						<li>

							<a href="planes-carrera">

								<i class="fa-solid fa-chalkboard"></i>
								<span>Planes Carrera</span>

							</a>

						</li>
						<li>

							<a href="materias">

								<i class="fa-solid fa-book-journal-whills"></i>
								<span>Materias</span>

							</a>

						</li>
						<li>

							<a href="aulas">

								<i class="fa-solid fa-house-flag"></i>
								<span>Aulas</span>

							</a>

						</li>

						<li>

							<a href="horarios">

								<i class="fa-solid fa-clock"></i>
								<span>Horarios</span>

							</a>

						</li>

						<li>

							<a href="grupos-materia">

								<i class="fa-solid fa-layer-group"></i>
								<span>Grupos de Materias</span>

							</a>

						</li>
						<li>

							<a href="periodos">

								<i class="fa-regular fa-calendar-check"></i>
								<span>Periodos</span>

							</a>

						</li>



						<li>

							<a href="">

								<i class="fa-solid fa-address-card"></i>
								<span>Consecutivos Carnet</span>

							</a>

						</li>

						<li>

							<a href="certificaciones">

								<i class="fa-solid fa-stamp"></i>
								<span>Certificaciones</span>

							</a>

						</li>

						<li>

							<a href="">

								<i class="fa-solid fa-headset"></i>
								<span>Centro de Ayuda</span>

							</a>

						</li>

					</ul>

				</li>




				<li class="treeview">

					<a href="">

						<i class="fa-brands fa-salesforce"></i>
						<span>CRM</span>

					</a>
					<ul class="treeview-menu">


						<li>

							<a href="marketing">

								<i class="fa-solid fa-money-bill-trend-up"></i>
								<span>Marketing</span>

							</a>

						</li>

						<li>

							<a href="servicio-cliente">

								<i class="fa-solid fa-person-digging"></i>
								<span>Planificación</span>

							</a>

						</li>
						<li>

							<a href="chat">

							<i class="fa-solid fa-comments-dollar"></i>
								<span>Chat</span>

							</a>

						</li>



					</ul>

				</li>

				<!-- Correo -->

				<li>

					<a href="correos">

						<i class="fa fa-envelope"></i>
						<span>Correo</span>

					</a>

				</li>
















				<!-- Oferta Académica -->

				<li class="treeview">

					<a href="">

						<i class="fa-brands fa-readme"></i>
						<span>Matriculas</span>

					</a>
					<ul class="treeview-menu">

						<li>

							<a href="matriculas">

								<i class="fa fa-map-signs"></i>
								<span>Matriculas</span>

							</a>

						</li>

						<li>

							<a href="oferta-academica">

								<i class="fa-solid fa-house"></i>
								<span>Oferta Académica</span>

							</a>

						</li>

						<li>

							<a href="grupos-horarios">

								<i class="fa-solid fa-building-columns"></i>
								<span>Grupos Cursos</span>

							</a>

						</li>



						<li>

							<a href="pre-matriculas">

								<i class="fa-solid fa-book-open-reader"></i>
								<span>Pre Matriculas</span>

							</a>

						</li>

					</ul>

				</li>


				<!-- Reportes -->


				<li class="treeview">

					<a href="">

						<i class="fa fa-pie-chart"></i>
						<span>Reportes</span>

					</a>
					<ul class="treeview-menu">
						<li>

							<a href="reportes">

								<i class="fa fa-user-plus"></i>
								<span>Materias</span>

							</a>

						</li>

						<li>

							<a href="">

								<i class="fa fa-user-plus"></i>
								<span>Profesores</span>

							</a>

						</li>

						<li>

							<a href="">

								<i class="fa-solid fa-school"></i>
								<span>Actas</span>

							</a>

						</li>

						<li>

							<a href="">

								<i class="fa fa-phone"></i>
								<span>Solictudes</span>

							</a>

						</li>

					</ul>

				</li>



				<!-- Campus Vistual -->


				<li class="treeview">

					<a href="">

						<i class="fa fa-chrome"></i>
						<span>Campus Virtual</span>

					</a>
					<ul class="treeview-menu">
						<li>

							<a href="cursos">

								<i class="fa fa-book"></i>
								<span>Cursos</span>

							</a>

						</li>

						<li>

							<a href="">

								<i class="fa fa-bullhorn"></i>
								<span>Crear Cursos</span>

							</a>

						</li>

						<li>

							<a href="">

								<i class="fa fa-university"></i>
								<span>Vsitar Campus</span>

							</a>

						</li>

						<li>

							<a href="">

								<i class="fa fa-phone"></i>
								<span>Solictudes</span>

							</a>

						</li>

					</ul>

				</li>

				<!-- Facturación -->


				<li class="treeview">

					<a href="">

						<i class="fa fa-inbox"></i>
						<span>Facturas</span>

					</a>
					<ul class="treeview-menu">

						<li>

							<a href="">

								<i class="fa fa-files-o"></i>
								<span>Ver Facturas</span>

							</a>

						</li>

						<li>

							<a href="">

								<i class="fa fa-cart-plus"></i>
								<span>Recibo de Pago</span>

							</a>

						</li>
						<li>

							<a href="">

								<i class="fa fa-product-hunt"></i>
								<span>Punto de Venta</span>

							</a>

						</li>

						<li>

							<a href="">

								<i class=" fa fa-money"></i>
								<span>Apertura Caja</span>

							</a>

						</li>

						<li>

							<a href="">

								<i class="fa fa-money"></i>
								<span>Cierre de Caja</span>

							</a>

						</li>

						<li>

							<a href="">

								<i class="fa fa-bar-chart-o"></i>
								<span>Reporte</span>

							</a>

						</li>

					</ul>

				</li>

			<?php } ?>

		</ul>




	</section>

</aside>