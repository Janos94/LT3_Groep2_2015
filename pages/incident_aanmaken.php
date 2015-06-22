<h1 class="page-header">Incident aanmaken <small><span class="label label-primary"><?php echo cmdb_tag(1); ?></span></small></h1>
<div class="btn-group btn-group-lg" role="group" aria-label="Incident aanmaken-beheer">
  <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-floppy-saved"></span></button>
  <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></button>
</div>
<br><br>
<div class="row incident_field">  
<!-- Aanmelder incident -->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 incident_field">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Aanmelder</h3>
    </div>
    <div class="panel-body">
        <!-- Medewerkers nummer --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Medewerkers nr</div>
            <input type="text" class="form-control" id="medewerker_id" placeholder="4958245">
          </div>
        </div>
        <!-- Voornaam --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Voornaam</div>
            <input type="text" class="form-control" id="voornaam" placeholder="Vb. Peter" disabled>
          </div>
        </div>
        <!-- Achternaam --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Achternaam</div>
            <input type="text" class="form-control" id="achternaam" placeholder="Vb. de Vries" disabled>
          </div>
        </div>
        <!-- Telefoon --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Telefoon</div>
            <input type="tel" class="form-control" id="telefoon" placeholder="Vb. 0505491433" disabled>
          </div>
        </div>
        <!-- Email --> 
        <div class="form-group">
          <label class="sr-only" for="exampleInputAmount">E-Mail</label>
          <div class="input-group">
            <div class="input-group-addon">E-Mail</div>
            <input type="email" class="form-control" id="email" placeholder="p.devries@hondsrug.nl" disabled>
          </div>
        </div> 
        <!-- Locatie aanmelder --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Locatie</div>
            <input type="text" class="form-control" id="locatie" placeholder="Borger" disabled>
          </div>
        </div>       
        
    </div>
  </div>
</div>

<!-- Type incident -->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 incident_field">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Soort melding/incident</h3>
    </div>
    <div class="panel-body">
        <!-- Categorie --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Aangemeld via</div>
            <select class="form-control">
              <option>Telefoon</option>
              <option>E-mail</option>
              <option>Mondeling</option>
            </select>
          </div>
        </div>
        <!-- Categorie --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Soort melding/incident</div>
            <select class="form-control">
              <option>Storing</option>
              <option>Probleem</option>
              <option>Opmerking</option>
            </select>
          </div>
        </div>
        <!-- Categorie --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Impact/urgentie</div>
            <select class="form-control">
              <option>1 - Gering</option>
              <option>2 - Laag</option>
              <option>3 - Middel</option>
              <option>4 - Hoog</option>
              <option>5 - Blokkerend</option>
            </select>
          </div>
        </div>       
        
    </div>
  </div>
</div>

<!-- Object type -->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 incident_field">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Object</h3>
    </div>
    <div class="panel-body">
        <!-- Object type --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Object type</div>
            <select class="form-control">
              <option>Werkstation</option>
              <option>Server</option>
              <option>Modem</option>
              <option>Router</option>
              <option>Switch</option>
              <option>Printer</option>
              <option>Firewall</option>
            </select>
          </div>
        </div>
        <!-- Object-id --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Object-ID</div>
            <select class="form-control">
              <option>GSV-003</option>
              <option>MDM-005</option>
              <option>SRV-2359</option>
            </select>
          </div>
        </div>        
        <!-- Locatie --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Locatie</div>
            <input type="text" class="form-control" id="locatie" placeholder="Gasselte L.003">
          </div>
        </div>        
        
    </div>
  </div>
</div>

<!-- Behandelaar -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 incident_field">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Verwerking / Behandelaar</h3>
    </div>
    <div class="panel-body">
        <div class="col-xs-12 col-sm-6 incident_field">
        <!-- Object type --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Behandelaar</div>
            <select class="form-control">
              <option>Osinga, JJ</option>
              <option>Oostebring, M</option>
              <option>de Ruig, B</option>
              <option>Oosterveen, O</option>
            </select>
          </div>
        </div> 
        </div>
        
        <div class="col-xs-12 col-sm-6 incident_field">
        <!-- Object type --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Status</div>
            <select class="form-control">
              <option>Open</option>
              <option>In wacht</option>
              <option>In behandeling</option>
              <option>Gesloten</option>
              <option>Opgelost</option>
            </select>
          </div>
        </div> 
        </div>        
               
    </div>
  </div>
 </div>
</div>

<!----------->
<div class="row incident_field">
<!-- Beschrijving -->
<div class="col-xs-12 col-sm-6 incident_field">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Beschrijving</h3>
    </div>
    <div class="panel-body">
          
    <!-- Korte omschrijving --> 
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-addon">Korte omschrijving</div>
        <input type="text" class="form-control" id="korte_omschrijving" placeholder="Bv. Beeldscherm werkt niet">
      </div>
    </div>
    <div class="form-group">
      <div class="input-group"> 
        <div class="input-group-addon">Probleem</div>
        <textarea class="form-control" rows="5"></textarea>
      </div>    
    </div>     
  </div>
</div>
</div>
  
<!-- Tijdlijn -->
<div class="col-xs-12 col-sm-6 timeline">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Acties</h3>
    </div>
    <div class="panel-body">
      <div class="qa-message-list" id="wallmessages">					
					<div class="message-item" id="m1">
						<div class="message-inner">
							<div class="message-head clearfix">
								<div class="avatar pull-left"><img src="../images/profielfotos/janosinga.png"></div>
								<div class="user-detail">
									<h5 class="handle">Jan Osinga</h5>
									<div class="post-meta">
										<div class="asker-meta">
											<span class="qa-message-what"></span>
											<span class="qa-message-when">
												<span class="qa-message-when-data">16-06-2015 14:49</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="qa-message-content">
								Dit incident kan snel worden opgelost met een handleiding...
							</div>
					</div></div>					
				</div>    
  </div>
</div>
</div>
<div class="row aanmaakdatum">
	<div class="col-xs-12 col-sm-12 aanmaakdatum">
	<div class="well well-sm"><center>Aangemaakt op: 16-06-2015 14:00 | Aangepast op: 16-06-2015 14:15</center></div>
	</div>
</div>