<nav class="navbar navbar-expand-lg navbar-light bg-light">
	
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
    	<span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navb">

    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link active verTabla" href="javascript:void(0)" tipo="tablaCategorias">Categorías</a>
      </li>

      <li class="nav-item">
        <a class="nav-link verTabla" href="javascript:void(0)" tipo="tablaSubcategorias">Subcategorías</a>
      </li>

    </ul>

    <form method="post" class="form-inline my-2 my-lg-0 formularioOfertas">

      <!--=====================================
      TIPO DE OFERTA
      ======================================-->

      <div class="input-group mx-1 input-group-sm">  

        <div class="input-group-prepend d-none d-xl-block">
          
          <span class="input-group-text">
            
            Tipo de Oferta
          
          </span>

        </div>

        <select class="form-control" name="tipo" required>
          
          <option value="">Elegir</option>
          <option value="oferta">Precio</option>
          <option value="descuento">Descuento</option>

        </select>  
          
      </div>

      <!--=====================================
      VALOR OFERTA
      ======================================-->

       <div class="input-group mx-1 input-group-sm">  

        <div class="input-group-prepend d-none d-xl-block">
          
          <span class="input-group-text">
            
            Valor Oferta
          
          </span>

        </div> 

        <input type="number" class="form-control" name="valor" step="any" min="0" placeholder="0" required>      

      </div>

       <!--=====================================
      FECHA OFERTA
      ======================================-->

      <div class="input-group mx-1 input-group-sm">  

        <div class="input-group-prepend d-none d-xl-block">
          
          <span class="input-group-text">
            
            Fin de la Oferta
          
          </span>

        </div> 

        <input type="text" class="form-control datepicker" name="finOferta" placeholder="Ingresar fecha" required>

      </div>

       <button class="btn btn-success btn-sm  my-2 my-sm-0 mx-1" type="submit">Cambiar</button>

       <?php

         $cambiarOferta = new ControladorCategorias();
         $cambiarOferta -> ctrActualizarOfertas();

       ?>
      
    </form>

    <a href="logout">
    	
    	<button class="btn btn-danger btn-sm mx-1 backColor" type="button">Salir</button>

    </a>

  </div>

</nav>

<!--=====================================
TABLA CATEGORÍAS
======================================-->

<div class="container-fluid bg-white py-3 text-left visorTablaCategoria">

  <table class="table table-bordered table-striped dt-responsive tablaCategorias small" width="100%">

    <thead>

      <tr>
        
        <th style="width:10px">#</th> 
        <th>Categoría</th>
        <th>Título</th>   
        <th>Descripción</th>
        <th>Palabras claves</th>
        <th>Icono</th>
        <th>Imagen Oferta</th>
        <th>Imagen Banner</th>
        <th>Precio Oferta</th>
        <th>Descuento</th>
        <th>Fin Oferta</th>
        <th>Acciones</th>

      </tr>   

    </thead>

   <!--  <tbody>
    
      <tr>
        
        <td>1</td>
        <td>Desarrollo</td>
        <td>Cursos en línea de Desarrollo web y programación | Tutoriales a tu Alcance</td>
        <td>Aprenda a codificar o crear sitios web desde cero con estos cursos en línea. Los temas incluyen desarrollo web, aplicaciones móviles IOS, desarrollo de Android a juegos y comercio electrónico</td>
        <td>aprender, codificar, crear, sitios web, cursos en línea, desarrollo web, aplicaciones móviles, IOS, Android, juegos, comercio electrónico, gratis, gratuito</td>
        <td><span class="fas fa-code"></span></td>
        <td><img src="http://localhost/api-udemy-copia/vistas/img/ofertas/desarrollo.jpg" class="img-thumbnail"></td>
        <td><img src="http://localhost/api-udemy-copia/vistas/img/banner/desarrollo.jpg" class="img-thumbnail"></td>
        <td>$ 11.99</td>
        <td>0</td>
        <td>2018-10-31 23:59:59</td>
        <td>
          <button class="btn btn-danger btn-sm">Editar</button>
        </td>

      </tr>  

    </tbody> -->

  </table> 

</div>

<!--=====================================
VENTANA MODAL EDITAR CATEGORIA
======================================-->

<div class="modal small" id="modalEditarCategoria">

  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">
   
        <div class="modal-header">
          
          <h4 class="modal-title">Editar Categoría</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div> 

        <div class="modal-body text-left">
           
          <!--=====================================
          CATEGORÍA
          ======================================--> 
          
          <div class="form-group">

            <label><strong>Categoría:</strong></label> 

            <input type="text"class="form-control input-lg" name="categoria" readonly>

          </div>

          <!--=====================================
          TÍTULO
          ======================================--> 
          <div class="form-group">

            <label><strong>Título:</strong></label> 

            <textarea class="form-control" rows="3" name="titulo" required></textarea>

          </div>

          <!--=====================================
          DESCRIPCIÓN
          ======================================--> 
          <div class="form-group">

            <label><strong>Descripción:</strong></label> 

            <textarea class="form-control" rows="5" name="descripcion" required></textarea>

          </div>

           <!--=====================================
          PALABRAS CLAVES
          ======================================--> 
          <div class="form-group">

            <label><strong>Palabras claves:</strong></label> 

            <textarea class="form-control" rows="3" name="palabrasClaves" required></textarea>

          </div>

          <!--=====================================
          ICONO
          ======================================--> 
          <div class="form-group">

            <label><strong>Icono:</strong></label> 

            <input type="text" class="form-control input-lg" name="icono" required>

          </div>

          <!--=====================================
          IMAGEN OFERTA
          ======================================--> 

          <div class="form-group">

            <label><strong>Subir Imagen Oferta:</strong></label> 
            
             <div class="custom-file">
              <input type="file" class="custom-file-input imgOferta" id="customFile" name="imgOferta">
              <label class="custom-file-label" for="customFile">Buscar archivo</label>
            </div>

             <input type="hidden" name="antiguaImgOferta">

             <img src="" class="img-thumbnail prevImgOferta">

             <caption>Tamaño recomendado 600px * 375px | Peso máximo de la foto 2MB</caption>

          </div>

          <!--=====================================
          IMAGEN BANNER
          ======================================--> 

          <div class="form-group">

            <label><strong>Subir Imagen Banner:</strong></label> 
            
             <div class="custom-file">
              <input type="file" class="custom-file-input imgBanner" id="customFile2" name="imgBanner">
              <label class="custom-file-label" for="customFile2">Buscar archivo</label>
            </div>

            <input type="hidden" name="antiguaImgBanner">

             <img src="" class="img-thumbnail prevImgBanner">

             <caption>Tamaño recomendado 1600px * 250px | Peso máximo de la foto 2MB</caption>

          </div>

          <!--=====================================
          PRECIO OFERTA
          ======================================--> 
          <div class="form-group">

            <label><strong>Precio Oferta:</strong></label> 

            <div class="input-group mb-3">

               <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>

              <input type="text" class="form-control input-lg" name="oferta" step="any" min="0" required>

            </div>

          </div>

          <!--=====================================
          DESCUENTO
          ======================================--> 
          <div class="form-group">

            <label><strong>Descuento:</strong></label> 

            <div class="input-group mb-3">            

              <input type="text" class="form-control input-lg text-right" name="descuento" min="0" required>

               <div class="input-group-prepend">
                <span class="input-group-text">%</span>
              </div>

            </div>

          </div>

           <!--=====================================
          FIN OFERTA
          ======================================--> 

          <div class="form-group">

            <label><strong>Fin Oferta:</strong></label> 

            <div class="input-group mb-3">

               <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>

                <input type="text" class="form-control datepicker" name="finOferta" required>

            </div>

          </div>     
   
        </div>

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger backColor">Guardar</button>

        </div>

        <?php

          $editarCateforia = new ControladorCategorias();
          $editarCateforia -> ctrEditarCategoria();

        ?>

      </form>

    </div>

  </div> 

</div>

<!--=====================================
TABLA SUBCATEGORÍAS
======================================-->

<div class="container-fluid bg-white py-3 text-left visorTablaSubcategoria">

   <table class="table table-bordered table-striped dt-responsive tablaSubcategorias" width="100%">

    <thead>
      
      <tr class="small">
        
        <th style="width:10px">#</th>
        <th>Subcategoría</th>
        <th>Categoría</th>
        <th>Oferta</th>
        <th>Descuento</th>
        <th>Fin Oferta</th>
        <th>Acciones</th>

      </tr>

    </thead>

     <!--   <tbody>
      
      <tr class="small">
        
        <td>1</td>
        <td>Desarrollo</td>
        <td>$ 11.99</td>
        <td>0</td>
        <td>2018-10-31 23:59:59</td>
        <td><button class="btn btn-danger btn-sm ditarSubcategoria" idCategoria="1" data-toggle='modal' data-target='#modalEditarSubcategoria'>Editar</button></td>

      </tr>

    </tbody> -->

  </table> 

</div>

<!--=====================================
VENTANA MODAL EDITAR SUBCATEGORIA
======================================-->

<div class="modal small" id="modalEditarSubcategoria">

  <div class="modal-dialog">
    
    <div class="modal-content">

     <form method="post">
     
      <div class="modal-header">
        <h4 class="modal-title">Editar Subcategoría</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body text-left">
        
        <!--=====================================
        SUBCATEGORÍA
        ======================================--> 
        <div class="form-group">

          <label><strong>Subcategoría:</strong></label> 

          <input type="text"class="form-control input-lg" name="subcategoria" readonly>

        </div>

        <!--=====================================
        OFERTA
        ======================================--> 
        <div class="form-group">

          <label><strong>Oferta:</strong></label> 

          <div class="input-group mb-3">

             <div class="input-group-prepend">
              <span class="input-group-text">$</span>
            </div>

            <input type="text" class="form-control input-lg" name="oferta" step="any" min="0" required>

          </div>

        </div>

        <!--=====================================
        DESCUENTO
        ======================================--> 
        <div class="form-group">

          <label><strong>Descuento:</strong></label> 

          <div class="input-group mb-3">            

            <input type="text" class="form-control input-lg text-right" name="descuento" min="0" required>

             <div class="input-group-prepend">
              <span class="input-group-text">%</span>
            </div>

          </div>

        </div>

        <!--=====================================
        FIN OFERTA
        ======================================--> 

        <div class="form-group">

          <label><strong>Fin Oferta:</strong></label> 

          <div class="input-group mb-3">

             <div class="input-group-prepend">
              <span class="input-group-text">$</span>
            </div>

              <input type="text" class="form-control datepicker" name="finOferta" required>

          </div>

        </div>     

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger backColor">Guardar</button>
      </div>

      <?php

        $editarCategoria = new ControladorCategorias();
        $editarCategoria -> ctrEditarSubcategoria();

      ?>

    </form>

    </div>

  </div>

</div>
